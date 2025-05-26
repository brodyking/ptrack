<?php
function rawdata()
{

    if (!isset($_GET["username"]) || !isset($_GET["id"]) || !isset($_GET["source"])) {
        $error = array("errorCode" => "rawdata.missingparams", "errorDetail" => "Missing parameters while accessing API.", "requiredParams" => ["username", "id", "source"]);
        echo json_encode($error, JSON_PRETTY_PRINT);
    } else if (!userExists($_GET["username"])) {
        $error = array("errorCode" => "rawdata.nouser", "errorDetail" => "No user exists under that username.");
        echo json_encode($error, JSON_PRETTY_PRINT);
    } else if ($_GET["id"] != userSessionGet($_GET["username"])) {
        $error = array("errorCode" => "rawdata.invalidsession", "errorDetail" => "Invalid session. You can find your Session ID in the Settings page.");
        echo json_encode($error, JSON_PRETTY_PRINT);
    } else if (userSettingsGet($_GET["username"], "allowapi") == "false") {
        $error = array("errorCode" => "rawdata.apidisabled", "errorDetail" => "Your account has the API disabled. You can enable it in the settings page.");
        echo json_encode($error, JSON_PRETTY_PRINT);
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
                $hiddenpassword = "";
                for ($i = 0; $i < strlen($accountdata["password"]); $i++) {
                    $hiddenpassword = $hiddenpassword . "*";
                }
                $accountdata["password"] = $hiddenpassword;
                $accountdata = json_encode($accountdata, JSON_PRETTY_PRINT);
                echo $accountdata;
                break;
            default:
                $error = array("errorCode" => "rawdata.invalidparams", "errorDetail" => "Invalid Source.", "sourceOptions" => ["pouches", "cans", "account"]);
                echo json_encode($error, JSON_PRETTY_PRINT);
                break;
        }
    }
}


?>