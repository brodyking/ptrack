<!DOCTYPE html>
<html>

<head>
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login ~ Pouchtrack</title>
  <link rel="icon" type="image/x-icon" href="assets/logo.png">
</head>

<body data-bs-theme="dark" style="padding: 10px;">
  <div style="max-width:700px;margin:auto;">

    <?php

    include("modules/head.php");

    if (isset($_GET['error'])) {
      switch ($_GET['error']) {
        case "nouser":
          echo '<div class="alert alert-danger" role="alert">Invalid Username </div>';
          break;
        case "wrongpswd":
          echo '<div class="alert alert-danger" role="alert">Incorrect Password </div>';
          break;
        case "noreg":
          echo '<div class="alert alert-warning" role="alert">User Registration is not currently available.</div>';
          break;
        case "invalidsession":
          echo '<div class="alert alert-danger" role="alert">Invalid Session </div>';
          break;
        case "regtaken":
          echo '<div class="alert alert-warning" role="alert">Username already taken.</div>';
          break;
        case "unknown":
          echo '<div class="alert alert-danger" role="alert">An Unknown Error Occoured </div>';
          break;
        case "deleted":
          echo '<div class="alert alert-success" role="alert">Account Deleted</div>';
          break;
        case "passwordchange":
          echo '<div class="alert alert-success" role="alert">Password Changed</div>';
          break;
        default:
          break;
      }
    }

    include("pages/index.html");
    ?>


    <script src="assets/js/bootstrap.js"></script>

</body>

</html>