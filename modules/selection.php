    <div class="card">
      <h5 class="card-header">Welcome back, <span class="text-primary"><?php echo $username ?></span>!
    
      <a href="logout.php?username=<?php echo $username ?>" class="float-end btn btn-primary"
            style="padding: 3px 6px 3px 6px!important; margin-left: 6px;"><svg xmlns="http://www.w3.org/2000/svg"
                width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                <path fill-rule="evenodd"
                    d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
            </svg> Logout</a>
        <a href="<?php echo "settings.php?username=".$username."&id=".$id ?>" class="float-end btn btn-primary" style="padding: 3px 6px 3px 6px!important;"><svg
                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-gear-wide-connected" viewBox="0 0 16 16">
                <path
                    d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5m0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78zM5.048 3.967l-.087.065zm-.431.355A4.98 4.98 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8zm.344 7.646.087.065z" />
            </svg> Settings
        </a>
    </h5>
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