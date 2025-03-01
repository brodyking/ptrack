<div class="card">
    <h5 class="card-header">Settings
    <a href="app.php?username=<?php echo $username."&id=".$id ?>" class="float-end btn btn-primary"
            style="padding: 3px 6px 3px 6px!important; margin-left: 6px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
  <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
</svg></a>
    </h5>
    <div class="card-body">
        <h5 class="card-titl">Username</h5>
        <input type="username" class="form-control" disabled value="@<?php echo $username ?>">
        <br>
        <h5 class="card-titl">Join Date</h5>
        <input type="text" class="form-control" disabled value="<?php echo userJoinDate($username); ?>">
        <br>
        <h5 class="card-titl">Session ID</h5>
        <input type="text" class="form-control" disabled value="<?php echo $id; ?>">
        <br>
        <h5 class="card-title">Change Password</h5>
        <p>You may change your password here. Once changed, you will be logged out everywhere.</p>
        <a class="btn btn-primary" style="text-decoration: none;"
            href="changepswd.php?username=<?php echo $username . "&id=" . $id ?>">Change
            Password</a>
        <br><br>
        <h5 class="card-title">Delete Account</h5>
        <a class="btn btn-danger" style="text-decoration: none;" href="#" data-bs-toggle="modal"
            data-bs-target="#delete">Delete Account</a>
    </div>
</div>
</div>

<!-- Delete Account popup -->
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="reset" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="delete">Warning</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>You are about to delete your account. This is permanent and you will not have access to your
                    information
                    once you click Delete. Do you wish to continue?</p>
            </div>
            <div class="modal-footer">
                <a href="delete.php?<?php echo "username=" . $username . "&id=" . $id ?>" class="btn btn-danger">Delete
                    my
                    Account</a>
            </div>
        </div>
    </div>
</div>