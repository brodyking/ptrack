<?php

include "data/database.php";
include "scripts/scripts.php";

include scriptsGet("login");
include scriptsGet("register");
include scriptsGet("count");
include scriptsGet("cans");
include scriptsGet("logout");
include scriptsGet("deleteaccount");
include scriptsGet("changepswd");
include scriptsGet("changeemail");
include scriptsGet("resetdata");

function apiError($msg)
{
    Header("Location: /?error=" . $msg);
}

// This is used when the API is done. It checks if the user has secure session and makes a new id depending on that.
function apiFinish()
{
    Header("Location: /");
}
function apiFinishMode($input)
{
    if ($input == "pouches") {
        Header("Location: /?pmonth");
    } else if ($input == "cans") {
        Header("Location: /?cmonth");
    } else {
        Header("Location: /");
    }
}

if (!isset($_GET["action"])) {
    apiError("api.missingparams");
}

switch ($_GET["action"]) {

    case "login":
        login();
        break;

    case "register":
        register();
        break;

    case "count":
        countAPI();
        break;

    case "cans":
        cans();
        break;

    case "logout":
        logout();
        break;

    case "deleteaccount":
        deleteaccount();
        break;

    case "changepswd":
        changepswd();
        break;

    case "changeemail":
        changeemail();
        break;

    case "resetdata":
        resetdata();
        break;

    default:
        apiError("api.missingparams");
        break;

}

?>