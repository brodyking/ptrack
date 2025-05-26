<div class="container p-0 m-0 mb-4 text-center" style="min-width: 100%;">
  <h1 class="mb-3 fw-semibold lh-1" style="margin-top:50px;font-size:38pt;">
    Welcome back, <span class="splash-title-primary"><?php echo $username; ?></span>!
  </h1>
  <p class="text-center p-0 m-0" style="font-size:14pt;">You have used <span class="text-primary-emphasis"
      style="font-size:16pt;"><?php echo pouchGetPouches($username, date("m-d-Y")); ?></span>
    <?php
    if (pouchGetPouches($username, date("m-d-Y")) == 1) {
      echo "total pouch ";
    } else {
      echo "total pouches ";
    } ?>
    for a total
    of
    <span class="text-primary-emphasis"
      style="font-size:16pt;"><?php echo pouchGetMgs($username, date("m-d-Y")); ?></span> mgs today.
  </p>
</div>
<?php
if (isset(($_COOKIE["newuserpopup"]))) {
  echo '<div class="alert alert-primary" id="newuserpopup">
  <h5><i class="bi bi-megaphone-fill me-1"></i> Welcome to Pouchtrack!</h5>
  <hr>
  This page here shows your pouches and can usage. To install the app, click the button below.
  <br>
  <a class="btn btn-primary-new mt-3" href="#" data-bs-toggle="modal" data-bs-target="#install"><i class="bi bi-download"></i> Install</a>
  <a class="btn btn-secondary-new mt-3 ms-2" href="#" onclick="closenewuserpopup()"><i class="bi bi-x-lg"></i> Close</a>
  </div>
  <script>
  
  function closenewuserpopup() {
    document.getElementById("newuserpopup").remove();
    document.cookie = "newuserpopup=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
  }
  
  </script>';
}
?>