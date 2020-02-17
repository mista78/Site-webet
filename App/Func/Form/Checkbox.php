<?php

    function checkbox($name, $label = null, $options = []) {
        $text = '<input type="hidden" name="'. $name .'" value="0">';
        $text.= '<input type="checkbox" name="'. $name .'" value="1"> online';
        return $text;
    }