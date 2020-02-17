<?php 

    class Request {

        public $url;
        public $page    = 1;
        public $prefix  = false;
        public $data    = false;
        public $lang    = "fr";

        public function __construct() {
            
            $table = [];
            $data = glob(APP . "Lang/*");
            foreach ($data as  $value) {
                $t = explode('.', $value);
                $table[] = $t[1];
                
            }
            if(!in_array($_GET['lang'], $table)) { $url = "/". $this->lang . $_SERVER['REQUEST_URI'];  header("Location:".$url );}
            $_SESSION['local'] = $_GET['lang'];
            $this->url = isset($_GET['url']) ? $_GET['url'] : "/";
            if(!empty($_POST)) {
                $this->data = new stdClass();
                foreach($_POST as $k=>$v) {
                    $this->data->$k=$v;
                }
            }

        }

    }