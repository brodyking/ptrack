<?php
function bugreport()
{
    if (settingsGet("bugreports")) {

        if (isset($_POST["email"]) && isset($_POST["version"]) && isset($_POST["subject"]) && isset($_POST["bodytext"])) {
            bugReportNew($_POST["email"], $_POST["version"], $_POST["subject"], $_POST["bodytext"]);
            Header("Location: /?bugreport&success");
        } else {
            apiError("bugreport.missingparams");
        }
    } else {
        apiError("bugreport.disabled");
    }
}