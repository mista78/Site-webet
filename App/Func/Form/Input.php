<?php 

    function input($name, $label = null, $options = []) {
        $type = isset($options['type']) ? $options['type'] : "text";
        $exeception =  ['type','after','before','surrond'];
        $attr  = attribute($options, $exeception);
        $label = label($label);
        $input = ' <input '.$attr.' type="'. $type .'" name="'. $name .'" value="' . getValue($name) . '"> ';
        return surround($label . $input);
    }

    function submit ($name= "Envoyer") {
        return surround("<button type='submit'>$name</button>");
    }