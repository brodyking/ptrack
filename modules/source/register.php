<div class="modal fade" id="register" tabindex="-1" aria-labelledby="register" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="register"><i class="bi bi-door-open-fill"></i> Register</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="api.php?action=register">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Username</label>
            <input type="text" class="form-control" name="username">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Password</label>
            <input type="password" class="form-control" name="password">
          </div>
          <button type="submit" class="btn btn-primary">Register</button>
        </form>
      </div>
      <div class="modal-footer">
        <i>By clicking Register, you agree to the Terms of Service, Privacy Policy, and Cookie Policy located at the
          bottom of this page.</i>
      </div>
    </div>
  </div>
</div>