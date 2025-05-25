<?php

function data()
{
    if (!isset($_COOKIE["username"]) || !isset($_COOKIE["id"]) || !isset($_GET["type"]) || !isset($_GET["deed"])) {
        apiError("data.missingparams");
    } else if (!userExists($_COOKIE["username"])) {
        apiError("data.nouser");
    } else if (userSessionGet($_COOKIE["username"]) != $_COOKIE["id"]) {
        apiError("data.invalidsession");
    } else {
        switch ($_GET["type"]) {
            case "pouches":
                switch ($_GET["deed"]) {
                    case "reset":
                        pouchInit($_COOKIE['username'], date("m-d-Y"));
                        apiFinishMode("pouches");
                        break;
                    case "add":
                        if (!isset($_GET["strength"])) {
                            apiError("data.missingparams");
                        } else {
                            pouchAdd($_COOKIE['username'], date("m-d-Y"), $_GET['strength']);
                            apiFinishMode("pouches");
                        }
                        break;
                    case "set":
                        if (!isset($_GET["strength"]) || !isset($_GET["amount"]) || !isset($_GET["date"])) {
                            apiError("data.missingparams");
                        } else {
                            pouchSet($_COOKIE["username"], $_GET["date"], $_GET["amount"], $_GET["strength"]);
                            apiFinishMode("pouches");
                        }
                        break;
                    default:
                        apiError("data.invalidparams");
                        break;
                }
                break;
            case "cans":
                switch ($_GET["deed"]) {
                    case "reset":
                        canInit($_COOKIE['username'], date("m-d-Y"));
                        apiFinishMode("cans");
                        break;
                    case "add":
                        canAdd($_COOKIE["username"], date("m-d-Y"));
                        apiFinishMode("cans");
                        break;
                    case "set":
                        if (!isset($_GET["date"]) || !isset($_GET["amount"])) {
                            apiError("data.missingparams");
                        } else {
                            canSet($_COOKIE["username"], $_GET["date"], $_GET["amount"]);
                            apiFinishMode("cans");
                        }
                        break;
                    default:
                        apiError("data.invalidparams");
                        break;
                }
                break;
            default:
                apiError("data.invalidparams");
        }

    }
}

?>