<?php
$errorOutput = "";
function errorSet($errorname) {
    global $errorOutput;
    $errorOutput = $errorname ;
}
function errorGet() {
    global $errorOutput;
    return $errorOutput;
}
function errorIsSet() {
    global $errorOutput;
    return isset($errorOutput);
}
function errorIsRecieved() {
    if (isset($_GET['error'])) {
        errorSet($_GET['error']);
        return true;
    }
    return false;
}

function errorPretty() {
    global $errorOutput;
    switch ($errorOutput) {
        case "api.missingparams":
            return "Missing parameters while accessing API.";
        case "login.disabled": 
            return "Login is currently disabled.";
        case "login.missingparams":
            return "Missing parameters while logging in.";
        case "login.nouser":
            return "No user exists under that username.";
        case "login.userdeleted":
            return "User has deleted their account.";
        case "login.incorrect":
            return "Incorrect Password.";
        case "register.disabled":
            return "Registration is currently disabled.";
        case "register.missingparams":
            return "Missing parameters while registering.";
        case "register.invalidchars":
            return 'Invalid characters in username. Please only use letters and numbers.';
        case "register.taken":
            return "That username has already been taken.";
        case "count.missingparams":
            return "Missing parameters while Counting.";
        case "count.nouser":
            return "No user exists under that username.";
        case "count.invalidsession":
            return "Invalid Session.";
        case "logout.nouser":
            return "No user exists under that username.";
        case "deleteaccount.missingparams":
            return "Missing parameters while deleting account.";
        case "secureid.missingparams":
            return "Missing parameters while changing Secure ID status.";
        case "secureid.invalidid":
            return "Invalid Session.";
        case "changepswd.missingparams":
            return "Missing parameters while changing password.";
        case "changepswd.incorrectold":
            return "Incorrect old password.";
        case "changepswd.invalidid":
            return "Invalid Session.";
        case "cans.missingparams": 
            return "Missing parameters while modifying Cans.";
        case "cans.nouser":
            return "No user exists under that username.";
        case "cans.invalidsession":
            return "Invalid Session.";
        default:
            return "Unknown Error.";
    }
}

function errorPrint() {
    global $errorOutput;
    echo '<div class="alert alert-danger" role="alert"><i class="bi bi-exclamation-triangle-fill"></i> <b>'.errorPretty()."</b> (".$errorOutput.')</div>' ;
}
function errorClose() {
    global $errorOutput;
    $errorOutput = "";
}
?>