<?php

// $httperrormessage = "";

$httperrormessageList = [
    "400" =>
    "Bad Request",
    "401" =>
    "Unauthorized.",
    "403" =>
    "Forbidden.",
    "404" =>
    "Page not Found.",
    "405" =>
    "Method not Allowed.",
    "406" =>
    "Not Acceptable.",
    "500" =>
    "Internal Server Error"
];

$httperrormessage = $httperrormessageList[$_GET["httperror"]];

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
