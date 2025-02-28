    <div class="modal fade" id="reset" tabindex="-1" aria-labelledby="reset" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="register">Warning</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>You are about to reset your statistics for today. You cannot undo this action. And no cheating!!</p>
          </div>
          <div class="modal-footer">
            <a href="count.php?strength=reset&<?php echo "username=" . $username . "&id=" . $id ?>"
              class="btn btn-danger">Reset</a>
          </div>
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
            <p>You are about to delete your account. This is permanent and you will not have access to your information
              once you click Delete. Do you wish to continue?</p>
          </div>
          <div class="modal-footer">
            <a href="delete.php?<?php echo "username=" . $username . "&id=" . $id ?>" class="btn btn-danger">Delete my
              Account</a>
          </div>
        </div>
      </div>
    </div>