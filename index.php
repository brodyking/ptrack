<!DOCTYPE html>
<html>

<head>
    <?php

    /*

    (c) 2025 Brody King. Read licence before modification.

    https://github.com/brodyking/ptrack/
    https://github.com/brodyking/ptrack/blob/main/LICENSE.md

    */

    // Timezone
    
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
    include scriptsGet("pagetitle");

    ?>
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/icons/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="/assets/main.css" rel="stylesheet">
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

        // Tracking
        $tracking = ["username" => null, "page" => null, "date" => date("m-d-Y h:i:s A"), "device" => $_SERVER['HTTP_USER_AGENT']];

        // Errors 
        if (errorIsRecieved()) {
            errorPrint();
        }

        // If the user is logged in, we set cookies and local variables that are used later. 
        if (isLoggedIn()) {

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

        } else if (isset($_GET["changes"])) {

            // Changelog
            include modulesGetPath("changes");
            pagetitleSet("Changes");
            $tracking["page"] = "changes";

        } else if (isset($_GET["404"])) {

            // 404 Page
            include modulesGetPath("404");
            pagetitleSet("404");
            $tracking["page"] = "404";

        } else if (isLoggedIn() && userIsAdmin($username) && isset($_GET["manage"]) && settingsGet("site.allowmanage") == true) {

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