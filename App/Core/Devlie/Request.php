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
            $url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : "/";
            $url = trim($url, "/");
            $url = explode("/", $url);
            $lang= $this->lang($url,$table);
            $this->lang = $lang;
            $removeFirst= array_shift($url);
            if(!in_array($lang, $table)) { $url = "/". $this->lang . $_SERVER['REQUEST_URI'];  header("Location:".$url );}
            $this->url = isset($url[0]) ? implode("/",$url) : "";
            if(!empty($_POST)) {
                $this->data = new stdClass();
                foreach($_POST as $k=>$v) {
                    $this->data->$k=$v;
                }
            }

        }

        public function lang($url,$table) {
            $lang = null;
            if(isset($_SESSION['local']) && $_SESSION['local'] === $url[0]) {
                $lang = $_SESSION['local'];
            } else {
                $lang = (strlen($url[0]) <= 2 && in_array($url[0],$table)) ? array_shift($url) : "fr";
                $_SESSION['local'] = $lang;
            }
            return $lang;
        }

    }