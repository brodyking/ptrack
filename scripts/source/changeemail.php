<?php

function changeemail()
{
    if (!isset($_POST["username"]) || !isset($_POST['id']) || !isset($_POST['newemail'])) {
        apiError("changeemail.missingparams");
    } else if (userSessionGet($_POST["username"]) != $_POST["id"]) {
        apiError("changeemail.invalidid");
    } else {
        if ($_POST['newemail'] == "") {
            userSettingsDelete($_POST["username"], "email");
        } else {
            userSettingsSet($_POST["username"], "email", $_POST['newemail']);
        }
        Header("Location: /");
    }
}

?>