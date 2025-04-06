<?php

function deleteaccount()
{
    if (!isset($_COOKIE["username"]) || !isset($_COOKIE["id"])) {
        apiError("deleteaccount.missingparams");
    } else if ($_COOKIE["id"] != userSessionGet($_COOKIE['username'])) {
        apiError("deleteaccount.invalidsession");
    } else {
        userDelete($_COOKIE["username"]);
        userSessionClear($_COOKIE["username"]);
        Header("Location: /");
    }
}
?>