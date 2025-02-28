<div class="card">
      <h5 class="card-header">Todays Statistics</h5>
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