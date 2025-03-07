<!DOCTYPE html>
<html>

<head>
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <title>Settings ~ Pouchtrack</title>
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
    <!-- Pouch Selection -->
    <?php include "modules/head.php"; ?>
    <br>

    <div class="card" style="max-width: 425px; margin: auto;">
      <h5 class="card-header"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
          class="bi bi-gear-wide-connected" viewBox="0 0 16 16" style="vertical-align: 0%;">
          <path
            d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5m0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78zM5.048 3.967l-.087.065zm-.431.355A4.98 4.98 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8zm.344 7.646.087.065z">
          </path>
        </svg> Settings
      </h5>
      <div class="card-body">
        <h5 class="card-title">Username</h5>
        <input type="username" class="form-control" disabled value="@<?php echo $username; ?>">
        <br>
        <h5 class="card-title">Join Date</h5>
        <input type="text" class="form-control" disabled value="<?php echo userJoinDate($username); ?>">
        <br>
        <h5 class="card-title">Session ID</h5>
        <input type="text" class="form-control" disabled value="<?php echo $id; ?>">
        <br>
        <h5 class="card-title">Secure Session</h5>
        <p>Secure Session changes your Session ID on every pageload. This is more secure, but refreshing and bookmarks do not work. Use at your own risk.</p>
        <form method="POST" action="secureid.php" class="row p-0">
          <div class="col-auto pe-0">
            <select name="issecure" class="form-select form-select bg-light-subtle" aria-label="Small select example">
              <?php if (userSessionSecureGet($username)) {
                  echo '<option selected value="true">Enabled</option><option value="false">Disabled</option>';
              } else {
                  echo '<option value="true">Enabled</option><option selected value="false">Disabled</option>';
              } ?>
            </select>
            <input type="text" style="display: none" name="username" value="<?php echo $username; ?>">
            <input type="text" style="display: none" name="password" value="<?php echo userPasswordGet($username); ?>">
          </div>
            <div class="col-auto">
              <button type="submit" class="btn btn-primary mb-3">Change</button>
            </div>
          </form>
        <h5 class="card-title">Change Password</h5>
        <p>You may change your password here. Once changed, you will be logged out everywhere.</p>
        <a class="btn btn-primary" style="text-decoration: none;"
          href="changepswd.php?username=<?php echo $username . "&id=" . $id; ?>">Change
          Password</a>
        <br><br>
        <h5 class="card-title">Delete Account</h5>
        <a class="btn btn-danger" style="text-decoration: none;" href="#" data-bs-toggle="modal"
          data-bs-target="#delete">Delete Account</a>
      </div>
    </div>
  </div>

  <!-- Delete Account popup -->
  <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="reset" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="delete">Warning</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>You are about to delete your account. This is permanent and you will not have access to your
            information
            once you click Delete. Do you wish to continue?</p>
        </div>
        <div class="modal-footer">
          <a href="delete.php?<?php echo "username=" . $username . "&id=" . $id; ?>" class="btn btn-danger">Delete my Account</a>
        </div>
      </div>
    </div>
  </div>

  <script src="assets/js/bootstrap.js"></script>
</body>

</html>