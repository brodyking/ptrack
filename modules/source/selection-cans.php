<div class="card">
  <h5 class="card-header">
  <i class="bi bi-pen-fill"></i>
    Can Selection 
  </h5>
  <div class="card-body">

    <div class="selection d-grid d-md-flex justify-content-md-center">
      <a href="api.php?action=cans&deed=add&<?php echo "username=" . $username . "&id=" . $id ?>"
      class="btn btn-lg btn-primary w-100 text-start text-center"><i class="bi bi-plus-circle-fill"></i> Can</a>
      <br>
      <a data-bs-toggle="modal" data-bs-target="#reset-cans" class="btn btn-lg btn-danger w-100 text-start text-center"><i class="bi bi-x-circle-fill"></i> Reset</a>
    </div>
  </div>
</div>