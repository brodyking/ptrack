<?php

header('Content-type: text/plain; charset=utf-8');

include "data/database.php";
include "scripts/scripts.php";

include scriptsGet("login");
include scriptsGet("register");
include scriptsGet("logout");
include scriptsGet("deleteaccount");
include scriptsGet("changepswd");
include scriptsGet("changeemail");
include scriptsGet("resetdata");
include scriptsGet(name: "bugreport");
include scriptsGet(name: "rawdata");
include scriptsGet(name: "toggleapi");
include scriptsGet("data");

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

    case "bugreport":
        bugreport();
        break;

    case "rawdata":
        rawdata();
        break;

    case "toggleapi":
        toggleapi();
        break;

    case "data":
        data();
        break;

    default:
        apiError("api.missingparams");
        break;

}

?>