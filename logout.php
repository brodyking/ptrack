<?php
// Confirms username and password, then redirects you to your homepage.
include("data/database.php");
$username = $_GET['username'];
if (userExists($username)) {

    // Clear session id
    userSessionClear($username);
    // Redirect to login
    header("Location: index.php");

} else {
    header("Location: index.php?error=nouser");
}
?>