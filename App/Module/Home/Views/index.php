<?php 

    
    $layouts = [];
    $layouts["header"] = [];
    $layouts["content"] = [
<<<<<<< HEAD
        // [
        //     "container" => true,
        //     "item" => [
        //         [
        //             "form" => [
        //                 "form" => [
        //                     [
        //                         [

<<<<<<< HEAD
        //                             "type" => "select",
        //                             "name" => "id_category",
        //                             "label" => "Cotes"
        //                         ]
        //                     ],
        //                     [
        //                         [

        //                             "type" => "select",
        //                             "name" => "id_category",
        //                             "label" => "Cotes"
        //                         ]
        //                     ],
        //                 ]
        //             ],
        //             "data" => $sport,
        //             "type" => "generateprono"
        //         ]
        //     ]   
        // ],
=======
=======
        [
            "container" => true,
            "item" => [
                [
                    "type" => "generateprono",
                    "form" => [
                        "form" => [
                            "attr" => ["id" => "form","form"],
                            [
                                [
>>>>>>> 6ef41da22afa1db88e07762f36358fc1791f2604
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
                ]
            ]   
        ],
>>>>>>> b9dc0bbd2bbc16798da077fb971f73ce6bd00e7a
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