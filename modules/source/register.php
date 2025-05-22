<div class="card mt-5" id="login" style="max-width: 400px; margin: auto;">
  <h5 class="card-header"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
      class="bi bi-key-fill" viewBox="0 0 16 16" style="vertical-align: 0%;">
      <path
        d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2M2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2">
      </path>
    </svg> Register</h5>
  <div class="card-body">
    <form method="POST" action="api.php?action=register">
      <div class="mb-3">
        <label for="recipient-name" class="col-form-label">Username <span class="text-secondary">(You cannot change this
            later)</span></label>
        <input required type="text" class="form-control" name="username">
      </div>
      <div class="mb-3">
        <label for="recipient-name" class="col-form-label">Email <span class="text-secondary">(Optional)</span></label>
        <input type="email" class="form-control" name="email">
      </div>
      <div class="mb-3">
        <label for="message-text" class="col-form-label">Password</label>
        <input required type="password" class="form-control" name="password">
      </div>
      <div class="mb-3">
        <label class="col-form-label"><input type="checkbox" class="form-input" required> I have read and agree to the
          Terms of Service, Privacy Policy, and
          Cookie Policy located <a href="/?paperwork" target="_blank">here</a>.</label>
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-secondary-new">Register</button>
      </div>
      <div class="mb-3">
        Already have an account? <a href="/?login">Click here</a>.
      </div>
    </form>
  </div>
</div>