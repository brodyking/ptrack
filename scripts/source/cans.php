<?php
function cans()
{
    if (!isset($_COOKIE["username"]) || !isset($_COOKIE["id"]) || !isset($_GET['deed'])) {
        // Check if params exist
        apiError("cans.missingparams");
    } else if (!userExists($_COOKIE["username"])) {
        // Check if user exists
        apiError("cans.nouser");
    } else if (userSessionGet($_COOKIE['username']) != $_COOKIE["id"]) {
        // If invalid ID
        apiError("cans.invalidsession");
    } else if ($_GET['deed'] == "reset") {
        // If it is a reset request
        canInit($_COOKIE['username'], date("m-d-Y"));
        apiFinishMode("cans");
    } else {
        canAdd($_COOKIE['username'], date("m-d-Y"));
        apiFinishMode("cans");
    }
}
?>