<!DOCTYPE html>
<html>

<head>
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <?php include "data/database.php"; // Access Dataabase ?>
  <title>Login ~ <?php echo getSiteName(); ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="assets/logo.png">
  <link rel="apple-touch-icon" sizes="180x180" href="assets/logo-180.png">
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />


</head>
<body data-bs-theme="dark" style="padding: 10px;">
  <div style="max-width:900px;margin:auto;">
    <?php if (settingsGet("site.isindev") == "true") { include "pages/motd.html"; } ?>
    <div class="card">
      <nav class="navbar navbar-expand-lg rounded card-header p-0 border-bottom-0">
        <div class="container-fluid pe-1 ps-2">
          <a class="navbar-brand me-2" href="index.php">
            <img src="/assets/logo.png" alt="Logo" height="24" class="d-inline-block align-text-top me-1">
            <?php echo getSiteName(); ?> 
          </a>
          <!--<button class="navbar-toggler navbar-toggler-sm" type="button" data-bs-toggle="collapse"data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"aria-label="Toggle navigation"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16" style="vertical-align: -10%;"><path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/></svg> -->
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-house-fill" viewBox="0 0 16 16" style="vertical-align: -10%;">
                    <path
                      d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                    <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
                  </svg> Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#terms">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-diamond-fill" viewBox="0 0 16 16" style="vertical-align: -10%;">
                  <path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927"/>
                </svg> FAQ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#terms">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-info-circle-fill" viewBox="0 0 16 16" style="vertical-align: -10%;">
                    <path
                      d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2" />
                  </svg> Terms of Service</a>
              </li>
            </ul>
          </div>
          <a href="https://github.com/brodyking/ptrack/" class="btn btn-sm btn-success ">Support on Github <svg
              xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github"
              viewBox="0 0 16 16" style="vertical-align: -10%;">
              <path
                d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8" />
            </svg></a>
        </div>
      </nav>
    </div>


    <div class="container p-3 text-center">
      <h1 class="mb-3 fw-semibold lh-1 text-center text-gradient"
        style="  background: -webkit-linear-gradient(#77a6f7,#106EFD);-webkit-background-clip: text;-webkit-text-fill-color: transparent;margin-top:50px;font-size:28pt;">
        Next-Generation Nicotine Tracking</h1>
      <p class="text-center" style="font-size:13pt;">Track your nicotine habits, <i>with ease</i>.</p>
      <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#register">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-add"
          viewBox="0 0 16 16">
          <path
            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
          <path
            d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4" />
        </svg> Create an Account</a>

    </div>
    <br><br>




    <div class="card p-0 border-0 bg-transparent">
      <div class="row g-2" style="margin: 0px!important;">
        <div class="col-md ps-0">
          <?php include "pages/announcements.html"; ?>
        </div>
        &nbsp;
        <div class="col-md pe-0">
          <div class="card">
            <h5 class="card-header"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-key-fill" viewBox="0 0 16 16" style="vertical-align: 0%;">
                <path
                  d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2M2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
              </svg> Login</h5>
            <div class="card-body">
              <h5 class="card-title">It's good to see you!</h5>
              <p class="card-text">An account is required. You can register or login below.</p>
              <form method="POST" action="login.php">
                <?php if (isset($_GET['error'])) {
                    switch ($_GET['error']) {
                        case "nouser":
                            echo '<div class="alert alert-danger" role="alert">Invalid Username. </div>';
                            break;
                        case "wrongpswd":
                            echo '<div class="alert alert-danger" role="alert">Incorrect Password. </div>';
                            break;
                        case "noreg":
                            echo '<div class="alert alert-danger" role="alert">User Registration is disabled.</div>';
                            break;
                        case "nologin":
                            echo '<div class="alert alert-danger" role="alert">Account Login is disabled.</div>';
                            break;
                        case "invalidsession":
                            echo '<div class="alert alert-danger" role="alert">Invalid Session.  <a href="#faq-invalid-session" class="text-danger-emphasis">Troubleshoot</a> </div>';
                            break;
                        case "regtaken":
                            echo '<div class="alert alert-warning" role="alert">Username already taken.</div>';
                            break;
                        case "unknown":
                            echo '<div class="alert alert-danger" role="alert">An Unknown Error Occoured. </div>';
                            break;
                        case "deleted":
                            echo '<div class="alert alert-success" role="alert">Account Deleted.</div>';
                            break;
                        case "passwordchange":
                            echo '<div class="alert alert-success" role="alert">Password Changed.</div>';
                            break;
                        case "securesessionchange":
                            echo '<div class="alert alert-success" role="alert">Secure ID Setting Changed. You have been logged out.</div>';
                            break;
                        default:
                            break;
                    }
                } ?>

                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Username</label>
                  <input type="text" class="form-control" name="username">
                </div>
                <div class="mb-3">
                  <label for="message-text" class="col-form-label">Password</label>
                  <input type="password" class="form-control" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
              </form>
            </div>
          </div>
        </div>


      </div>
    </div>

    <br>
    <?php
    include "pages/help.html";
    include "pages/paperwork.html";
    include "modules/footer.php";
    ?>



  </div>


  <div class="modal fade" id="register" tabindex="-1" aria-labelledby="register" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-dark">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="register">Create an Account</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="register.php">
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Username</label>
              <input type="text" class="form-control" name="username">
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Password</label>
              <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
          </form>
        </div>
        <div class="modal-footer">
          <i>By clicking Register, you agree to the Terms of Service located at the bottom of this page.</i>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/js/bootstrap.js"></script>

</body>

</html>