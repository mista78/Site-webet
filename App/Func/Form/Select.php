<?php 


function select($name, $label = null, $options = []) {
    $attr = attribute($options, ['surrond','options']);
    $options["options"] = isset($options["options"]) ? $options["options"] : [];
    $label = label($label);
    $html = "<select name='$name' $attr>";
    $html .= "<option value=''> </option>";
    foreach ($options['options'] as $k => $v) {
        if (getValue($name) == $k) {
            $selected = "selected";
        } else {
            $selected = "";
        }

        $html .= "<option value='$k' $selected> $v </option>";
    }
    $html .= "</select>";
    return surround($label . $html);   
}