<!DOCTYPE html>
<html>

<head>
    <?php

    /*

    (c) 2025 Brody King. All Rights Reserved

    https://github.com/brodyking/ptrack/

    */

    // Database
    include "data/database.php";
    // Modules
    include "modules/modules.php";
    // Scripts
    include "scripts/scripts.php";

    // Script Importing 
    include scriptsGet("isloggedin");
    include scriptsGet("error");
    include scriptsGet("checktoday");

    ?>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/icons/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="assets/main.css" rel="stylesheet">
    <title>Pouchtrack</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="assets/logo.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/logo-180.png">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
</head>

<body data-bs-theme="dark">
    <main>
        <?php

        // Errors 
        if (errorIsRecieved()) {
            errorPrint();
        }


        if (isset($_GET["paperwork"])) {
            include modulesGetPath("nav-splash");
            include modulesGetPath("paperwork");
        } else if (isset($_GET["login"])) {
            include modulesGetPath("nav-splash");
            include modulesGetPath("login");
        } else if (isset($_GET["register"])) {
            include modulesGetPath("nav-splash");
            include modulesGetPath("register");
        } else if (isset($_GET["changes"])) {
            include modulesGetPath("nav-splash");
            include modulesGetPath("changes");
        }
        // Check if logged in
        else if (isLoggedIn()) {

            $username = $_COOKIE['username'];

            // Secure Session ID Changing
            $id = $_COOKIE['id'];


            // Checks if entry for current date is set, if not, creates a blank one
            checkToday();

            // Rendered Items when logged in
            include modulesGetPath("nav-loggedin");
            include modulesGetPath("settings");
            include modulesGetPath("install");
            include modulesGetPath("welcome");
            include modulesGetPath("dashboard");

        } else {

            // Rendered Items when logged out
            include modulesGetPath("nav-splash");
            include modulesGetPath("splash");
        }

        ?>
    </main>
    <?php
    include modulesGetPath("footer");
    ?>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>