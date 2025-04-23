<nav id="nav" class="navbar navbar-expand-lg bg-body-tertiary border rounded"
    style="background-color: #dee2e608!important;">
    <div class="container-fluid pe-1 ps-2">
        <a class="navbar-brand" href="/">
            <img src="/assets/logo.png" alt="Logo" width="24" height="24" class="d-inline-block align-text-top">
            Pouchtrack</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            Menu <i class="bi bi-list"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">
                        Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/?paperwork">
                        Paperwork</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/?changes">
                        Changelog</a>
                </li>
            </ul>
            <?php

            if (isLoggedIn()) {
                echo '      <ul class="navbar-nav ms-auto">';
                if (userIsAdmin($username)) {
                    echo '<li><a class="nav-link" href="/?manage"><i
              class="bi bi-hammer"></i> Manage</a></li>';
                }
                echo '<li><a class="nav-link install-help-mobile" href="#" data-bs-toggle="modal" data-bs-target="#install"><i
              class="bi bi-download"></i> Install</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle"></i> ' . $username . '
          </a>
          <ul class="dropdown-menu mb-2">
            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#settings"><i
                  class="bi bi-gear-wide-connected"></i> Settings</a></li>
            <li><a class="dropdown-item" href="api.php?action=logout"><i class="bi bi-door-open"></i> Logout</a></li>
          </ul>
        </li>
      </ul>';
            } else {
                echo '<ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/?login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/?register">Register</a>
                </li>
            </ul>';
            }

            ?>

        </div>
    </div>
</nav>