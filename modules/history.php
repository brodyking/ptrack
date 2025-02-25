<div class="card">
      <h5 class="card-header">History</h5>
      <div class="card-body">
        <style>
          code {
            font-size: 12pt;
          }
        </style>
        <h5 class="card-title">Pouches</h5>
        <canvas id="poucheschart" style="width:100%;max-width:700px;" class="border"></canvas>
        <br>
        <script src="assets/js/chart.umd.js"></script>
        <?php
        $graphxvals = "[";
        $graphyvals = "[";
        $history = pouchGetHistoryArray($username);
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
        <br>
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