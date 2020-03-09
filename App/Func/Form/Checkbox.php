<?php

    function checkbox($name, $label = null, $options = []) {
        //$text = '<input type="hidden" name="'. $name .'" value="'.$options['value'].'">';
        $text = '<label>'.$options['value'].'</label>';
        $text.= '<input type="checkbox" name="'. $name .'" value="'.$options['value'].'">';
        return $text;
    }