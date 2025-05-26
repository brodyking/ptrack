<script src="/assets/js/chart.umd.js"></script>
<style>
    main {
        max-width: 1250px !important;
    }

    #nav {
        display: none;
    }
</style>





<nav id="nav-manager" class="navbar navbar-expand-lg bg-body-tertiary border rounded m-0 mb-2"
    style="background-color: #dee2e608!important;">
    <div class="container-fluid pe-1 ps-2">
        <a class="navbar-brand me-0" href="/?manage">
            <i class="bi bi-hammer"></i> Pouchtrack Admin Panel
        </a>
        <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            Menu <i class="bi bi-list"></i></span>
        </button>
        <div class="collapse navbar-collapse ms-1" id="navbarNavDropdown">
            <ul class="navbar-nav ms-0 ps-0 me-auto" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#views"
                        type="button" role="tab" aria-selected="true"><i class="bi bi-clipboard-data-fill"></i>
                        Views</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#users" type="button"
                        role="tab" aria-selected="false"><i class="bi bi-people-fill"></i> Users</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#logs" type="button"
                        role="tab" aria-selected="false"><i class="bi bi-terminal-fill"></i> Logs</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="config-tab" data-bs-toggle="tab" data-bs-target="#config" type="button"
                        role="tab" aria-selected="false"><i class="bi bi-gear-fill"></i> Config</button>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="data/db_bugreports/"><i class="bi bi-bug-fill"></i> Bug Reports</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-person-circle"></i>
                        <?php echo $username; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/"><i class="bi bi-door-open-fill"></i> Exit</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="tab-content">
    <div class="tab-pane show active" id="views" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
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
            <h5 class="card-header">Logs <span class="text-secondary">sorted by oldest first</span></h5>
            <div class="card-body">

                <a href="#footer" class="btn btn-primary-new mb-4 me-2">Jump to Bottom <i
                        class="bi bi-caret-down-fill"></i></a>
                <a href="/data/db_tracking/logs.txt" class="btn btn-secondary-new mb-4">View in TXT <i
                        class="bi bi-filetype-txt"></i></a>
                <?php

                $logs = trackingLogsGetHtml();

                echo "<code><pre class='border rounded p-2'>{$logs}</pre></code>";

                ?>

                <a href="#nav-manager" class="btn btn-primary-new m5-4 me-2">Jump to Top <i
                        class="bi bi-caret-up-fill"></i></a>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="config" role="tabpanel" aria-labelledby="config-tab" tabindex="0">
        <div class="card">
            <h5 class="card-header">Config</h5>
            <div class="card-body">

                <?php

                $configtxt = file_get_contents("config.json");

                echo "<code><pre class='border rounded p-2'>{$configtxt}</pre></code>";

                ?>

            </div>
        </div>
    </div>
</div>