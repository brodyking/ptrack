<!DOCTYPE html>
<html>

<head>
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>API ~ Pouchtrack</title>
  <link rel="icon" type="image/x-icon" href="assets/logo.png">
</head>

<body data-bs-theme="dark" style="padding: 10px;">
<code>

    <?php
    include "data/database.php";

    function addError($error)
    {
        echo "[ERROR] " . $error . "<br>";
    }

    if (!isset($_GET['username']) || !isset($_GET['password'])) {
        addError("NO USERNAME OR PASSWORD.");
    } else {
        $username = $_GET['username'];
        $password = $_GET['password'];
        if (!userExists($username) or !userAuth($username, $password)) {
            addError("ACCOUNT INFORMATION IS WRONG.");
        } else {
            if (!isset($_GET['action'])) {
                addError("MISSING ACTION");
            } else {
                $action = $_GET['action'];

                switch ($action) {
                    case "list-all":
                        $historydates = pouchGetHistoryArray($username);
                        for ($i = 0; $i < count($historydates); $i++) {
                            echo $historydates[$i];
                            echo " - ";
                            echo pouchGetPouches($username, $historydates[$i]);
                            echo " - ";
                            echo pouchGetMgs($username, $historydates[$i]);
                            echo "<br>";
                        }
                        break;
                    default:
                        break;
                }
            }
        }
    }
    ?>
</code>
</body>
</html>