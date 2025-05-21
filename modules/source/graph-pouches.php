<div class="card">
    <h5 class="card-header">
        <i class="bi bi-bar-chart-fill"></i>
        Pouch Usage
    </h5>
    <div class="card-body">
        <form method="GET" class="mb-2 input-group" action="/">
            <?php

            if (!isset($_GET["pmonth"])) {
                $pouchesmonth = date("m");
            } else if (!monthsIsValid($_GET["pmonth"])) {
                $pouchesmonth = date("m");
            } else {
                $pouchesmonth = $_GET["pmonth"];
            }

            ?>
            <?php

            if ($pouchesmonth == "01") {
                echo '<a class="btn btn-outline-light disabled"><i class="bi bi-rewind-fill"></i></a>';
            } else {
                echo '<a href="/?pmonth=' . ($pouchesmonth - 1) . '" class="btn btn-outline-light"><i class="bi bi-rewind-fill"></i></a>';
            }

            ?>
            <input type="text" name="username" value="<?php echo $username; ?>" style="display: none;">
            <input type="text" name="id" value="<?php echo $id; ?>" style="display: none;">

            <select onchange="this.form.submit()" class="form-select" name="pmonth" aria-label="Default select example">
                <?php

                $monthslist = monthsGet();

                foreach ($monthslist as $monthoption) {
                    if ($monthoption[0] == $pouchesmonth) {
                        echo '<option selected value="' . $monthoption[0] . '">' . $monthoption[1] . '</option>';
                    } else {
                        echo '<option value="' . $monthoption[0] . '">' . $monthoption[1] . '</option>';
                    }
                }

                ?>
            </select>
            <?php

            if ($pouchesmonth == "12") {
                echo '<a class="btn btn-outline-light disabled"><i class="bi bi-fast-forward-fill"></i></a>';
            } else {
                echo '<a href="/?pmonth=' . ($pouchesmonth + 1) . '" class="btn btn-outline-light"><i class="bi bi-fast-forward-fill"></i></a>';
            }

            ?>
        </form>
        <canvas id="poucheschart" style="width:100%;" class="border rounded"></canvas>
        <script src="/assets/js/chart.umd.js"></script>
        <?php
        $pouchesgraphxvals = "[";
        $pouchesgraphyvals = "[";



        $history = pouchGetHistoryArrayMonth($username, $pouchesmonth);
        if (sizeof($history) == 1) {
            echo '<script> document.getElementById("poucheschart").remove();</script>';
            echo "<div class='card-body border rounded mt-2 mb-2' role='alert'>A graph will be available when 2 or more days have been logged.</div>";
        } else if (sizeof($history) == 0) {
            echo '<script> document.getElementById("poucheschart").remove();</script>';
            echo "<div class='card-body border rounded mt-2 mb-2' role='alert'>No entries for this month</div>";
        } else {
            echo '<br>';
        }
        for ($i = 0; $i < sizeof($history); $i++) {
            if ($i == sizeof($history) - 1) {
                $pouchesgraphxvals = $pouchesgraphxvals . "'" . $history[$i] . "']";
            } else {
                $pouchesgraphxvals = $pouchesgraphxvals . "'" . $history[$i] . "', ";
            }
        }
        for ($i = 0; $i < sizeof($history); $i++) {
            $pouchesgraphyvalscurrent = pouchGetPouches($username, $history[$i]);
            if ($i == sizeof($history) - 1) {
                $pouchesgraphyvals = $pouchesgraphyvals . $pouchesgraphyvalscurrent . "]";
            } else {
                $pouchesgraphyvals = $pouchesgraphyvals . $pouchesgraphyvalscurrent . ", ";
            }
        }
        ?>
        <script>
            Chart.defaults.color = 'white';
            Chart.defaults.borderColor = '#495057';
            const xValues = <?php echo $pouchesgraphxvals; ?>;
            const yValues = <?php echo $pouchesgraphyvals; ?>;
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


        <p class="d-grid gap-2 d-md-flex justify-content-md-end mb-0">
            <a class="btn btn-secondary-new btn-sm" data-bs-toggle="collapse" href="#graphtable" role="button"
                aria-expanded="false" aria-controls="graphtable">
                View Table
            </a>
        </p>
        <div class="collapse" id="graphtable">
            <br>
            <div class="card">
                <h5 class="card-header">Table Data</h5>
                <div class="card-body">
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
        </div>
    </div>

    <div class="modal fade" id="reset" tabindex="-1" aria-labelledby="reset" aria-hidden="true">
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
                    <a href="api.php?action=count&strength=reset" class="btn btn-danger-new">Reset</a>
                </div>
            </div>
        </div>
    </div>
</div>