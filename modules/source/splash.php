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
            const cansyValues = [8, 6, 7, 5, 6, 3, 2, 4, 2];
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
<div class="row g-0" style="margin: 0px!important; margin-bottom: 6em!important;">
    <div class="col-sm-6 col-md-6 ps-0 nomobile">
        <img src="assets/iphonemockup.png" style="max-width:100%;">
    </div>
    <div class="col-sm-6 col-md-6 ps-0">
        <h1 class="fw-semibold">Why use Pouchtrack?</h1>
        <p>
            We have a few advantages over our competitors.
        <div class="card">
            <div style="display: block; background-color: #dee2e608!important;" class="card-body">
                <h5>We are <u>ad free</u> and <u>subscription free</u>.</h5>
                <hr>
                That means you wont be bothered by a subscription draining your wallet. You are
                already paying for overpriced cans anyways!
            </div>
        </div>
        <br>
        <div class="card">
            <div style="display: block; background-color: #dee2e608!important;" class="card-body">
                <h5>You can export your data.</h5>
                <hr>
                We allow you to export all your data into JSON format, which keeps you in control. Even if you decide
                this app
                isnt right for you.
            </div>
        </div>
        <br>
        <div class="card">
            <div style="display: block; background-color: #dee2e608!important;" class="card-body">
                <h5>We <i class="bi bi-heart-fill ms-1 me-1"></i>️ Open Source.</h5>
                <hr>
                We allow anyone to view the code running this service. That means vulernabilities can be patched by the
                community, and a more transparent relationship between the user and us.
                <br><br>
                <a class="btn btn-secondary-new" href="https://github.com/brodyking/ptrack">Check our our GitHub!</a>

            </div>
        </div>
        </p>
    </div>
</div>
<div class="container p-3 text-center mb-5">
    <p class="text-center junicode mb-4" style="font-size:13pt;margin-bottom: 0px;">
        What are you waiting for?
    </p>
    <a href="/?register" class="btn btn-primary-new rounded-5 me-1" data-bs-toggle="modal" data-bs-target="/?register">
        Create an Account <i class="bi bi-arrow-right-short"></i>
    </a>
    <style>
        body {
            background-image: radial-gradient(circle at 99% 0%, rgba(235, 235, 235, 0.03) 0%, rgba(235, 235, 235, 0.03) 50%, rgba(142, 142, 142, 0.03) 50%, rgba(142, 142, 142, 0.03) 100%), radial-gradient(circle at 84% 89%, rgba(229, 229, 229, 0.03) 0%, rgba(229, 229, 229, 0.03) 50%, rgba(1, 1, 1, 0.03) 50%, rgba(1, 1, 1, 0.03) 100%), radial-gradient(circle at 89% 20%, rgba(219, 219, 219, 0.03) 0%, rgba(219, 219, 219, 0.03) 50%, rgba(38, 38, 38, 0.03) 50%, rgba(38, 38, 38, 0.03) 100%), radial-gradient(circle at 90% 0%, rgba(48, 48, 48, 0.03) 0%, rgba(48, 48, 48, 0.03) 50%, rgba(109, 109, 109, 0.03) 50%, rgba(109, 109, 109, 0.03) 100%), linear-gradient(257deg, rgb(31, 12, 90), rgb(2, 41, 29));
            /*background-image: radial-gradient(circle at 90% 24%, rgba(209, 209, 209, 0.04) 0%, rgba(209, 209, 209, 0.04) 50%, rgba(160, 160, 160, 0.04) 50%, rgba(160, 160, 160, 0.04) 100%), radial-gradient(circle at 91% 63%, rgba(45, 45, 45, 0.04) 0%, rgba(45, 45, 45, 0.04) 50%, rgba(87, 87, 87, 0.04) 50%, rgba(87, 87, 87, 0.04) 100%), radial-gradient(circle at 17% 2%, rgba(124, 124, 124, 0.04) 0%, rgba(124, 124, 124, 0.04) 50%, rgba(117, 117, 117, 0.04) 50%, rgba(117, 117, 117, 0.04) 100%), linear-gradient(88deg, rgb(33, 20, 105), rgb(1, 15, 13)) !important;*/
            background-repeat: no-repeat !important;
            background-attachment: fixed !important;
        }
    </style>