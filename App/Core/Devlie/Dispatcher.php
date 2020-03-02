<?php 

    class Dispatcher {
        var $request;

        public function __construct() {
            $this->request = new Request();
            $initRoute = glob(APP . "Module/*");
            $initRoute = str_replace(APP ."Module/", "", $initRoute);
            $routes = [];
            $prefix = [];
            $propsToImplode = [];
            foreach ($initRoute as $value) {
                $name = $value."Controller";
                $class = new \ReflectionClass($name);
                foreach ($class->getMethods() as $property) { // consider only public properties of the providen 
                    if($property->class === $name) {
                        $propertyName = $class->getMethod($property->getName())->getDocComment();
                        $propsToImplode[$name . "_" .$property->getName()]  =  trim(preg_replace("#((\/)?(\*)(\/)?)#si", "", $propertyName));
                    }
                }
            }
            $routes["''"] = "home/index";
            $prefix["cockpit"] = "admin";
            foreach($propsToImplode as $v) {
                preg_match('#@Route\((.*)\)#', $v, $match);
                $t = explode(",",$match[1]);
                if(!isset($routes[$t[0]])) {
                    $routes[$t[0]] = $t[1];
                }
            }
            foreach($propsToImplode as $vs) {
                preg_match('#@Prefix\((.*)\)#', $vs, $match2);
                if(is_array($match2) && !empty(current($match2))) {
                    $t = explode(",",$match2[1]);
                    if(!isset($prefix[$t[0]])) {
                        $prefix[$t[0]] = $t[1];
                    }
                }
            }
            foreach ($prefix as $k => $v) {
                Router::prefix($k,$v);
            }
            foreach ($routes as $k => $v) {
                Router::connect($k,$v);
            }
            //Debug($routes);
            Router::parse($this->request->url,$this->request);
            Router::$request  = $this->request;
            
            $controller = $this->loadController(); 
            $action = $this->request->action;
            if($this->request->prefix){
                $action = $this->request->prefix.'_'.$action;
            }
            $action = trim($action);
            if(!in_array($action , array_diff(get_class_methods($controller),get_class_methods('Controller'))) ){
                $this->error('Le controller '.$this->request->controller.' n\'a pas de méthode '.$action); 
            }
            call_user_func_array(array($controller,$action),$this->request->params); 
            $controller->render($action);
        }

        /**
        * Permet de générer une page d'erreur en cas de problème au niveau du routing (page inexistante)
        **/
        function error($message){
            $controller = new Controller($this->request);
            $controller->e404($message); 
        }

        /**
        * Permet de charger le controller en fonction de la requête utilisateur
        **/
        function loadController(){
            $data = ucfirst($this->request->controller);
            $name = $data .'Controller';
            $file = APP. 'Module' . DS . $data . DS . $name.'.php';
            if(!file_exists($file)){
                $this->error('Le controller '.$this->request->controller.' n\'existe pas'); 
            } 
            require_once $file; 
            $controller = new $name($this->request); 
            return $controller;  
        }
    }
    