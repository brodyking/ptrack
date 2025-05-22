<?php
$errorOutput = "";
function errorSet($errorname)
{
    global $errorOutput;
    $errorOutput = $errorname;
}
function errorGet()
{
    global $errorOutput;
    return $errorOutput;
}
function errorIsSet()
{
    global $errorOutput;
    return isset($errorOutput);
}
function errorIsRecieved()
{
    if (isset($_GET['error'])) {
        errorSet($_GET['error']);
        return true;
    }
    return false;
}

$errorCodes = [
    // API is missing action 
    "api.missingparams" => "Missing parameters while accessing API.",
    // Login Errors
    "login.disabled" => "Login is currently disabled.",
    "login.missingparams" => "Missing parameters while logging in.",
    "login.nouser" => "No user exists under that username.",
    "login.userdeleted" => "User has deleted their account.",
    "login.incorrect" => "Incorrect Password.",
    // Registration Errors
    "register.disabled" => "Registration is currently disabled.",
    "register.missingparams" => "Missing parameters while registering.",
    "register.invalidchars" => "Invalid characters in username. Please only use letters and numbers.",
    "register.taken" => "That username has already been taken.",
    // Counting Errors for Pouches
    "count.missingparams" => "Missing parameters while Counting.",
    "count.nouser" => "No user exists under that username.",
    "count.invalidsession" => "Invalid Session.",
    // Logout Errors
    "logout.nouser" => "No user exists under that username.",
    // Account Deletion errors
    "deleteaccount.missingparams" => "Missing parameters while deleting account.",
    "deleteaccount.invalidsession" => "Invalid Session.",
    // Secure ID errors
    //  No longer needed. Kept in case.
    "secureid.missingparams" => "Missing parameters while changing Secure ID status.",
    "secureid.invalidid" => "Invalid Session.",
    // Change Password Errors
    "changepswd.missingparams" => "Missing parameters while changing password.",
    "changepswd.incorrectold" => "Incorrect old password.",
    "changepswd.invalidid" => "Invalid Session.",
    // Counting Errors for Pouches
    "cans.missingparams" => "Missing parameters while modifying Cans.",
    "cans.nouser" => "No user exists under that username.",
    "cans.invalidsession" => "Invalid Session.",
    // Bug Reporting Errors
    "bugreport.missingparams" => "Missing parameters while submitting a Bug Report.",
    "bugreport.disabled" => "Bug Reports are currently disabled.",
    // Raw Data API Errors
    "rawdata.missingparams" => "Missing parameters while accessing API.",
    "rawdata.nouser" => "No user exists under that username.",
    "rawdata.invalidsession" => "Invalid Session.",
    "rawdata.apidisabled" => "You must enable the API on your account to access this information.",
    "rawdata.invalidparams" => "Invalid Source.",
    // Toggling Raw Data API Errors
    "toggleapi.missingparams" => "Missing parameters while changing access to API.",
    "toggleapi.nouser" => "No user exists under that username.",
    "toggleapi.invalidsession" => "Invalid Session."
];

function errorPretty()
{
    global $errorOutput;
    global $errorCodes;
    // Checks for an error code, returns one if it exists
    if (isset($errorCodes[$errorOutput])) {
        return $errorCodes[$errorOutput];
    }
    // If no error code is found.
    return "Unknown Error.";
}

function errorPrint()
{
    global $errorOutput;
    echo '<div class="alert alert-danger" role="alert"><i class="bi bi-exclamation-triangle-fill"></i> <b>' . errorPretty() . "</b> (" . $errorOutput . ')</div>';
}
function errorClose()
{
    global $errorOutput;
    $errorOutput = "";
}
?>