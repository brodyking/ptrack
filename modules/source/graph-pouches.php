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
            var graphpouches = new Chart("poucheschart", {
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
                    },
                    animation: {
                        onComplete: function () {
                            console.log(graphpouches.toBase64Image());
                            document.getElementById("pouches-export-png").href = graphpouches.toBase64Image();
                            document.getElementById("pouches-export-png").download = 'pouches-pouchtrack.png';
                        }
                    }
                }
            });
        </script>


        <p class="d-grid gap-2 d-md-flex justify-content-md-end mb-0">
            <a class="btn btn-secondary-new btn-sm" data-bs-toggle="collapse" href="#graphtable" role="button"
                aria-expanded="false" aria-controls="graphtable">
                <i class="bi bi-table me-1"></i> View Table
            </a>
            <a class="btn btn-secondary-new btn-sm" id="pouches-export-png">
                <i class="bi bi-image me-1"></i> Export as PNG
            </a>
            <a class="btn btn-secondary-new btn-sm"
                href="/api.php?action=rawdata&username=<?php echo $username . '&id=' . $id . '&source=pouches'; ?>">
                <i class="bi bi-filetype-json me-1"></i> Export as JSON
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
                            <th></th>
                        </tr>
                        <script>

                            function pouchesSetEditDate(date) {
                                document.getElementById("editpouchesdate").value = date;
                            }

                        </script>
                        <?php
                        for ($i = 0; $i < sizeof($history); $i++) {
                            $historydate = $history[$i];

                            $historytotalmgs = pouchGetMgs($username, $historydate);
                            $historytotalpouches = pouchGetPouches($username, $historydate);

                            echo "<tr><td>" . $historydate . "</td><td>" . $historytotalpouches . "</td><td>" . $historytotalmgs . "</td><td><a href='#' class='btn btn-secondary-new' style='float:right;width: 100%;' data-bs-toggle='modal' data-bs-target='#editpouches' onclick='pouchesSetEditDate(" . '"' . $historydate . '"' . ")'><i class='bi bi-pencil-fill'></i> Edit</a></td></tr>";
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
                    <a href="api.php?action=data&type=pouches&deed=reset" class="btn btn-danger-new">Reset</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editpouches" tabindex="-1" aria-labelledby="editpouches" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editpouches"><i class="bi bi-pencil-fill"></i> Edit Day</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="GET" action="api.php?action=data&type=pouches&deed=set">
                    <input type="text" name="action" value="data" style="display: none;" readonly>
                    <input type="text" name="type" value="pouches" style="display: none;" readonly>
                    <input type="text" name="deed" value="set" style="display: none;" readonly>

                    <div class="mb-3">
                        <label class="col-form-label">Date</label>
                        <input type="text" name="date" id="editpouchesdate" value="" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Pouches Used</label>
                        <input type="number" class="form-control" name="amount">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Mgs Used</label>
                        <input type="number" class="form-control" name="strength">
                    </div>
                    <button type="submit" class="btn btn-secondary-new">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>