<div class="card">
  <h5 class="card-header">
    <i class="bi bi-pen-fill"></i>
    Pouch Selection for Today
  </h5>
  <div class="card-body">

    <div class="selection d-grid d-md-flex justify-content-md-center">
      <a href="api.php?action=count&strength=6" class="btn btn-lg btn-secondary-new w-100 text-start text-center"><i
          class="bi bi-plus-circle-fill"></i> 6mg</a>
      <br>
      <a href="api.php?action=count&strength=9" class="btn btn-lg btn-secondary-new w-100 text-start text-center"><i
          class="bi bi-plus-circle-fill"></i> 9mg</a>
      <br>
      <a href="api.php?action=count&strength=12" class="btn btn-lg btn-secondary-new w-100 text-start text-center"><i
          class="bi bi-plus-circle-fill"></i> 12mg</a>
      <br>
      <a data-bs-toggle="modal" data-bs-target="#reset"
        class="btn btn-lg btn-primary-new w-100 text-start text-center"><i class="bi bi-x-circle-fill"></i> Reset</a>
    </div>
  </div>
</div>
<div class="modal fade" id="reset" tabindex="-1" aria-labelledby="reset" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="register"><i class="bi bi-exclamation-triangle-fill"></i> Warning
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>You are about to reset your <b>pouches</b> for today. You cannot undo this action. And no
          cheating!!</p>
      </div>
      <div class="modal-footer">
        <a href="api.php?action=count&strength=reset" class="btn btn-danger">Reset</a>
      </div>
    </div>
  </div>
</div>
</div>