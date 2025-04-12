<div style="margin-top: 9em; margin-bottom: 9em;" class="splash-mobile">
    <h1 class="mb-3 fw-semibold lh-1 text-center text-gradient splash-title-primary splash-title-mobile"
        style="margin-top:50px;font-size:60pt;">
        The best way to track your Nicotine Usage</h1>
    <p class="text-center junicode" style="font-size:13pt;margin-bottom: 0px;">
        Track your Nicotine Pouch usage for free, without ads.
    </p>
    <div class="container p-3 text-center">
        <a href="/?register" class="btn btn-primary-new rounded-5 me-1" data-bs-toggle="modal"
            data-bs-target="/?register">
            Create an Account <i class="bi bi-arrow-right-short"></i>
        </a>
        <a href="/?login" class="btn btn-secondary-new rounded-5 ms-1">
            Login <i class="bi bi-arrow-right-short"></i>
        </a>
    </div>
</div>
<div class="row g-0" style="margin: 0px!important; margin-bottom: 9em!important;">
    <div class="col-sm-6 col-md-6 ps-0">
        <h1 class="fw-semibold">What is Pouchtrack?</h1>
        <p class="me-1">Pouchtrack lets you track your individual pouches used, mgs used, and cans used.
            You can see this data in a chart or table, and even export it as JSON.</p>
        <p class="me-1">All for free, with no ads.</p>
    </div>
    <div class="col-sm-6 col-md-6 ps-0">
        <div class="card">
            <canvas id="canschart"
                style="width: 100px; display: block; box-sizing: border-box; height: 339px;padding-left:0px;background-color: #dee2e608!important;"
                class="card-body" height="60" width="100"></canvas>
        </div>
        <script src="/assets/js/chart.umd.js"></script>
        <script>
            Chart.defaults.color = 'white';
            Chart.defaults.borderColor = '#495057';
            const cansxValues = ['04-03', '04-04', '04-05', '04-06', '04-07', '04-08', '04-10', '04-11', '04-12'];
            const cansyValues = [6, 8, 0, 10, 3, 9, 2, 12, 4];
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
    </div>
</div>
<style>
    body {
        background-image: radial-gradient(circle at 90% 24%, rgba(209, 209, 209, 0.04) 0%, rgba(209, 209, 209, 0.04) 50%, rgba(160, 160, 160, 0.04) 50%, rgba(160, 160, 160, 0.04) 100%), radial-gradient(circle at 91% 63%, rgba(45, 45, 45, 0.04) 0%, rgba(45, 45, 45, 0.04) 50%, rgba(87, 87, 87, 0.04) 50%, rgba(87, 87, 87, 0.04) 100%), radial-gradient(circle at 17% 2%, rgba(124, 124, 124, 0.04) 0%, rgba(124, 124, 124, 0.04) 50%, rgba(117, 117, 117, 0.04) 50%, rgba(117, 117, 117, 0.04) 100%), linear-gradient(88deg, rgb(33, 20, 105), rgb(1, 15, 13)) !important;
    }
</style>