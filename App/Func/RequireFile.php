<?php 

function getWidjet($file, $items) {
    extract(json_decode(json_encode($items), true));
    ob_start();
    require APP . "Component" . DS .  ucfirst($file) . DS .  "index.php";
    $dataWIdjet = ob_get_clean();
    $lang = require APP . "Lang" . DS . "lang." . $_SESSION['local'] . ".php";
    $dataWIdjet = i18n($dataWIdjet, $lang);
    return $dataWIdjet;
}