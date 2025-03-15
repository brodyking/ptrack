<?php 

function checkToday() {
    global $username;
    if (!pouchExists($username,date(("m-d-Y")))) {
        pouchInit($username,date("m-d-Y"));
    }
}
    
?>