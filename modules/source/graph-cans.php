<div class="card">
    <h5 class="card-header">
        <i class="bi bi-bar-chart-fill"></i>
        Can Usage
    </h5>
    <div class="card-body">
        <form method="GET" class="mb-2 input-group" action="/">
            <?php

            if (!isset($_GET["cmonth"])) {
                $cansmonth = date("m");
            } else if (!monthsIsValid($_GET["cmonth"])) {
                $cansmonth = date("m");
            } else {
                $cansmonth = $_GET["cmonth"];
            }

            ?>
            <?php

            if ($cansmonth == "01") {
                echo '<a class="btn btn-outline-light disabled"><i class="bi bi-rewind-fill"></i></a>';
            } else {
                echo '<a href="/?cmonth=' . ($cansmonth - 1) . '" class="btn btn-outline-light"><i class="bi bi-rewind-fill"></i></a>';
            }

            ?>
            <input type="text" name="username" value="<?php echo $username; ?>" style="display: none;">
            <input type="text" name="id" value="<?php echo $id; ?>" style="display: none;">

            <select onchange="this.form.submit()" class="form-select" name="cmonth" aria-label="Default select example">
                <?php

                $monthslist = monthsGet();

                foreach ($monthslist as $monthoption) {
                    if ($monthoption[0] == $cansmonth) {
                        echo '<option selected value="' . $monthoption[0] . '">' . $monthoption[1] . '</option>';
                    } else {
                        echo '<option value="' . $monthoption[0] . '">' . $monthoption[1] . '</option>';
                    }
                }

                ?>
            </select>
            <?php

            if ($cansmonth == "12") {
                echo '<a class="btn btn-outline-light disabled"><i class="bi bi-fast-forward-fill"></i></a>';
            } else {
                echo '<a href="/?cmonth=' . ($cansmonth + 1) . '" class="btn btn-outline-light"><i class="bi bi-fast-forward-fill"></i></a>';
            }

            ?>
        </form>
        <canvas id="canschart" style="width:100%;" class="border rounded"></canvas>
        <script src="/assets/js/chart.umd.js"></script>
        <?php
        $cansgraphxvals = "[";
        $cansgraphyvals = "[";



        $history = canGetHistoryArrayMonth($username, $cansmonth);
        if (sizeof($history) == 1) {
            echo '<script> document.getElementById("canschart").remove();</script>';
            echo "<div class='card-body border rounded mt-2 mb-2' role='alert'>A graph will be available when 2 or more days have been logged.</div>";
        } else if (sizeof($history) == 0) {
            echo '<script> document.getElementById("canschart").remove();</script>';
            echo "<div class='card-body border rounded mt-2 mb-2' role='alert'>No entries for this month</div>";
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
            <a class="btn btn-secondary-new btn-sm" data-bs-toggle="collapse" href="#cansgraphtable" role="button"
                aria-expanded="false" aria-controls="graphtable">
                View Table
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
    </div>

    <div class="modal fade" id="reset-cans" tabindex="-1" aria-labelledby="reset-cans" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="register"><i class="bi bi-exclamation-triangle-fill"></i> Warning
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>You are about to reset your <b>pouches</b> for today. You cannot undo this action. And no
                        cheating!!</p>
                </div>
                <div class="modal-footer">
                    <a href="api.php?action=cans&deed=reset" class="btn btn-danger-new">Reset</a>
                </div>
            </div>
        </div>
    </div>
</div>