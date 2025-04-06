<?php

function countAPI()
{
    if (!isset($_COOKIE["username"]) || !isset($_COOKIE["id"]) || !isset($_GET['strength'])) {
        // Check if params exist
        apiError("count.missingparams");
    } else if (!userExists($_COOKIE["username"])) {
        // Check if user exists
        apiError("count.nouser");
    } else if (userSessionGet($_COOKIE['username']) != $_COOKIE["id"]) {
        // If invalid ID
        apiError("count.invalidsession");
    } else if ($_GET['strength'] == "reset") {
        // If it is a reset request
        pouchInit($_COOKIE['username'], date("m-d-Y"));
        apiFinishMode("pouches");
    } else {
        pouchAdd($_COOKIE['username'], date("m-d-Y"), $_GET['strength']);
        apiFinishMode("pouches");
    }
}

?>