<?php

header('Content-type: text/plain; charset=utf-8');

include_once "data/database.php";
include_once "scripts/scripts.php";


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
        include scriptsGet("login");
        login();
        break;

    case "register":
        include scriptsGet("register");
        register();
        break;

    case "logout":
        include scriptsGet("logout");
        logout();
        break;

    case "deleteaccount":
        include scriptsGet("deleteaccount");
        deleteaccount();
        break;

    case "changepswd":
        include scriptsGet("changepswd");
        changepswd();
        break;

    case "changeemail":
        include scriptsGet("changeemail");
        changeemail();
        break;

    case "resetdata":
        include scriptsGet("resetdata");
        resetdata();
        break;

    case "bugreport":
        include scriptsGet(name: "bugreport");
        bugreport();
        break;

    case "rawdata":
        include scriptsGet(name: "rawdata");
        rawdata();
        break;

    case "toggleapi":
        include scriptsGet(name: "toggleapi");
        toggleapi();
        break;

    case "data":
        include scriptsGet("data");
        data();
        break;

    default:
        apiError("api.missingparams");
        break;

}

?>