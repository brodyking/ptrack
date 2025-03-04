    <div class="card">
      <h5 class="card-header"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hammer" viewBox="0 0 16 16" style="vertical-align: 0%;" >
  <path d="M9.972 2.508a.5.5 0 0 0-.16-.556l-.178-.129a5 5 0 0 0-2.076-.783C6.215.862 4.504 1.229 2.84 3.133H1.786a.5.5 0 0 0-.354.147L.146 4.567a.5.5 0 0 0 0 .706l2.571 2.579a.5.5 0 0 0 .708 0l1.286-1.29a.5.5 0 0 0 .146-.353V5.57l8.387 8.873A.5.5 0 0 0 14 14.5l1.5-1.5a.5.5 0 0 0 .017-.689l-9.129-8.63c.747-.456 1.772-.839 3.112-.839a.5.5 0 0 0 .472-.334"/>
</svg> Actions</h5>
      <div class="card-body">
        <a href="count.php?strength=6&<?php echo "username=" . $username . "&id=" . $id ?>"
          class="btn btn-lg btn-primary w-100 text-start mb-2">6mg</a>
          <br>
        <a href="count.php?strength=9&<?php echo "username=" . $username . "&id=" . $id ?>"
          class="btn btn-lg btn-outline-primary w-100 text-start mb-2">9mg</a>
          <br>
        <a href="count.php?strength=12&<?php echo "username=" . $username . "&id=" . $id ?>"
          class="btn btn-lg btn-outline-primary w-100 text-start mb-2">12mg</a>
          <br>
        <a data-bs-toggle="modal" data-bs-target="#reset" class="btn btn-lg btn-outline-warning w-100 text-start">Reset Today</a>
      </div>
    </div>