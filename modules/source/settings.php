<div class="modal fade" id="settings" tabindex="-1" aria-labelledby="settings" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="settings"><i class="bi bi-gear-wide-connected"></i> Settings</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="input-group mb-3">
                    <span class="input-group-text" style="background-color: #dee2e608!important"
                        id="basic-addon1">Username</span>
                    <input type="username" class="form-control" disabled value="<?php echo $username; ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" style="background-color: #dee2e608!important"
                        id="basic-addon1">Email</span>
                    <input type="username" class="form-control" disabled
                        value="<?php echo userSettingsGet($username, "email"); ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" style="background-color: #dee2e608!important" id="basic-addon1">Join
                        Date</span>
                    <input type="text" class="form-control" disabled value="<?php echo userJoinDate($username); ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" style="background-color: #dee2e608!important"
                        id="basic-addon1">Session ID</span>
                    <input type="text" class="form-control" disabled value="<?php echo $id; ?>">
                </div>
                <a class="btn btn-secondary-new w-100 mb-3" href="#" data-bs-toggle="modal"
                    data-bs-target="#changepswd"><i class="bi bi-key"></i> Change Password</a>
                <a class="btn btn-secondary-new w-100 mb-3" href="#" data-bs-toggle="modal"
                    data-bs-target="#changeemail"><i class="bi bi-envelope-fill"></i> Change Email</a>
                <a class="btn btn-secondary-new w-100" style="text-decoration: none;" href="#" data-bs-dismiss="modal"
                    data-bs-toggle="modal" data-bs-target="#delete"><i class="bi bi-trash"></i> Delete Account</a>
            </div>
        </div>
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
                <a href="api.php?action=deleteaccount" class="btn btn-primary-new">Delete
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