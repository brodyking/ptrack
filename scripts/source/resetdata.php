<?php

function resetdata()
{
    if (!isset($_COOKIE["username"]) || !isset($_COOKIE["id"])) {
        apiError("resetdata.missingparams");
    } else if ($_COOKIE["id"] != userSessionGet($_COOKIE['username'])) {
        apiError("resetdata.invalidsession");
    } else {
        pouchReset($_COOKIE["username"]);
        canReset($_COOKIE["username"]);
        Header("Location: /");
    }
}
?>