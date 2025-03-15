<?php

function modulesGet($name) {
    $modules = json_decode(file_get_contents("modules/modules.json"),true);
    return file_get_contents($modules[$name]["source"]);
}

function modulesGetPath($name) {
    $modules = json_decode(file_get_contents("modules/modules.json"),true);
    return $modules[$name]["source"];
}

function modulesRender($name) {
    echo modulesGet($name);
}

?>