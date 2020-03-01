<?php

    abstract class Ormclass {
        
        protected $connections = array(); 
        protected $tableName;
        protected $db;

        public function __construct() {
            $config = ($_SERVER['REMOTE_ADDR'] !== "127.0.0.1") ? "prod" : "dev";
            // Connection à la base ou récupération de la précédente connection
            $conf = Conf::$databases[$config];
            if(isset($this->connections[$config])){
                $this->db = $this->connections[$config];
                return true; 
            }
            try{
                $pdo = new PDO(
                    'mysql:host='.$conf['host'].';dbname='.$conf['database'].';',
                    $conf['login'],
                    $conf['password'],
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
                );
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);

                $this->connections[$config] = $pdo; 
                $this->db = $pdo; 
            }catch(PDOException $e){
                if(Conf::$debug >= 1){
                    die($e->getMessage()); 
                }else{
                    die('Impossible de se connecter à la base de donnée'); 
                }
            }
            $this->build();
        }

        public function save() {
            $class = new \ReflectionClass($this);
            $tableName = '';
            $result = '';

            if($this->tableName != '') {
                $tableName = $this->tableName;
            } else {
                $tableName = strtolower($class->getShortName());
            }
        
            $propsToImplode = [];

            foreach ($class->getProperties(\ReflectionProperty::IS_PUBLIC) as $property) { 
                $propertyName = $property->getName();
                if($propertyName != "id" && $this->{$propertyName} != "") {
                    $propsToImplode[] = '`'.$propertyName.'` = "'.addslashes($this->{$propertyName}).'"';
                }
            }
            $setClause = implode(',',$propsToImplode);
            $sqlQuery = '';

            if ($this->id > 0) {
            $sqlQuery = 'UPDATE '.$tableName.' SET '.$setClause.' WHERE id = '.$this->id;
            } else {
            $sqlQuery = 'INSERT INTO '.$tableName.' SET '.$setClause.'';
            }
            
            $result = $this->db->query($sqlQuery);
            return $result;
        }

        public function find($req = array()){
            $class = new \ReflectionClass($this);
            if($this->tableName != '') {
                $tableName = $this->tableName;
            } else {
                $tableName = strtolower($class->getShortName());
            }
            $sql = 'SELECT ';
            if(isset($req['fields'])){
                if(is_array($req['fields'])){
                    $sql .= implode(', ',$$req['fields']);
                }else{
                    $sql .= $req['fields']; 
                }
            }else{
                $sql.='*';
            }
    
            $sql .= ' FROM '.$tableName.' ';
    
            // Liaison
            if(isset($req['join'])){
                foreach($req['join'] as $k=>$v){
                    $sql .= 'LEFT JOIN '.$k.' ON '.$v.' '; 
                }
            }
    
            // Construction de la condition
            if(isset($req['conditions'])){
                $sql .= 'WHERE ';
                if(!is_array($req['conditions'])){
                    $sql .= $req['conditions']; 
                }else{
                    $cond = array(); 
                    foreach($req['conditions'] as $k=>$v){
                        if(!is_numeric($v)){
                            $v = $this->db->quote($v); 
                        }
                        
                        $cond[] = "$k=$v";
                    }
                    $sql .= implode(' AND ',$cond);
                }
    
            }
    
            if(isset($req['order'])){
                $sql .= ' ORDER BY '.$req['order'];
            }
    
    
            if(isset($req['limit'])){
                $sql .= ' LIMIT '.$req['limit'];
            }
            $pre = $this->db->prepare($sql); 
            $pre->execute();
            if (isset($req['style'])) {
                $pre->setFetchMode(PDO::FETCH_OBJ);
            } else {
                $pre->setFetchMode(PDO::FETCH_CLASS,get_class($this));
            }
            return $pre->fetchAll();
        }

        public function __get($key) {
            $method = "get". ucfirst($key);
            $this->$key = $this->$method(); 
            return $this->$key;
        }

        public  function build() {
            global $key;
            $class = new \ReflectionClass($this);
            $tableName = '';
            $result = '';

            if($this->tableName != '') {
                $tableName = $this->tableName;
            } else {
                $tableName = strtolower($class->getShortName());
            }
            
            $propsToImplode = [];
        
            foreach ($class->getProperties(\ReflectionProperty::IS_PUBLIC) as $property) { // consider only public properties of the providen 
              $propertyName = $property->getName();
              $propsToImplode[$property->getName()]  =  trim(preg_replace("#((\/)?(\*)(\/)?)#si", "", $property->getDocComment()));
            }
            $sql = "CREATE TABLE IF NOT EXISTS `$tableName`(";
            $sql .= "`id` int(11) NOT NULL AUTO_INCREMENT, PRIMARY KEY (`id`)";
            $sql .= ");";
            $this->db->query($sql);
            try {
                $test = "SELECT 1 FROM $tableName";
                if(is_array(@$this->db->query($test)->fetchAll())) {
                    foreach( $propsToImplode as $k => $v ) {
                        if(empty(@$this->db->query("SELECT $k FROM $tableName"))) {
                            $sql .= " ALTER TABLE `$tableName` ADD COLUMN `$k` $v NULL DEFAULT NULL AFTER `$key`; ";
                        }
                        $key = $k;
                    }
                    $test = "SHOW COLUMNS FROM $tableName";
                    foreach($this->db->query($test)->fetchAll(PDO::FETCH_OBJ) as $key => $value) {
                        if(!isset($propsToImplode[$value->Field])) {
                            $sql .= "ALTER TABLE `$tableName` DROP COLUMN `$value->Field`;";
                        }
                    }
                    $this->db->query($sql);
                }
            } catch (\Throwable $th) {
                //throw $th;
            }
            return true;
        }

        /**
        * @return Entities
        */
        public static function morph(array $object) {
            $class = new \ReflectionClass(get_called_class()); // this is static method that's why i use get_called_class
        
            $entity = $class->newInstance();
        
            foreach($class->getProperties(\ReflectionProperty::PUBLIC) as $prop) {
            if (isset($object[$prop->getName()])) {
                $prop->setValue($entity,$object[$prop->getName()]);
            }
            }
        
            $entity->initialize(); // soft magic
        
            return $entity;
        }

    }