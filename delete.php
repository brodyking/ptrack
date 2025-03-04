<?php
// Confirms username and password, then redirects you to your homepage.
include "data/database.php";
if (isset($_GET['username']) && isset($_GET['id'])) {
    $username = $_GET['username'];
    $id = $_GET['id'];
    if (userExists($username)) {
        if ($id == userSessionGet($username)) {
            userDelete($username);
            userSessionClear($username);
            header("Location: index.php?error=deleted");
        }
    } else {
        header("Location: index.php?error=nouser");
    }
}
?>
