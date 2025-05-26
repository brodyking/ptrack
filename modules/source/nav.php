<nav id="nav" class="navbar navbar-expand-md sticky-top bg-body-tertiary border rounded"
    style="background-color:rgba(64, 62, 97, 0.37)!important;border-radius: 1.25rem!important;top:1.5em;backdrop-filter: blur(10px);max-width:100%;margin:auto;border-color: #45406C!important;">
    <div class="container-fluid pe-2 ps-3">
        <a class="navbar-brand me-0" href="/">
            <i class="bi bi-bar-chart-fill"></i> <?php echo settingsGet("site.name"); ?>
        </a>
        <button class="navbar-toggler me-2" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            Menu <i class="bi bi-list"></i></span>
        </button>
        <!--
        <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            Menu <i class="bi bi-list"></i></span>
-->
        </button>
        <div class="collapse navbar-collapse ms-1" id="navbarNavDropdown">
            <ul class="navbar-nav ms-0 ps-0 me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/?paperwork">
                        <i class="bi bi-paperclip"></i> Paperwork</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-git"></i> Development
                    </a>
                    <ul class="dropdown-menu mb-2">
                        <li>
                            <a class="dropdown-item" href="/?changes">
                                <i class="bi bi-clock-fill"></i> Recent Changes</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/?bugreport">
                                <i class="bi bi-bug-fill"></i> Bug Report</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="https://github.com/brodyking/ptrack/blob/main/docs/index.md">
                                <i class="bi bi-book-fill"></i> Documentation</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="https://github.com/brodyking/ptrack">
                                <i class="bi bi-github"></i> Github</a>
                        </li>
                    </ul>
                </li>
            </ul>
            </ul>
            <?php

            if (isLoggedIn()) {
                echo '      <ul class="navbar-nav ms-auto">';


                // Manage link for when an admin is logged in
                if (userIsAdmin($username)) {
                    echo '<li><a class="nav-link" href="/?manage"><i
              class="bi bi-hammer"></i> Manage</a></li>';
                }


                echo '<li class="install-help-mobile"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#install"><i
                        class="bi bi-download"></i> Install</a></li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i> ' . $username . '
                    </a>
                    <ul class="dropdown-menu mb-2">
                        <li><a class="dropdown-item" href="/?settings"><i
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

<nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
            aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header ps-3 pe-2 mt-4 border m-3"
                style="border-radius:1.25rem;padding-top:5px;padding-bottom:5px;border-color:#45406C!important;">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"><i class="bi bi-bar-chart-fill"></i>
                    <?php echo settingsGet("site.name"); ?></h5>
                <button class="navbar-toggler ms-auto me-2" type="button" data-bs-dismiss="offcanvas"
                    aria-label="Close">
                    Close <i class="bi bi-x"></i></span>
                </button>

            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav ms-0 ps-0 me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            <i class="bi bi-house-fill"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/?paperwork">
                            <i class="bi bi-paperclip"></i> Paperwork</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-git"></i> Development
                        </a>
                        <ul class="dropdown-menu mb-2">
                            <li>
                                <a class="dropdown-item" href="/?changes">
                                    <i class="bi bi-clock-fill"></i> Recent Changes</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/?bugreport">
                                    <i class="bi bi-bug-fill"></i> Bug Report</a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="https://github.com/brodyking/ptrack/blob/main/docs/index.md">
                                    <i class="bi bi-book-fill"></i> Documentation</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="https://github.com/brodyking/ptrack">
                                    <i class="bi bi-github"></i> Github</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                </ul>
                <?php

                if (isLoggedIn()) {
                    echo '      <ul class="navbar-nav ms-auto">';


                    // Manage link for when an admin is logged in
                    if (userIsAdmin($username)) {
                        echo '<li><a class="nav-link" href="/?manage"><i
              class="bi bi-hammer"></i> Manage</a></li>';
                    }


                    echo '<li class="install-help-mobile"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#install"><i
                            class="bi bi-download"></i> Install</a></li>
                            <li><a class="nav-link" href="/?settings"><i
                                class="bi bi-gear-wide-connected"></i> Settings</a></li>
                            <li><a class="nav-link" href="api.php?action=logout"><i class="bi bi-door-open"></i> Logout</a></li>
                    </ul>';
                } else {
                    echo '<ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/?login"><i class="bi bi-person-fill"></i> Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/?register"><i class="bi bi-person-fill"></i> Register</a>
                </li>
            </ul>';
                }

                ?>
            </div>
        </div>
</nav>