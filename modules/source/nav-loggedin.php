<nav id="nav" class="navbar navbar-expand-lg bg-body-tertiary border rounded">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="/assets/logo.png" alt="Logo" width="24" height="24" class="d-inline-block align-text-top">
      Pouchtrack</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      Menu <i class="bi bi-list"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/?username=<?php echo $username . "&id=". $id ?>"><i class="bi bi-house-fill"></i> Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-person-circle"></i> Account
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#settings"><i class="bi bi-gear-wide-connected"></i> Settings</a></li>
            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#changepswd"><i class="bi bi-key"></i> Change Password</a></li>
            <li><a class="dropdown-item" href="api.php?action=logout&username=<?php echo $username; ?>"><i class="bi bi-door-open"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>