<?php
    session_start();
    date_default_timezone_set("Europe/Paris");
    define('_DIR_', dirname(__DIR__));
    const DS 			= DIRECTORY_SEPARATOR;
    const ROOT 			= _DIR_ . DS;
    const APP 			= ROOT . "App" . DS;
    const WEBROOT		= '/';
    require_once APP . "Func/Loader.php";
    require_once ROOT . 'vendor/autoload.php';
    Loader(['Func', 'Class','Core', 'Module']);

    new Dispatcher();
    
