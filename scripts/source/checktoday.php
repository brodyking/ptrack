<?php 

function checkToday() {
    global $username;
    if (!pouchExists($username,date(("m-d-Y")))) {
        pouchInit($username,date("m-d-Y"));
    }
    if (!canExists($username,date("m-d-Y"))) {
        canInit($username,date("m-d-Y"));
    }
}
    
?>