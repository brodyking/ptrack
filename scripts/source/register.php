<?php

function register() {
    if (settingsGet("users.allowNewAccounts") != "true") {
        // Check if registration is allowed
        apiError("register.disabled");
    } else if (!isset($_POST["username"]) || !isset($_POST['password'])) {
        // Check if params exist
        apiError("register.missingparams");
    } else if (str_contains($_POST["username"],"&")) {
        // Check if it contains an & symbol
        apiError("register.invalidchars");
    } else if (userExists($_POST["username"])) {
        // Check if user already exists
        apiError("register.taken");
    } else {
        // Create user
        userCreate($_POST["username"],$_POST["password"]);
        Header("Location: /?username=".$_POST["username"]."&id=".userSessionCreate($_POST['username']));
    }
}

?>