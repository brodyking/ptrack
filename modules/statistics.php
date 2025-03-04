<div class="card">
      <h5 class="card-header"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16" style="vertical-align: 0%;">
  <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
</svg> Todays Statistics</h5>
      <div class="card-body">
        <style>
          code {
            font-size: 12pt;
          }
        </style>
        <table class="table table-bordered">
          <tr>
            <td><b>Total Pouches:</b></td>
            <td><code><?php echo pouchGetPouches($username, date("m-d-Y")); ?></code></td>
          </tr>
          <tr>
            <td><b>Total Mgs:</b></td>
            <td><code><?php echo pouchGetMgs($username, date("m-d-Y")); ?></code></td>
          </tr>
        </table>
      </div>
    </div>