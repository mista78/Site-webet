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
                                    "label" => "Cotes", 
                                    'options' => ['options' => ['1' => '1','2' => '2','3' => '3','4' => '4','5' => '5']]
                                ]
                            ],
                            DataTocomponent($sport, [
                                "type" => "input", 
                                "name" => "sport", 
                                'options' => ['type' => 'radio']
                            ]),
                            [
                                [
                                    "type" => "select",
                                    "name" => "id_category",
                                    "label" => "Nombre de prono",
                                    'options' => ['options' => ['1' => '1','2' => '2','3' => '3','4' => '4','5' => '5']]
                                ]
                            ],
                        ]
                    ],
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