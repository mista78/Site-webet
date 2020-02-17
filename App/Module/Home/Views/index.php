<?php 


    $layouts = [];
    $layouts["header"] = [];

    $layouts["content"] = [
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