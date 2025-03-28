<?php
function cans() {
    if (!isset($_GET["username"]) || !isset($_GET["id"]) || !isset($_GET['deed'])) {
        // Check if params exist
        apiError("cans.missingparams");
    } else if (!userExists($_GET["username"])) {
        // Check if user exists
        apiError("cans.nouser");
    } else if (userSessionGet($_GET['username']) != $_GET["id"]) {
        // If invalid ID
        apiError("cans.invalidsession");
    } else if ($_GET['deed'] == "reset") {
        // If it is a reset request
        canInit($_GET['username'],date("m-d-Y"));
        apiFinishMode("cans");
    } else {
        canAdd($_GET['username'],date("m-d-Y"));
        apiFinishMode("cans"); 
    }
}
?>