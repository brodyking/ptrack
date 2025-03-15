<?php

function scriptsGet($name) {
    $scripts = json_decode(file_get_contents("scripts/scripts.json"),true);
    return $scripts[$name]["source"];
}


?>