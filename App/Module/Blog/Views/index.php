<?php 


    $layouts = [];
    $layouts["header"] = [];
    $layouts["content"] = [
        [
        	"container" => true,
        	"item" => [
        		[
        			"type" => "carousel"
        		],
        		[
        			"type" => "tabs"
        		]
        	]	
        ]
    ];
    $header = require_once APP . "Theme/Partial/Header.php";
    $header["item"] = array_merge($header["item"],$layouts["header"]);
    $layouts["header"] = $header;
    // Debug($this);
    return $layouts;