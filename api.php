<?php

include "data/database.php";
include "scripts/scripts.php";

include scriptsGet("login");
include scriptsGet("register");
include scriptsGet("count");
include scriptsGet("cans");
include scriptsGet("logout");
include scriptsGet("deleteaccount");
include scriptsGet("secureid");
include scriptsGet("changepswd");

function apiError($msg)
{
    Header("Location: /?error=" . $msg);
}

// This is used when the API is done. It checks if the user has secure session and makes a new id depending on that.
function apiFinish()
{
    if (userSessionSecureGet($_GET['username'])) {
        Header("Location: /?username=" . $_GET["username"] . "&id=" . userSessionCreate($_GET['username']));
    } else {
        Header("Location: /?username=" . $_GET["username"] . "&id=" . $_GET['id']);
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

    case "secureid":
        secureid();
        break;

    case "changepswd":
        changepswd();
        break;

    default:
        apiError("api.missingparams");
        break;

}

?>