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
        if (sizeof($history) == 0) {
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
            var graphcans = new Chart("canschart", {
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
                    },
                    animation: {
                        onComplete: function () {
                            console.log(graphcans.toBase64Image());
                            document.getElementById("cans-export-png").href = graphcans.toBase64Image();
                            document.getElementById("cans-export-png").download = 'cans-pouchtrack.png';
                        }
                    }
                }
            });


        </script>


        <p class="d-grid gap-2 d-md-flex justify-content-md-end mb-0">
            <a class="btn btn-secondary-new btn-sm" data-bs-toggle="collapse" href="#cansgraphtable" role="button"
                aria-expanded="false" aria-controls="graphtable">
                <i class="bi bi-pencil-fill me-1"></i> Edit
            </a>
            <a class="btn btn-secondary-new btn-sm" id="cans-export-png">
                <i class="bi bi-image me-1"></i> Export as PNG
            </a>
            <a class="btn btn-secondary-new btn-sm"
                href="/api.php?action=rawdata&username=<?php echo $username . '&id=' . $id . '&source=cans'; ?>">
                <i class="bi bi-filetype-json me-1"></i> Export as JSON
            </a>
        </p>
        <div class="collapse" id="cansgraphtable">
            <br>
            <div class="card">
                <h5 class="card-header"><i class="bi bi-pencil-fill me-1"></i> Edit</h5>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Date</th>
                            <th>
                                Cans Used
                            </th>
                            <th>

                            </th>
                        </tr>
                        <script>

                            function cansSetEditDate(date) {
                                document.getElementById("editcansdate").value = date;
                            }

                        </script>
                        <?php
                        for ($i = 0; $i < sizeof($history); $i++) {
                            $historydate = $history[$i];

                            $historytotalcans = canGet($username, $historydate);

                            echo "<tr><td>" . $historydate . "</td><td>" . $historytotalcans . "</td><td><a href='#' class='btn btn-secondary-new' style='float:right;width: 100%;' data-bs-toggle='modal' data-bs-target='#editcans' onclick='cansSetEditDate(" . '"' . $historydate . '"' . ")'><i class='bi bi-pencil-fill me-1'></i> Edit</tr>";
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
                    <a href="api.php?action=data&type=cans&deed=reset" class="btn btn-danger-new">Reset</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editcans" tabindex="-1" aria-labelledby="editcans" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editcans"><i class="bi bi-pencil-fill"></i> Edit Day</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="GET" action="api.php?action=data&type=cans&deed=set">
                    <input type="text" name="action" value="data" style="display: none;" readonly>
                    <input type="text" name="type" value="cans" style="display: none;" readonly>
                    <input type="text" name="deed" value="set" style="display: none;" readonly>

                    <div class="mb-3">
                        <label class="col-form-label">Date</label>
                        <input type="text" name="date" id="editcansdate" value="" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Cans Used</label>
                        <input type="number" class="form-control" name="amount">
                    </div>
                    <button type="submit" class="btn btn-secondary-new">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>