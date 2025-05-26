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
<h1 class="fw-semibold text-center">Why use Pouchtrack?</h1>
<p class="text-center p-2" style="margin-bottom: 6em !important;">
    We have a few advantages over our competitors.
</p>
<div class="row g-0" style="margin: 0px!important; margin-bottom: 6em!important;">
    <div class="col-sm-6 col-md-6 pt-0 p-2">
        <div class="card mb-3">
            <div style="display: block; background-color: #dee2e608!important;" class="card-body">
                <h5>We <i class="bi bi-heart-fill ms-1 me-1"></i>️ Open Source.</h5>
                <hr>
                We allow anyone to view the source code of Pouchtrack. That means vulernabilities can be patched by the
                community, and a more transparent relationship between the user and us.
                <br><br>
                <a class="btn btn-secondary-new" href="https://github.com/brodyking/ptrack">
                    Check out our GitHub! <i class="bi bi-arrow-right-short"></i>
                </a>
            </div>
        </div>
        <div class="card">
            <div style="display: block; background-color: #dee2e608!important;" class="card-body">
                <h5>You can export your data.</h5>
                <hr>
                While exporting as a picture is included, we also allow you to export all your data into JSON format,
                which keeps you in control. Even if you decide this app isn't right for you.
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-6 pt-0 p-2">
        <div class="card mb-3">
            <div style="display: block; background-color: #dee2e608!important;" class="card-body">
                <h5>We are <u>ad free</u> and <u>subscription free</u>.</h5>
                <hr>
                That means you won't be bothered by a subscription draining your wallet. You are
                already paying for overpriced cans anyways!
            </div>
        </div>
        <div class="card">
            <div style="display: block; background-color: #dee2e608!important;" class="card-body">
                <h5>How are you making money? Are you selling my data?</h5>
                <hr>
                <u>We do not sell user data.</u>
                This app has a small userbase, and php hosting has never been cheaper. If server costs rise, I will
                start accepting donations. If you are worried about privacy, feel free to self host Pouchtrack!
                <br><br>
                <a href="https://github.com/brodyking/ptrack/blob/main/docs/guides/getting-started.md"
                    class="btn btn-secondary-new">
                    Self Hosting Guide <i class="bi bi-arrow-right-short"></i></a>
            </div>
        </div>
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
        @media only screen and (max-width : 795px) {
            body {
                background-image: linear-gradient(0deg, rgb(39, 32, 87), rgb(10, 11, 30), rgb(39, 32, 87)) !important;
                background-attachment: fixed !important;
            }
        }

        body {
            /* Thank you https://app.haikei.app/ */
            background-image: url('/assets/splash.svg');
            background-repeat: no-repeat !important;
            background-attachment: scroll !important;
            background-size: cover;
        }
    </style>