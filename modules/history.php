<div class="card">
      <h5 class="card-header"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart-line-fill" viewBox="0 0 16 16" style="vertical-align: 0%;">
  <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1z"/>
</svg> History</h5>
      <div class="card-body">
        <style>
          code {
            font-size: 12pt;
          }
        </style>
        <h5 class="card-title"> Pouches</h5>
        <canvas id="poucheschart" style="width:100%;max-width:700px;" class="border"></canvas>
        <script src="assets/js/chart.umd.js"></script>
        <?php
        $graphxvals = "[";
        $graphyvals = "[";
        $history = pouchGetHistoryArray($username);
        if (sizeof($history) == 1) {
          echo '<script> document.getElementById("poucheschart").remove();</script>';
          echo "<div class='alert alert-info' role='alert'>A graph will be available when 2 or more days have been logged.</div>";
        } else {
          echo '<br>';
        }
        for ($i = 0; $i < sizeof($history); $i++) {
          if ($i == sizeof($history) - 1) {
            $graphxvals = $graphxvals . "'" . $history[$i] . "']";
          } else {
            $graphxvals = $graphxvals . "'" . $history[$i] . "', ";
          }
        }
        for ($i = 0; $i < sizeof($history); $i++) {
          $graphyvalscurrent = pouchGetPouches($username, $history[$i]);
          if ($i == sizeof($history) - 1) {
            $graphyvals = $graphyvals . $graphyvalscurrent . "]";
          } else {
            $graphyvals = $graphyvals . $graphyvalscurrent . ", ";
          }
        }
        ?>
        <script>
          Chart.defaults.color = 'white';
          Chart.defaults.borderColor = '#495057';
          const xValues = <?php echo $graphxvals; ?>;
          const yValues = <?php echo $graphyvals; ?>;
          new Chart("poucheschart", {
            type: "line",
            data: {
              labels: xValues,
              datasets: [{
                fill: false,
                lineTension: 0,
                backgroundColor: "white",
                borderColor: "#0d6efd",
                data: yValues
              }]
            },
            options: {
              responsive: true,
              scales: {
                y: {
                  min: 0,
                  suggestedMax: 6,
                  ticks: {
                    stepSize: 1
                  }
                }
              },
              plugins: {
                legend: {
                  display: false
                }
              },
              layout: {
                padding: 20
              }
            }
          });
        </script>
        <table class="table table-bordered table-striped">
          <tr>
            <th>Date</th>
            <th>
              Pouches Used
            </th>
            <th>
              Total Mgs
            </th>
          </tr>
          <?php
          for ($i = 0; $i < sizeof($history); $i++) {
            $historydate = $history[$i];

            $historytotalmgs = pouchGetMgs($username, $historydate);
            $historytotalpouches = pouchGetPouches($username, $historydate);

            echo "<tr><td>" . $historydate . "</td><td>" . $historytotalpouches . "</td><td>" . $historytotalmgs . "</td></tr>";
          }
          ?>
        </table>
      </div>
    </div>