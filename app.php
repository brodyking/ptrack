<!DOCTYPE html>
<html>

<head>
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <title>Home ~ Pouchtrack</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="assets/logo.png">
  <link rel="apple-touch-icon" sizes="180x180" href="assets/logo-180.png">
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

</head>

<body data-bs-theme="dark" style="padding: 10px;">
  <div style="max-width:900px;margin:auto;">
    <?php
    include "data/database.php"; // Access Dataabase

    // Verify that userrname and ID are present in URL
    if (!isset($_GET['username']) || !isset($_GET['id'])) {
        header("Location: index.php?error=invalidsession");
    }
    // Set variables
    $username = $_GET['username'];
    $id = $_GET['id'];
    // Check if users session is valid
    if (userSessionGet($username) != $id) {
        // Reset the session for security purposes.
        userSessionClear($username);
        // Redirect to login
        header("Location: index.php?error=invalidsession");
    }
    $id = userSessionSecureInit($username);
    //Creates new day if it does not exist
    if (!pouchExists($username, date("m-d-Y"))) {
        pouchInit($username, date("m-d-Y"));
    }
    ?>
    <!-- Navbar -->
    <?php
    include "modules/head.php";
    include "modules/today.php";
    ?>

    <br>

    <div class="card p-0 border-0">
      <div class="row g-2" style="margin: 0px!important;">
        <div class="col-md ps-0">
          <!-- Pouch Selection -->
          <?php include "modules/selection.php"; ?>
          <br>
          <!-- Statistics for currrent day -->
          <?php include "modules/statistics.php"; ?>
        </div>
        &nbsp;
        <div class="col-md pe-0">

          <!-- History -->
          <?php include "modules/history.php"; ?>
        </div>
      </div>
      <br>
      <!-- Clear Statistics for today popup -->
      <?php include "modules/appdialogs.php"; ?>
      <!-- Footer -->
      <?php include "modules/footer.php"; ?>
      <script src="assets/js/bootstrap.js"></script>
      </div></div>
</body>

</html>