<!DOCTYPE html>
<html>

<head>
    <?php

    // Database
    include_once "data/database.php";
    // Modules
    include_once "modules/modules.php";
    // Scripts
    include_once "scripts/scripts.php";

    // Script Importing 
    include scriptsGet("isloggedin");
    include scriptsGet("error");
    include scriptsGet("checktoday");
    include scriptsGet("pagetitle");

    ?>

    <!--- 

    Pouchtrack.net - Nicotine Pouch Tracker
    (c) 2025 Brody King. Read license before modification.
    
    -> https://github.com/brodyking/ptrack/
    -> https://github.com/brodyking/ptrack/blob/main/LICENSE.md
    
    --->

    <!--- Styles --->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/icons/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="/assets/main.css" rel="stylesheet">

    <!--- Title (Changed by JS) --->
    <title>Pouchtrack</title>

    <!--- Meta Tags --->
    <meta name="title" content="Pouchtrack">
    <meta name="description" content="Track your Nicotine Pouch usage for free, without ads.">
    <meta name="keywords"
        content="nicotine, nicotine pouch, nicotine pouch tracker, pouch tracker, zyn tracker, nicotine pouches, pouchtrack, pouch track, pouchbuddy">
    <meta name="robots" content="index, follow">
    <meta name="language" content="English">
    <meta name="revisit-after" content="30 days">
    <meta name="author" content="Brody King">

    <!--- PWA and Icons --->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="assets/logo.png">
    <link href="assets/logo-180.png" rel="apple-touch-icon" sizes="180x180">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="Pouchtrack">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="theme-color" content="#272057">

</head>

<body data-bs-theme="dark">
    <main>
        <?php

        // Tracking
        if (!isset($_SERVER['HTTP_USER_AGENT'])) {
            $tracking = ["username" => null, "page" => null, "date" => date("m-d-Y h:i:s A"), "device" => "undefined"];
        } else {
            $tracking = ["username" => null, "page" => null, "date" => date("m-d-Y h:i:s A"), "device" => $_SERVER["HTTP_USER_AGENT"]];
        }

        // Errors 
        if (errorIsRecieved()) {
            errorPrint();
        }

        // If the user is logged in, we set cookies and local variables that are used later. 
        if (isLoggedIn()) {

            // These are used in almost every part of the app. DO NOT TOUCH.
            $username = $_COOKIE['username'];
            $tracking["username"] = $username;
            $id = $_COOKIE['id'];

            // Checks if current day has an entry
            checkToday();

            // Rendered Items when logged in
            include modulesGetPath("install");
        }

        // Global navigation
        include modulesGetPath("nav");

        // Individual pages
        if (isset($_GET["paperwork"])) {

            // Paperwork/TOS
            include modulesGetPath("paperwork");
            pagetitleSet("Paperwork");
            $tracking["page"] = "paperwork";

        } else if (isset($_GET["login"])) {

            // Login
            include modulesGetPath("login");
            pagetitleSet("Login");
            $tracking["page"] = "login";

        } else if (isset($_GET["register"])) {

            // Register
            include modulesGetPath("register");
            pagetitleSet("Register");
            $tracking["page"] = "register";

        } else if (isset($_GET["bugreport"])) {

            // Login
            include modulesGetPath("bugreport");
            pagetitleSet("Bug Reporting");
            $tracking["page"] = "bugreport";

        } else if (isset($_GET["changes"])) {

            // Changelog
            include modulesGetPath("changes");
            pagetitleSet("Recent Changes");
            $tracking["page"] = "changes";

        } else if (isset($_GET["httperror"])) {

            // 404 Page
            include modulesGetPath("httperror");

        } else if (isLoggedIn() && userIsAdmin($username) && isset($_GET["manage"]) && settingsGet("site.allowManage") == true) {

            // Manager Page
            include modulesGetPath("manage");
            pagetitleSet("Manage");

        } else if (isLoggedIn() && isset($_GET["settings"])) {

            // Settings Page
            include modulesGetPath("settings");
            pagetitleSet("Settings");

        } else if (isLoggedIn()) {

            // Dashboard w/ Graph
            include modulesGetPath("welcome");
            include modulesGetPath("dashboard");
            $tracking["page"] = "dashboard";

        } else {

            // Splash
            include modulesGetPath("splash");
            $tracking["page"] = "splash";

        }

        // Sets the title of the page.
        pagetitleShow();


        if (!isset($_GET['manage'])) {
            trackingViewsAdd(date("m-d-Y"));
            $uri = $_SERVER['REQUEST_URI'];
            $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
            $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            trackingLogsAdd($tracking["username"], $tracking["page"], $tracking["date"], $tracking["device"], $_SERVER['REMOTE_ADDR'], $url);
        }



        ?>
    </main>
    <?php
    include modulesGetPath("footer");
    ?>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>