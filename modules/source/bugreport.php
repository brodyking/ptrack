<div class="container p-0 m-0 mb-4 text-center" style="min-width: 100%;">
  <h1 class="mb-5 fw-semibold lh-1" style="margin-top:50px;font-size:38pt;">
    Bug Reporting
  </h1>
</div>
<div class="card">
    <h5 class="card-header"><i class="bi bi-question-diamond-fill"></i> Read First</h5>
    <div class="card-body">
        This site is constantly being worked and improved on. Use this page to submit information about bugs/issues with the sites functionality. <u>Do not submit feature requests.</u> Feel free to also submit an issue on our <a href="https://github.com/brodyking/ptrack/">GitHub page</a>.<br><br>Please be as detailed as possible when describing your issue.
    </div>
</div>
<div class="card">
    <h5 class="card-header"><i class="bi bi-bug-fill"></i> Report Form</h5>
    <div class="card-body">
        <form method="POST" action="api.php?action=bugreport">
          <div class="mb-3">
            <label class="form-label">Email <span class="text-secondary">(Optional)</span></label>
            <input type="email" class="form-control" name="email">
          </div>
          <div class="mb-3">
            <label class="form-label">Site Version</label>
            <input type="text" class="form-control" name="version" value="<?php echo getSiteVersion(); ?>" readonly disabled>
          </div>
          <div class="mb-3">
            <label class="form-label">Describe your Issue</label>
            <textarea class="form-control" name="body" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-secondary-new">Submit</button>
        </form>
    </div>
</div>