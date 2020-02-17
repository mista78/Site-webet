<?php 


    $layouts = [];
    $layouts["header"] = [];
    $layouts["content"] = [
        [
            "class" => ["mt-0"],
            "item" => [

                [
                    
                    "type" => "fullback",
                    "img" => current($post)->img,
                    "id" => current($post)->id,
                    "name" => current($post)->name,
                ],
                // [
                //     "type" => "item",
                //     "data" => $post,
                //     'num' => 1,
                // ],
                // [
                //     "type" => "item",
                //     "data" => $post
                // ]
                
            ]
        ],

        [
            "container" => true,
            "item" => [

                [
                    "type" => "text",
                    "title" => current($post)->name,
                    "content" => current($post)->content,
                ],
                // [
                //     "type" => "item",
                //     "data" => $post,
                //     'num' => 1,
                // ],
                // [
                //     "type" => "item",
                //     "data" => $post
                // ]
                
            ]
        ],

    ];
    $header = require_once APP . "Theme/Partial/Header.php";
    $header["item"] = array_merge($header["item"],$layouts["header"]);
    $layouts["header"] = $header;
    return $layouts;