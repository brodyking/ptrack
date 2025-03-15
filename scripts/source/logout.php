<?php

function logout() {
    if (userExists($_GET['username'])) {
        // Clear session id
        userSessionClear($_GET['username']);
        // Redirect to login
        header("Location: /");
    } else {
        apiError("logout.nouser");
    }
}


?>