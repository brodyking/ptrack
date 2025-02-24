<?php
// Confirms username and password, then redirects you to your homepage.
include("data/database.php");

if (!isset($_GET['username']) || !isset($_GET['id']) || !isset($_GET['strength'])) {
    header("Location: index.php?error=unknown");
}

$username = $_GET['username'];
$id = $_GET['id'];
$strength = $_GET['strength'];

if (userExists($username)) {
    if (userSessionGet($username) == $id) {

        if ($strength == "reset") {
            pouchInit($username,date('m-d-Y'));
        } else {
            pouchAdd($username,date("m-d-Y"),$strength);
        }
        header("Location: app.php?username=".$username."&id=".$id);
    } else {
        // Reset old id for security purposes
        userSessionClear($username);
        header("Location: index.php?error=invalidsession");
    }
} else {
    header("Location: index.php?error=nouser");
}
?>