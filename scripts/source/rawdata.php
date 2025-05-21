<?php
function rawdata()
{

    if (!isset($_GET["username"]) || !isset($_GET["id"]) || !isset($_GET["source"])) {
        apiError("rawdata.missingparams");
    } else if (!userExists($_GET["username"])) {
        apiError("rawdata.nouser");
    } else if ($_GET["id"] != userSessionGet($_GET["username"])) {
        apiError("rawdata.invalidsession");
    } else if (userSettingsGet($_GET["username"], "allowapi") == "false") {
        apiError("rawdata.apidisabled");
    } else {
        switch ($_GET["source"]) {
            case "pouches":
                echo file_get_contents("data/db_users/{$_GET["username"]}/pouches.json");
                break;
            case "cans":
                echo file_get_contents("data/db_users/{$_GET["username"]}/cans.json");
                break;
            case "account":
                $accountdata = file_get_contents("data/db_users/{$_GET["username"]}/account.json");
                $accountdata = json_decode($accountdata, true);
                unset($accountdata["password"]);
                $accountdata = json_encode($accountdata, JSON_PRETTY_PRINT);
                echo $accountdata;
                break;
            default:
                apiError("rawdata.invalidparams");
                break;
        }
    }
}


?>