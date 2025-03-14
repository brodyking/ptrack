<!DOCTYPE html>
<html>

<head>
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <?php include "data/database.php"; // Access Dataabase ?>
  <title>Change Password ~ <?php echo getSiteName(); ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="assets/logo.png">
  <link rel="apple-touch-icon" sizes="180x180" href="assets/logo-180.png">
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />


</head>

<body data-bs-theme="dark" style="padding: 10px;">
    <div style="max-width:700px;margin:auto;">


        <?php

        // Check if username and id are present in url
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


        if (isset($_POST['oldpassword']) && isset($_POST['newpassword'])) {
        
            $oldpassword = $_POST['oldpassword']; $newpassword = $_POST['newpassword'];

            if (userAuth($username,$oldpassword)) {

                userChangePassword($username,$newpassword);
                userSessionClear($username);
                header("Location: index.php?error=passwordchange");

            } else {
                header("Location: changepswd.php?error=wrongold&username=".$username."&id=".$id);
            }

        }/*else {
            header("Location: changepswd.php?username=".$username."&id=".$id);
        }*/

        include("modules/head.php");
        // Error Logging
        if (isset($_GET['error'])) {
            switch ($_GET['error']) {
                case "wrongold":
                    echo '<br><div class="alert alert-danger" role="alert">Incorrect Old Password</div>';
                    break;
                default:
                    break;
            }
        }
        ?>
        <br>
        <div class="card">
            <h5 class="card-header">Change Password</h5>
            <div class="card-body">

                <p>You are logged into <b><?php echo $username ?></b>.</p>

                <form method="POST" action="changepswd.php?username=<?php echo $username ."&id=" . $id ?>">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Old Password</label>
                        <input type="password" class="form-control" name="oldpassword">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">New Password</label>
                        <input type="password" class="form-control" name="newpassword">
                        <div id="emailHelp" class="form-text">If you loose access to your account, we will not be able to assist with a password reset.</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </form>

            </div>
        </div>

        <script src="assets/js/bootstrap.js"></script>

</body>

</html>