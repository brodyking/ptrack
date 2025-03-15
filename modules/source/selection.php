<div class="container p-0 m-0 mb-5 text-center">
  <h1 class="mb-3 fw-semibold lh-1 text-gradient"
    style="  background: -webkit-linear-gradient(#ffffff,rgb(138, 142, 146));-webkit-background-clip: text;-webkit-text-fill-color: transparent;margin-top:50px;font-size:28pt;">
    Welcome back, <span style="background: -webkit-linear-gradient(#98C2FD,#0D70FD);-webkit-background-clip: text;-webkit-text-fill-color: transparent;"><?php echo $username; ?></span>.</h1>
  <p class="text-center p-0 m-0" style="font-size:13pt;">You have used <span class="text-primary-emphasis"><?php echo pouchGetPouches($username, date("m-d-Y")); ?></span> total pouches, and <span class="text-primary-emphasis"><?php echo pouchGetMgs($username, date("m-d-Y")); ?></span> total mgs today.</p>
  </div>

<div class="card">
  <h5 class="card-header">
  <i class="bi bi-pen-fill"></i>
    Selection
  </h5>
  <div class="card-body">

    <div class="selection d-grid d-md-flex justify-content-md-center">
      <a href="api.php?action=count&strength=6&<?php echo "username=" . $username . "&id=" . $id ?>"
      class="btn btn-lg btn-primary w-100 text-start text-center"><i class="bi bi-plus-circle-fill"></i> 6mg</a>
      <br>
      <a href="api.php?action=count&strength=9&<?php echo "username=" . $username . "&id=" . $id ?>"
      class="btn btn-lg btn-primary w-100 text-start text-center"><i class="bi bi-plus-circle-fill"></i> 9mg</a>
      <br>
      <a href="api.php?action=count&strength=12&<?php echo "username=" . $username . "&id=" . $id ?>"
      class="btn btn-lg btn-primary w-100 text-start text-center"><i class="bi bi-plus-circle-fill"></i> 12mg</a>
      <br>
      <a data-bs-toggle="modal" data-bs-target="#reset" class="btn btn-lg btn-danger w-100 text-start text-center"><i class="bi bi-x-circle-fill"></i> Reset</a>
    </div>
  </div>
</div>