<?php

function changepswd() {
    if (!isset($_POST["username"]) || !isset($_POST['id']) || !isset($_POST['oldpassword']) || !isset($_POST['newpassword'])) {
        apiError("changepswd.missingparams");
    } else if (!userAuth($_POST['username'],$_POST['oldpassword'])) {
        apiError("changepswd.incorrectold");
    } else if (userSessionGet($_POST["username"]) != $_POST["id"]) {
        apiError("changepswd.invalidid");
    } else {
        userSettingsSet($_POST["username"],"password",$_POST['newpassword']);
        userSessionClear($_POST['username']);
        Header("Location: /");
    }
}

?>