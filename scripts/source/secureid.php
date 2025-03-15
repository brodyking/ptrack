<?php

function secureid()
{
    if (!isset($_POST['username']) || !isset($_POST['id']) || !isset($_POST['issecure'])) {
        apiError("secureid.missingparams");
    } 
    else if (userSessionGet($_POST['username']) != $_POST['id']){
        apiError('secureid.invalidid');
    } else {
        userSessionSecureSet($_POST['username'],$_POST['issecure']);
        Header("Location: /?username=" . $_POST["username"] . "&id=" . $_POST['id']);
    }
}

?>