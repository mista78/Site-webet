<?php 

    class Form {

        private $controller;
        public $surround = "";
        
        
        public  function __construct($controller) {
            $this->controller = $controller;
        }

        public function input($name, $label = null, $options = []) {
            $type = isset($options['type']) ? $options['type'] : "text";
            $exeception =  ['type','after','before','surrond'];
            $attr  = attribute($options, $exeception);
            $label = label($label);
            $input = ' <input '.$attr.' type="'. $type .'" name="'. $name .'" value="' . getValue($name) . '"> ';
            return surround($label . $input);
        }

    }