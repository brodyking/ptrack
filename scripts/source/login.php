<?php
function login() {
    if (settingsGet("users.allowLogin") != "true") {
         // Check if login is allowed 
        apiError("login.disabled");       
    } else if (!isset($_POST["username"]) || !isset($_POST['password'])) { 
        // Check if params exists
        apiError("login.missingparams");
    } else if (!userExists($_POST["username"])) {
        // Check if user exists
        apiError("login.nouser");
    } else if (userSettingsGet($_POST["username"],"isdeleted") == "true") {
        apiError("login.userdeleted");
    } else if (userAuth($_POST['username'],$_POST['password'])) {
        // Check if password is correct
        Header("Location: /?username=".$_POST['username']."&id=".userSessionCreate($_POST['username']));
    } else {
        // If password is incorrect
        apiError('login.incorrect');
    }
}
    
?>