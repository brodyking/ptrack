<div class="modal fade" id="settings" tabindex="-1" aria-labelledby="settings"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="settings"><i class="bi bi-gear-wide-connected"></i> Settings</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <h5 class="title">Username</h5>
                <input type="username" class="form-control" disabled value="@<?php echo $username; ?>">
                <br>
                <h5 class="title">Join Date</h5>
                <input type="text" class="form-control" disabled value="<?php echo userJoinDate($username); ?>">
                <br>
                <h5 class="title">Session ID</h5>
                <input type="text" class="form-control" disabled value="<?php echo $id; ?>">
                <br>
                <h5 class="title">Secure Session</h5>
                <p>Secure Session changes your Session ID on every pageload. This is more secure, but refreshing and
                    bookmarks
                    do not work. Use at your own risk.</p>
                <form method="POST" action="api.php?action=secureid" class="row p-0">
                    <div class="col-auto pe-0">
                        <select name="issecure" class="form-select form-select bg-light-subtle"
                            aria-label="Small select example">
                            <?php if (userSessionSecureGet($username)) {
                                echo '<option selected value="true">Enabled</option><option value="false">Disabled</option>';
                            } else {
                                echo '<option value="true">Enabled</option><option selected value="false">Disabled</option>';
                            } ?>
                        </select>
                        <input type="text" style="display: none" name="username" value="<?php echo $username; ?>">
                        <input type="text" style="display: none" name="id" value="<?php echo $id; ?>">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Change</button>
                    </div>
                </form>
                <h5 class="title">Delete Account</h5>
                <a class="btn btn-danger" style="text-decoration: none;" href="#" data-bs-dismiss="modal"
                    data-bs-toggle="modal" data-bs-target="#delete">Delete Account</a>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<!-- Delete Account popup -->
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="reset" aria-hidden="true">
    <div class="modal-dialog">
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
                <a href="api.php?action=deleteaccount&<?php echo "username=" . $username . "&id=" . $id; ?>" class="btn btn-danger">Delete
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
                <button type="submit" class="btn btn-primary">Change Password</button>
            </form>
        </div>
        <div class="modal-footer">
<i>You will be logged out of all active sessions. If you loose access to your account, we will not be able to assist with a password reset.</i>
        </div>
      </div>
    </div>
  </div>

