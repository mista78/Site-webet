<?php 


    $layouts = [];
    $layouts["header"] = [];
    $layouts["content"] = [
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
                    "limit" => 6,
                    "title" => "News rmc",
                    "data" => $rmc["channel"]["item"]
                ],
            ],
        ],
        [
            "container" => true,
            "item" => [
                [
                    "type" => "carousel",
                    "limit" => 3,
                    "title" => "News rmc",
                    "data" => $rmc["channel"]["item"]
                ],
                [
                    "type" => "generateprono",
                    "form" => [
                        "form" => [
                            [
                                [
                                    "type" => "select",
                                    "name" => "cote",
                                    "label" => "Cotes", 
                                    'options' => ['options' => ['1' => '1','2' => '2','3' => '3','4' => '4','5' => '5']]
                                ]
                            ],
                            DataTocomponent($sport, [
                                "type" => "checkbox", 
                                "name" => "sport"
                            ]),
                            [
                                [
                                    "type" => "select",
                                    "name" => "nb_prono",
                                    "label" => "Nombre de prono",
                                    'options' => ['options' => ['1' => '1','2' => '2','3' => '3','4' => '4','5' => '5']]
                                ]
                            ],
                        ]
                    ],
                ],
                
            ],
        ],
    ];
    $header = require_once APP . "Theme/Partial/Header.php";
    $header["item"] = array_merge($header["item"],$layouts["header"]);
    $layouts["header"] = $header;
    return $layouts;