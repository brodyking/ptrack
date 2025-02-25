    <div class="card">
      <h5 class="card-header">Welcome back, <span class="text-primary"><?php echo $username ?></span>!</h5>
      <div class="card-body">
      <div class="btn-group d-flex justify-content-center" role="group" aria-label="Basic mixed styles example">
        <a href="count.php?strength=6&<?php echo "username=" . $username . "&id=" . $id ?>"
          class="btn btn-lg btn-success">6mg</a>
        <a href="count.php?strength=9&<?php echo "username=" . $username . "&id=" . $id ?>"
          class="btn btn-lg btn-primary">9mg</a>
        <a href="count.php?strength=12&<?php echo "username=" . $username . "&id=" . $id ?>"
          class="btn btn-lg btn-danger">12mg</a>
        <a data-bs-toggle="modal" data-bs-target="#reset" class="btn btn-lg btn-secondary">Reset</a>
        </div>
      </div>
    </div>