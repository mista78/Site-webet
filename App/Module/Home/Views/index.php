<?php 

    
    $layouts = [];
    $layouts["header"] = [];
    $layouts["content"] = [
        [
            "container" => true,
            "item" => [
                [
                    "form" => [
                        "form" => [
                            [
                                [

                                    "type" => "select",
                                    "name" => "id_category",
                                    "label" => "Cotes"
                                ]
                            ],
                            [
                                [

                                    "type" => "select",
                                    "name" => "id_category",
                                    "label" => "Cotes"
                                ]
                            ],
                        ]
                    ],
                    "data" => $sport,
                    "type" => "generateprono"
                ]
            ]   
        ],
        [
            
        ],
        [
            "container" => true,
            "item" => [
                [
                    "type" => "carousel",
                    "limit" => 6,
                    "title" => "News equipe",
                    "data" => $equipe["channel"]["item"]
                ],
                [
                    "type" => "carousel",
                    "limit" => 3,
                    "title" => "News rmc",
                    "data" => $rmc["channel"]["item"]
                ],
            ],
        ],
    ];
    $header = require_once APP . "Theme/Partial/Header.php";
    $header["item"] = array_merge($header["item"],$layouts["header"]);
    $layouts["header"] = $header;
    return $layouts;