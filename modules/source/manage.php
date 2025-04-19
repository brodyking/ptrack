<script src="/assets/js/chart.umd.js"></script>
</div>

<ul class="nav nav-underline ms-2" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#analytics" type="button"
            role="tab" aria-selected="true"><i class="bi bi-clipboard-data-fill"></i> Analytics</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#users" type="button" role="tab"
            aria-selected="false"><i class="bi bi-people-fill"></i> Users</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#logs" type="button" role="tab"
            aria-selected="false"><i class="bi bi-binoculars-fill"></i> Logs</button>
    </li>
</ul>
<div class="tab-content border rounded p-2">
    <div class="tab-pane fade show active" id="analytics" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
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
            <h5 class="card-header">Logs</h5>
            <div class="card-body">
                <ul class="list-group">
                    <?php

                    $logs = trackingLogsGet();

                    foreach ($logs as $entry) {
                        echo "<li class='list-group-item'>{$entry}</li>";
                    }

                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>