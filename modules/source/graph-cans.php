<div class="card">
    <h5 class="card-header">
        <i class="bi bi-bar-chart-fill"></i>
        Can Usage 
    </h5>
    <div class="card-body">

        <canvas id="canschart" style="width:100%;" class="border rounded"></canvas>
        <script src="/assets/js/chart.umd.js"></script>
        <?php
        $cansgraphxvals = "[";
        $cansgraphyvals = "[";
        $history = canGetHistoryArray($username);
        if (sizeof($history) == 1) {
            echo '<script> document.getElementById("canschart").remove();</script>';
            echo "<div class='alert alert-info' role='alert'>A graph will be available when 2 or more days have been logged.</div>";
        } else {
            echo '<br>';
        }
        for ($i = 0; $i < sizeof($history); $i++) {
            if ($i == sizeof($history) - 1) {
                $cansgraphxvals = $cansgraphxvals . "'" . $history[$i] . "']";
            } else {
                $cansgraphxvals = $cansgraphxvals . "'" . $history[$i] . "', ";
            }
        }
        for ($i = 0; $i < sizeof($history); $i++) {
            $cansgraphyvalscurrent = canGet($username, $history[$i]);
            if ($i == sizeof($history) - 1) {
                $cansgraphyvals = $cansgraphyvals . $cansgraphyvalscurrent . "]";
            } else {
                $cansgraphyvals = $cansgraphyvals . $cansgraphyvalscurrent . ", ";
            }
        }
        ?>
        <script>
            Chart.defaults.color = 'white';
            Chart.defaults.borderColor = '#495057';
            const cansxValues = <?php echo $cansgraphxvals; ?>;
            const cansyValues = <?php echo $cansgraphyvals; ?>;
            new Chart("canschart", {
                type: "line",
                data: {
                    labels: cansxValues,
                    datasets: [{
                        fill: false,
                        lineTension: 0,
                        backgroundColor: "white",
                        borderColor: "#0d6efd",
                        data: cansyValues
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


        <p class="d-grid gap-2 d-md-flex justify-content-md-end mb-0">
            <a class="btn btn-primary btn-sm" data-bs-toggle="collapse" href="#cansgraphtable" role="button"
                aria-expanded="false" aria-controls="graphtable">
                View Table
            </a>
            <a class="btn btn-primary btn-sm" data-bs-toggle="collapse" href="#cansgraphjson" role="button"
                aria-expanded="false" aria-controls="graphjson">
                View JSON
            </a>
        </p>
        <div class="collapse" id="cansgraphtable">
            <br>
            <div class="card">
                <h5 class="card-header">Table Data</h5>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Date</th>
                            <th>
                               Cans Used 
                            </th>
                        </tr>
                        <?php
                        for ($i = 0; $i < sizeof($history); $i++) {
                            $historydate = $history[$i];

                            $historytotalcans = canGet($username, $historydate);

                            echo "<tr><td>" . $historydate . "</td><td>" . $historytotalcans . "</td></tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="collapse" id="cansgraphjson">
            <br>
            <div class="card">
                <h5 class="card-header">JSON Data</h5>
                <div class="card-body">
                    <code><pre><?php echo file_get_contents("data/db_users/" . $username . "/cans.json"); ?></pre></code>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="reset-cans" tabindex="-1" aria-labelledby="reset" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="register"><i class="bi bi-exclamation-triangle-fill"></i>Warning</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>You are about to reset your <b>cans</b> for today. You cannot undo this action. And no
                        cheating!!</p>
                </div>
                <div class="modal-footer">
                    <a href="api.php?action=cans&deed=reset&<?php echo "username=" . $username . "&id=" . $id ?>"
                        class="btn btn-danger">Reset</a>
                </div>
            </div>
        </div>
    </div>
    </div>
