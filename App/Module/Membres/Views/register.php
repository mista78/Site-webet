<?php 


    $layouts = [];
    $layouts["header"] = [];
    $layouts["content"] = [
        [   
            "container" => true,
            "attribute" => ["style" => "width:800px; margin-top:40px"],
            "item" => [
                // [
                //     "type" => "form",
                //     "class" => ["mr-2 ml-2"],
                //     "form" => [
                //         [
                //             [
                //                 "class" => ["col-md-4"],
                //                 "type" => "input",
                //                 "name" =>  "name",
                //                 "label" => "pseudo"
                //             ],
                //             [
                //                 "class" => ["col-md-8"],
                //                 "type" => "input",
                //                 "name" =>  "email",
                //                 "label" => "Votre d'adresse email"
                //             ]
                //         ],
                //         [
                            
                //             [
                //                 "class" => ["col-md-4"],
                //                 "type" => "input",
                //                 "name" => "file",
                //                 "options" => ["type" => "file"],
                //                 "label" => "Banner "
                //             ],
                //             [
                //                 "class" => ["col-md-8"],
                //                 "type" => "input",
                //                 "name" =>  "password",
                //                 "label" => "Votre mot de passe"
                //             ]
                //         ]
                //     ]
                // ],
                
            ]
        ],

    ];
    $header = require_once APP . "Theme/Partial/Header.php";
    $header["item"] = array_merge($header["item"],$layouts["header"]);
    $layouts["header"] = $header;
    return $layouts;