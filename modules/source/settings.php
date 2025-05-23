<div class="container p-0 m-0 mb-4 text-center" style="min-width: 100%;">
    <h1 class="mb-5 fw-semibold lh-1" style="margin-top:50px;font-size:38pt;">
        Settings
    </h1>
</div>
<div class="row g-2" style="margin: 0px!important;">
    <div class="col-md ps-0 mt-0">
        <div class="card">
            <h5 class="card-header"><i class="bi bi-person-lines-fill"></i> Overview</h5>
            <div class="card-body">

                <div class="input-group mb-3">
                    <span class="input-group-text" style="background-color: #dee2e608!important" id="basic-addon1"><i
                            class="bi bi-person-badge-fill"></i> Username</span>
                    <input type="username" class="form-control" disabled value="<?php echo $username; ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" style="background-color: #dee2e608!important" id="basic-addon1"><i
                            class="bi bi-envelope-at-fill"></i> Email</span>
                    <input type="username" class="form-control" disabled
                        value="<?php echo userSettingsGet($username, "email"); ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" style="background-color: #dee2e608!important" id="basic-addon1"><i
                            class="bi bi-calendar-date-fill"></i> Join Date</span>
                    <input type="text" class="form-control" disabled value="<?php echo userJoinDate($username); ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" style="background-color: #dee2e608!important" id="basic-addon1"><i
                            class="bi bi-cookie"></i> Session
                        ID</span>
                    <input type="text" class="form-control" disabled value="<?php echo $id; ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" style="background-color: #dee2e608!important" id="basic-addon1"><i
                            class="bi bi-hammer"></i> API</span>
                    <input type="text" class="form-control" disabled value="<?php if (userSettingsGet($username, "allowapi") == "true") {
                        echo "Enabled";
                    } else {
                        echo "Disabled";
                    } ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md pe-0 mt-0">
        <div class="card">
            <h5 class="card-header"><i class="bi bi-hammer"></i> Actions</h5>
            <div class="card-body">
                <a class="btn btn-secondary-new w-100 mb-3" href="#" data-bs-toggle="modal"
                    data-bs-target="#resetdata"><i class="bi bi-trash"></i> Reset Data</a>
                <a class="btn btn-secondary-new w-100 mb-3" href="#" data-bs-toggle="modal"
                    data-bs-target="#changepswd"><i class="bi bi-key"></i> Change Password</a>
                <a class="btn btn-secondary-new w-100 mb-3" href="#" data-bs-toggle="modal"
                    data-bs-target="#changeemail"><i class="bi bi-envelope-fill"></i> Change Email</a>
                <a class="btn btn-secondary-new w-100 mb-3" style="text-decoration: none;" href="#"
                    data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#delete"><i class="bi bi-trash"></i>
                    Delete Account</a>
                <a class="btn btn-secondary-new w-100" style="text-decoration: none;" href="#" data-bs-dismiss="modal"
                    data-bs-toggle="modal" data-bs-target="#toggleapi"><i class="bi bi-hammer"></i> Toggle API</a>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header"><i class="bi bi-hammer"></i> API</h5>
            <div class="card-body">
                <a class="btn btn-secondary-new w-100 mb-3" style="text-decoration: none;"
                    href="/api.php?action=rawdata&username=<?php echo $username . '&id=' . $id . '&source=pouches'; ?>">
                    <i class="bi bi-filetype-json"></i> Get Pouches JSON
                </a>
                <a class="btn btn-secondary-new w-100 mb-3" style="text-decoration: none;"
                    href="/api.php?action=rawdata&username=<?php echo $username . '&id=' . $id . '&source=cans'; ?>">
                    <i class="bi bi-filetype-json"></i> Get Cans JSON
                </a>
                <a class="btn btn-secondary-new w-100" style="text-decoration: none;"
                    href="/api.php?action=rawdata&username=<?php echo $username . '&id=' . $id . '&source=account'; ?>">
                    <i class="bi bi-filetype-json"></i> Get Account Info JSON
                </a>


            </div>
        </div>
    </div>
</div>
</div>
</div>

<!-- Reset Data popup -->
<div class="modal fade" id="resetdata" tabindex="-1" aria-labelledby="reset" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="resetdata"><i class="bi bi-exclamation-triangle-fill"></i> Warning</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>You are about to reset all your account data. This is permanent and you will not have access to your
                    information
                    once you click Reset. Do you wish to continue?</p>
            </div>
            <div class="modal-footer">
                <a href="api.php?action=resetdata" class="btn btn-danger-new">Reset Data</a>
            </div>
        </div>
    </div>
</div>

<!-- Delete Account popup -->
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="reset" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="delete"><i class="bi bi-exclamation-triangle-fill"></i> Warning</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>You are about to delete your account. This is permanent and you will not have access to your
                    information
                    once you click Delete. Do you wish to continue?</p>
            </div>
            <div class="modal-footer">
                <a href="api.php?action=deleteaccount" class="btn btn-danger-new">Delete
                    my
                    Account</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="changepswd" tabindex="-1" aria-labelledby="changepswd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="changepswd"><i class="bi bi-key"></i> Change Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="api.php?action=changepswd">
                    <input type="text" style="display: none" name="username" value="<?php echo $username; ?>">
                    <input type="text" style="display: none" name="id" value="<?php echo $id; ?>">
                    <div class="mb-3">
                        <label class="col-form-label">Old Password</label>
                        <input type="password" class="form-control" name="oldpassword">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">New Password</label>
                        <input type="password" class="form-control" name="newpassword">
                    </div>
                    <button type="submit" class="btn btn-secondary-new">Change Password</button>
                </form>
            </div>
            <div class="modal-footer">
                <i>You will be logged out of all active sessions. If you loose access to your account, we will not be
                    able to assist with a password reset.</i>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="changeemail" tabindex="-1" aria-labelledby="changeemail" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="changeemail"><i class="bi bi-key"></i> Change Email</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="api.php?action=changeemail">
                    <input type="text" style="display: none" name="username" value="<?php echo $username; ?>">
                    <input type="text" style="display: none" name="id" value="<?php echo $id; ?>">
                    <div class="mb-3">
                        <label class="col-form-label">New Email</label>
                        <input type="email" class="form-control" name="newemail">
                    </div>
                    <button type="submit" class="btn btn-secondary-new">Change Email</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Toggle API popup -->
<div class="modal fade" id="toggleapi" tabindex="-1" aria-labelledby="reset" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="delete"><i class="bi bi-exclamation-triangle-fill"></i> Warning</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>If you enable the API, those with your current session ID can see information in your account. We
                    recommend turning this off when you are done using it, or logging out once you have finished your
                    session.</p>
            </div>
            <div class="modal-footer">
                <?php

                if (userSettingsGet($username, "allowapi") == "true") {
                    echo '<a href="api.php?action=toggleapi" class="btn btn-primary-new">Disable API</a>';
                } else {
                    echo '<a href="api.php?action=toggleapi" class="btn btn-danger-new">Enable API</a>';
                }

                ?></a>
            </div>
        </div>
    </div>
</div>