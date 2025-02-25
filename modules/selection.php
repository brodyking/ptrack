    <div class="card">
      <h5 class="card-header">Welcome back, <span class="text-primary"><?php echo $username ?></span>!</h5>
      <div class="card-body">
        <a href="count.php?strength=6&<?php echo "username=" . $username . "&id=" . $id ?>"
          class="btn btn-success">6mg</a>
        <a href="count.php?strength=9&<?php echo "username=" . $username . "&id=" . $id ?>"
          class="btn btn-primary">9mg</a>
        <a href="count.php?strength=12&<?php echo "username=" . $username . "&id=" . $id ?>"
          class="btn btn-danger">12mg</a>
        <a data-bs-toggle="modal" data-bs-target="#reset" class="btn btn-secondary">Reset Today</a>
      </div>
    </div>