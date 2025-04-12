<div class="card mt-5" id="login" style="max-width: 400px; margin: auto;">
  <h5 class="card-header"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
      class="bi bi-key-fill" viewBox="0 0 16 16" style="vertical-align: 0%;">
      <path
        d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2M2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2">
      </path>
    </svg> Login</h5>
  <div class="card-body">
    <form method="POST" action="api.php?action=login">
      <label class="col-form-label">Username</label>
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input type="text" class="form-control" name="username">
      </div>
      <label class="col-form-label">Password</label>
      <div class="mb-3">
        <input type="password" class="form-control" name="password">
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-secondary-new">Login</button>
      </div>
      <div class="mb-3">
        Dont have an account? <a href="/?register">Click here</a>.
      </div>
    </form>
  </div>
</div>