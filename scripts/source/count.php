<?php

function countAPI() {
    if (!isset($_GET["username"]) || !isset($_GET["id"]) || !isset($_GET['strength'])) {
        // Check if params exist
        apiError("count.missingparams");
    } else if (!userExists($_GET["username"])) {
        // Check if user exists
        apiError("count.nouser");
    } else if (userSessionGet($_GET['username']) != $_GET["id"]) {
        // If invalid ID
        apiError("count.invalidsession");
    } else if ($_GET['strength'] == "reset") {
        // If it is a reset request
        pouchInit($_GET['username'],date("m-d-Y"));
        apiFinishMode("pouches");
    } else {
        pouchAdd($_GET['username'],date("m-d-Y"),$_GET['strength']);
        apiFinishMode("pouches"); 
    }
}

?>