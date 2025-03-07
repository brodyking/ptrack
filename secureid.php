<?php

include "data/database.php";
if (!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['issecure'])) {
    header("Location: index.php?error=unknown");
} else {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $issecure = $_POST['issecure'];

    header("Location: index.php?error=securesessionchange");

    userSessionSecureSet($username,$issecure);

}
?>
