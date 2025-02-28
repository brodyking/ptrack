<?php

include("data/database.php");

if (!isset($_POST['username']) || !isset($_POST['password'])) {
    header("Location: index.php?error=unknown");
} else {


$username = $_POST['username'];
$password = $_POST['password'];

if (userExists($username)) {
    header("Location: index.php?error=regtaken");
} else if ($username == "") {
    header("Location: index.php?error=cannotbeblank");
}
else {

    
    userCreate($username,$password);
    
    $id = random_int(100000000,1000000000 );
    userSessionInit($username, $id);
    header("Location:  app.php?firstlogin=true&username=" . $username . "&id=" . $id);

}    
}
?>