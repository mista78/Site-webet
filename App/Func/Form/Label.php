<?php

    function label($name, $options = []) {
        if($name != null) {
            return '<label for="'. $name .'">' .$name. '</label>';
        }
    }