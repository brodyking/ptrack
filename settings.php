<!DOCTYPE html>
<html>

<head>
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Settings ~ Pouchtrack</title>
  <link rel="icon" type="image/x-icon" href="assets/logo.png">
</head>

<body data-bs-theme="dark" style="padding: 10px;">
  <div style="max-width:700px;margin:auto;">
    <?php
    include("modules/head.php"); // Top Navigation Barr
    include("data/database.php"); // Access Dataabase
    
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
    //Creates new day if it does not exist    
    if (!pouchExists($username, date("m-d-Y"))) {
      pouchInit($username, date("m-d-Y"));
    }
    ?>
    <!-- Pouch Selection -->
    <?php include("modules/settings.php"); ?>

    <script src="assets/js/bootstrap.js"></script>
</body>

</html>