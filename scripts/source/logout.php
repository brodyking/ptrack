<?php

function logout()
{
    if (userExists($_COOKIE['username'])) {
        // Clear session id
        userSessionClear($_COOKIE['username']);
        // Redirect to login
        header("Location: /");
    } else {
        apiError("logout.nouser");
    }
}


?>