<?php

function register()
{
    if (settingsGet("users.allowNewAccounts") != "true") {
        // Check if registration is allowed
        apiError("register.disabled");
    } else if (!isset($_POST["username"]) || !isset($_POST['password'])) {
        // Check if params exist
        apiError("register.missingparams");
    } else if (str_contains($_POST["username"], "&")) {
        // Check if it contains an & symbol
        apiError("register.invalidchars");
    } else if (userExists($_POST["username"])) {
        // Check if user already exists
        apiError("register.taken");
    } else {
        // Create user
        userCreate(strtolower($_POST["username"]), $_POST["email"], $_POST["password"]);
        setcookie("username", strtolower($_POST['username']), time() + (86400 * 30), "/");
        setcookie("id", userSessionCreate(strtolower($_POST['username'])), time() + (86400 * 30), "/");
        Header("Location: /");
    }
}

?>