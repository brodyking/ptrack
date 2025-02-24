<!DOCTYPE html>
<html>

<head>
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home ~ Pouchtrack</title>
  <link rel="icon" type="image/x-icon" href="assets/logo.png">
</head>

<body data-bs-theme="dark" style="padding: 10px;">
  <div style="max-width:700px;margin:auto;">

    <?php

    include("modules/head.php");
    include("data/database.php");


    // Check if username and id are present in url
    if (!isset($_GET['username']) || !isset($_GET['id'])) {
      header("Location: index.php?error=invalidsession");
    }
    // Set variables
    $username = $_GET['username'];
    $id = $_GET['id'];
    // Check if users session is valid
    if (userSessionGet($username) != $id) {
      // Reset the session for security purposes.
      userSessionClear($username);
      // Redirect to login
      header("Location: index.php?error=invalidsession");
    }
    // Error Logging
    if (isset($_GET['error'])) {
      switch ($_GET['error']) {
        default:
          break;
      }
    }

    //Creates new day if it does not exist    
    if (!pouchExists($username, date("m-d-Y"))) {
      pouchInit($username, date("m-d-Y"));
    }

    ?>
    <?php if (isset($_GET['firstlogin'])) {
      echo '
    <div class="alert alert-dark alert-dismissible fade show" role="alert">
      <strong>Remember!</strong> Always click "logout" at the bottom of the page before closing the app!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    ';
    }
    ?>
    <div class="card">
      <h5 class="card-header">Welcome back, <span class="text-primary"><?php echo $username ?></span>!</h5>
      <div class="card-body">
        <a href="count.php?strength=6&<?php echo "username=" . $username . "&id=" . $id ?>"
          class="btn btn-success">6mg</a>
        <a href="count.php?strength=9&<?php echo "username=" . $username . "&id=" . $id ?>"
          class="btn btn-primary">9mg</a>
        <a href="count.php?strength=12&<?php echo "username=" . $username . "&id=" . $id ?>"
          class="btn btn-danger">12mg</a>
        <a data-bs-toggle="modal" data-bs-target="#reset" class="btn btn-secondary">Reset Today</a>
      </div>
    </div>

    <br>

    <div class="card">
      <h5 class="card-header">Todays Statistics</h5>
      <div class="card-body">
        <style>
          code {
            font-size: 12pt;
          }
        </style>
        <table class="table table-bordered">
          <tr>
            <td><b>Total Pouches:</b></td>
            <td><code><?php echo pouchGetPouches($username, date("m-d-Y")); ?></code></td>
          </tr>
          <tr>
            <td><b>Total Mgs:</b></td>
            <td><code><?php echo pouchGetMgs($username, date("m-d-Y")); ?></code></td>
          </tr>
        </table>
      </div>
    </div>

    <br>

    <div class="card">
      <h5 class="card-header">History</h5>
      <div class="card-body">
        <style>
          code {
            font-size: 12pt;
          }
        </style>

        <h5 class="card-title">Pouches</h5>
        <canvas id="poucheschart" style="width:100%;max-width:700px;" class="border"></canvas>
        <br>
        <script src="assets/js/chart.umd.js"></script>
        <?php

        $graphxvals = "[";
        $graphyvals = "[";
        $history = pouchGetHistoryArray($username);

        for ($i = 0; $i < sizeof($history); $i++) {
          if ($i == sizeof($history) - 1) {
            $graphxvals = $graphxvals . "'" . $history[$i] . "']";
          } else {
            $graphxvals = $graphxvals . "'" . $history[$i] . "', ";
          }
        }

        for ($i = 0; $i < sizeof($history); $i++) {
          $graphyvalscurrent = pouchGetPouches($username, $history[$i]);
          if ($i == sizeof($history)-1) {
            $graphyvals = $graphyvals . $graphyvalscurrent . "]";
          } else {
            $graphyvals = $graphyvals . $graphyvalscurrent . ", ";
          }
        }


        ?>
        <script>
          Chart.defaults.color = 'white';
          Chart.defaults.borderColor = '#495057';
          
          const xValues = <?php echo $graphxvals; ?>;
          const yValues = <?php echo $graphyvals; ?>;
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
        <br>
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

    <br>


    <div class="card">
      <h5 class="card-header">Announcements</h5>
      <div class="card-body">

        <h5 class="card-title">Recent Updates v2.1</h5>
        <p class="card-text">Brought in the ability to Create new Accounts, and Delete accounts. Also added ToS.
        </p>


        <h5 class="card-title">Recent Updates v2.0</h5>
        <p class="card-text">Some recent changes:
        <ul>
          <li>New Backend, including databases and API</li>
          <li>Enhanced UI featuring dark mode!</li>
        </ul>
        </p>
      </div>
    </div>

    <!-- Clear Statistics for today popup -->
    <div class="modal fade" id="reset" tabindex="-1" aria-labelledby="reset" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="register">Warning</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>You are about to reset your statistics for today. You cannot undo this action. And no cheating!!</p>
          </div>
          <div class="modal-footer">
            <a href="count.php?strength=reset&<?php echo "username=" . $username . "&id=" . $id ?>"
              class="btn btn-danger">Reset</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Delete Account popup -->
    <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="reset" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="delete">Warning</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>You are about to delete your account. This is permanent and you will not have access to your information
              once you click Delete. Do you wish to continue?</p>
          </div>
          <div class="modal-footer">
            <a href="delete.php?<?php echo "username=" . $username . "&id=" . $id ?>" class="btn btn-danger">Delete my
              Account</a>
          </div>
        </div>
      </div>
    </div>

    <p style="margin-top:30px;" class="text-center">
      <a style="text-decoration: none;" href="logout.php?username=<?php echo $username ?>">Logout</a>
      &middot;
      <a style="text-decoration: none;" href="paperwork.php">Terms of Service</a>
      &middot;
      <a style="text-decoration: none;" href="#" data-bs-toggle="modal" data-bs-target="#delete">Delete my Account</a>
    </p>

    <script src="assets/js/bootstrap.js"></script>




</body>

</html>