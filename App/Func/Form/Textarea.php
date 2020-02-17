<?php

    function textarea($name, $label = null, $options = []) {
        $label  = label($label);
        $html   = '<textarea name="'. $name .'">' .getValue($name). '</textarea>';
        return surround($label . $html);
    }