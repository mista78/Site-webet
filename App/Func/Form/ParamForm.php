<?php

    function getValue($name) {
        return isset($_POST[$name]) ? $_POST[$name] : null;
    }

    function attribute($options, $exception = []){
        $i = 0;
        $labelAttr = "";
        foreach ($options as $k => $v) {
            if (!in_array($k, $exception)) {
                if ($k == "solo") {
                    $labelAttr .= " $v ";
                } else {
                    $labelAttr .= " $k='$v' ";
                }
            }
        }
        return $labelAttr;
    }

    function surround($html, $options = []) {
        $tag = isset($options["tag"]) ? $options["tag"] : "div";
        return "$html";
    }