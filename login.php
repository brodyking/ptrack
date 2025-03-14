<?php
// Confirms username and password, then redirects you to your homepage.
include "data/database.php";
$username = $_POST['username'];
$password = $_POST['password'];
if (settingsGet("users.allowLogin") != "true") {
    header("Location: index.php?error=nologin");
} else {
    if (userExists($username)) {
        if (userAuth($username, $password)) {
            if (!file_exists("data/db_users/@" . $username . "/" . $username . ".isdeleted")) {
                // Create new id for session
                $id = userSessionCreate($username);
                header("Location:  app.php?firstlogin=true&username=" . $username . "&id=" . $id);
            } else {
                header("Location: index.php?error=wrongpswd");
            }
        } else {
            // Reset old id for security purposes
            userSessionClear($username);
            header("Location: index.php?error=wrongpswd");
        }
    } else {
        header("Location: index.php?error=nouser");
    }
}
?>
