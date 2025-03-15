<?php

function deleteaccount() {
    if (!isset($_GET["username"]) || !isset($_GET["id"])) {
        apiError("deleteaccount.missingparams");
    } else {
        userDelete($_GET["username"]);
        Header("Location: /");
    }
}
?>