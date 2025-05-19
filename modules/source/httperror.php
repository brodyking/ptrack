<?php

$httperrormessage = "";

switch ($_GET["httperror"]) {
    case "400":
        $httperrormessage = "Bad Request";
        break;
    case "401":
        $httperrormessage = "Unauthorized.";
        break;
    case "403":
        $httperrormessage = "Forbidden.";
        break;
    case "404":
        $httperrormessage = "Page not Found.";
        break;
    case "405":
        $httperrormessage = "Method not Allowed.";
        break;
    case "406":
        $httperrormessage = "Not Acceptable.";
        break;
    case "500":
        $httperrormessage = "Internal Server Error";
        break;
}

?>

<div class="container p-3 text-center mt-5">
    <h1 class="fw-semibold" style="font-size: 45pt;">Error <?php echo $_GET["httperror"]; ?></h1>
    <p><?php echo $httperrormessage; ?></p>
    <a href="/" class="btn btn-primary-new rounded-5 me-1" data-bs-toggle="modal" data-bs-target="/?register">
        Back to Home <i class="bi bi-arrow-right-short"></i>
    </a>
    <a href="/?bugreport" class="btn btn-secondary-new rounded-5 me-1" data-bs-toggle="modal"
        data-bs-target="/?register">
        Report Bug <i class="bi bi-arrow-right-short"></i>
    </a>
</div>