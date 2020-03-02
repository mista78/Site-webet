<?php 

/**
* Controller
**/
class Controller{
	
	public $request;  				// Objet Request 
	private $vars     = array();	// Variables à passer à la vue
	public $layout    = 'Default';  // Layout à utiliser pour rendre la vue
	private $rendered = false;		// Si le rendu a été fait ou pas ?
	public $title 	  = "Devlie ";	
	/**
	* Constructeur
	* @param $request Objet request de notre application
	**/
	function __construct($request = null){
		// $this->Session = new Session();
		// $this->Form = new Form($this); 
        $initRoute = glob(APP . "Entity". DS ."*");
        if(!empty($initRoute)) {
            foreach($initRoute as $value) {
                $this->loadModel($value);
            }
        }
		if($request){
			$this->request = $request; 	// On stock la request dans l'instance	
			require APP.DS.'Config'.DS.'hook.php'; 		
		}
		
	}


	/**
	* Permet de rendre une vue
	* @param $view Fichier à rendre (chemin depuis view ou nom de la vue) 
	**/
	public function render($view){
		if($this->rendered){ return false; }
		extract($this->vars);
        $dataFormController = $this->request->controller;
		if(strpos($view,'/')===0){
			$view = APP .DS.'Module'.$view.'.php';
		}else{
			$view = APP . 'Module'.DS.ucfirst(trim($dataFormController)).DS . 'Views' . DS .$view.'.php';
		}
		$view = require_once $view;
		require APP . 'Theme'.DS.ucfirst($this->layout).'.php'; 
		$this->rendered = true; 
	}


	/**
	* Permet de passer une ou plusieurs variable à la vue
	* @param $key nom de la variable OU tableau de variables
	* @param $value Valeur de la variable
	**/
	public function set($key,$value=null){
		if(is_array($key)){
			$this->vars += $key; 
		}else{
			$this->vars[$key] = $value; 
		}
	}

	/**
	* Permet de charger un model
	**/
	
	function loadModel($name){
		$dir = APP . "Entity" . DS;

		$file = str_replace([$dir,".php"], ["",""], $name);
		if(!isset($this->$file)){
			require_once $name;
			$this->$file  = new $file();
		}


	}
	/**
	* Permet de gérer les erreurs 404
	**/
	function e404($message){	
		header("HTTP/1.0 404 Not Found");
		$this->set('message',$message); 
		$this->render('/errors/404');
		die();
	}

	/**
	* Permet d'appeller un controller depuis une vue
	**/
	function request($controller,$action){
		$data = ucfirst($controller);
		$file = '\\app\\module\\'. $data . DS . $data .'Controller';
		require_once ROOT.$file.'.php';
		$c = new $file();
		return $c->$action(); 
	}

	/**
	* Redirect
	**/
	function redirect($url,$code = null ){
		if($code == 301){
			header("HTTP/1.1 301 Moved Permanently");
		}
		header("Location: ".Router::url($url)); 
	}


}