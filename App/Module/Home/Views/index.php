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
                                    "class" => ["col-md-8"],
                                    "type" => "select",
                                    "name" => "id_category",
                                    "label" => "Cotes"
                                ],
                                [
                                    "class" => ["col-md-8"],
                                    "type" => "select",
                                    "name" => "id_category",
                                    "label" => "Sports"
                                ],
                                [
                                    "class" => ["col-md-8"],
                                    "type" => "select",
                                    "name" => "id_category",
                                    "label" => "Nombre de pronostics"
                                ]
                            ],
                        ]
                    ],
                    "type" => "generateprono"
                ]
            ]   
        ],
        [
            "container" => true,
            "item" => [
                [
                    "type" => "posthero",
                    "text" => [
                        "title" => "News"
                    ],
                    "limit" => 5,
                    "data" => $this->Blog->find(["order" => "id DESC"])
                ]
            ]
        ],

    ];
    $header = require_once APP . "Theme/Partial/Header.php";
    $header["item"] = array_merge($header["item"],$layouts["header"]);
    $layouts["header"] = $header;
    return $layouts;