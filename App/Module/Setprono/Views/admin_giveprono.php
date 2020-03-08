<?php
$layouts = [];
$layouts["header"] = [];
$layouts["content"] = [
    [   
        "container" => true,
        "item" => [
            [
                "type" => "form",
                "class" => ["mr-2 ml-2"],
                "form" => [
                    [
                        [
                            "class" => ["col-md-4"],
                            "type" => "input",
                            "name" =>  "name",
                            "label" => "cote équipe"
                        ],
                        [
                            "class" => ["col-md-8"],
                            "type" => "input",
                            "name" =>  "",
                            "label" => "nom équipe"
                        ],
                        [
                            "class" => ["col-md-8"],
                            "type" => "input",
                            "name" =>  "",
                            "label" => "sport   "
                        ]
                    ]
                ]
            ],
            
        ]
    ],

];
$header = require_once APP . "Theme/Partial/Header.php";
$header["item"] = array_merge($header["item"],$layouts["header"]);
$layouts["header"] = $header;
return $layouts;