<script src="/assets/js/chart.umd.js"></script>
<style>
    main {
        max-width: 1200px !important;
        margin: auto;
    }

    nav,
    .info {
        max-width: 850px !important;
        margin: auto;
        margin-bottom: 15px;
    }
</style>

<div class="card info">
    <div class="card-header">
        <b>Total Views: </b> <?php

        $trackingdatestotal = trackingViewsGetKeys();
        $total = 0;

        foreach ($trackingdatestotal as $trackingday) {
            $total += trackingViewsGetValue($trackingday);
        }

        echo $total;

        ?>
        <br>
        <b>Views Today: </b> <?php


        echo trackingViewsGetValue(date("m-d-Y"));

        ?>
    </div>
    <div class="card-body p-1 ps-3 text-secondary">
        <i><?php echo date("m-d-Y h:i:s A"); ?></i>
    </div>
</div>

<ul class="nav nav-underline ms-2" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#views" type="button"
            role="tab" aria-selected="true"><i class="bi bi-clipboard-data-fill"></i> Views</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#users" type="button" role="tab"
            aria-selected="false"><i class="bi bi-people-fill"></i> Users</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#logs" type="button" role="tab"
            aria-selected="false"><i class="bi bi-terminal-fill"></i> Logs</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#raw-logs" type="button"
            role="tab" aria-selected="false"><i class="bi bi-braces-asterisk"></i> Logs JSON</button>
    </li>
</ul>
<div class="tab-content border rounded p-2">
    <div class="tab-pane fade show active" id="views" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
        <div class="card">
            <h5 class="card-header">Views</h5>
            <div class="card-body">

                <canvas id="viewschart" style="width:100%;" class="border rounded"></canvas>
                <?php
                $viewsxvals = "[";
                $viewsyvals = "[";



                $history = trackingViewsGetKeys();
                for ($i = 0; $i < sizeof($history); $i++) {
                    if ($i == sizeof($history) - 1) {
                        $viewsxvals = $viewsxvals . "'" . $history[$i] . "']";
                    } else {
                        $viewsxvals = $viewsxvals . "'" . $history[$i] . "', ";
                    }
                }
                for ($i = 0; $i < sizeof($history); $i++) {
                    $viewsyvalscurrent = trackingViewsGetValue($history[$i]);
                    if ($i == sizeof($history) - 1) {
                        $viewsyvals = $viewsyvals . $viewsyvalscurrent . "]";
                    } else {
                        $viewsyvals = $viewsyvals . $viewsyvalscurrent . ", ";
                    }
                }
                ?>
                <script>
                    Chart.defaults.color = 'white';
                    Chart.defaults.borderColor = '#495057';
                    const cansxValues = <?php echo $viewsxvals; ?>;
                    const cansyValues = <?php echo $viewsyvals; ?>;
                    new Chart("viewschart", {
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
            </div>
        </div>
    </div>
    <div class="tab-pane" id="users" role="tabpanel" aria-labelledby="users-tab" tabindex="0">
        <div class="card">
            <h5 class="card-header">Users</h5>
            <div class="card-body">
                <ul class="list-group">

                    <?php

                    $users = scandir("data/db_users/");

                    foreach ($users as $user) {
                        if (is_dir("data/db_users/{$user}") && $user != ".." && $user != ".") {
                            echo "<li class='list-group-item'>{$user}</li>";
                        }
                    }

                    ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="logs" role="tabpanel" aria-labelledby="logs-tab" tabindex="0">
        <div class="card">
            <h5 class="card-header">Logs <span class="text-secondary">sorted by newest first</span></h5>
            <div class="card-body">

                <?php

                $logs = trackingLogsGet();
                $logsformatted = "";
                foreach ($logs as $entry) {
                    foreach ($logs as $entry) {
                        $logsformatted = "[<span class='text-primary'>{$entry["date"]}</span>] " .
                            "[<span class='text-success'>{$entry["username"]}</span>@<span class='text-warning'>{$entry["page"]}</span>] " .
                            "[<span class='text-primary'>{$entry["url"]}</span>] " .
                            "[<span class='text-info'>{$entry["ip"]}</span>@<span class='text-danger'>{$entry["device"]}</span>] " .
                            "<br>" . $logsformatted;
                    }
                }
                echo "<code><pre>{$logsformatted}</pre></code>";

                ?>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="raw-logs" role="tabpanel" aria-labelledby="logs-tab" tabindex="0">
        <div class="card">
            <h5 class="card-header">Logs <span class="text-secondary">sorted by oldest first</span></h5>
            <div class="card-body">
                <ul class="list-group">
                    <code>


                        <?php

                        echo "<pre>" . file_get_contents("data/db_tracking/logs.json") . "</pre>";

                        ?>
</code>
                </ul>
            </div>
        </div>
    </div>
</div>