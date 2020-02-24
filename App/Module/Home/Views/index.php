<?php 


    $layouts = [];
    $layouts["header"] = [];
    $layouts["content"] = [
        // [
        //     "container" => true,
        //     "item" => [
        //         [
        //             "form" => [
        //                 "form" => [
        //                     [
        //                         [
        //                             "class" => ["col-md-8"],
        //                             "type" => "select",
        //                             "name" => "id_category",
        //                             "label" => "Cotes"
        //                         ],
        //                         [
        //                             "class" => ["col-md-8"],
        //                             "type" => "select",
        //                             "name" => "id_category",
        //                             "label" => "Sports"
        //                         ],
        //                         [
        //                             "class" => ["col-md-8"],
        //                             "type" => "select",
        //                             "name" => "id_category",
        //                             "label" => "Nombre de pronostics"
        //                         ]
        //                     ],
        //                 ]
        //             ],
        //             "type" => "generateprono"
        //         ]
        //     ]   
        // ],
        [
            "container" => true,
            "item" => [
                [
                    "type" => "posthero",
                    "text" => [
                        "title" => "Actualité Sport Rmc"
                    ],
                    "limit" => 6,
                    "data" => $rmc["channel"]["item"]
                ]
            ]
        ],
        [
            "container" => true,
            "item" => [
                [
                    "type" => "posthero",
                    "text" => [
                        "title" => "Actualité Sport l'Equipe"
                    ],
                    "limit" => 6,
                    "data" => $equipe["channel"]["item"]
                ]
            ]
        ],

    ];
    $header = require_once APP . "Theme/Partial/Header.php";
    $header["item"] = array_merge($header["item"],$layouts["header"]);
    $layouts["header"] = $header;
    return $layouts;