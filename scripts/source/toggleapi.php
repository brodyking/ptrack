<?php

function toggleapi()
{
    if (!isset($_COOKIE["username"]) || !isset($_COOKIE["id"])) {
        apiError("toggleapi.missingparams");
    } else if (!userExists($_COOKIE["username"])) {
        apiError("toggleapi.nouser");
    } else if ($_COOKIE["id"] != userSessionGet($_COOKIE["username"])) {
        apiError("toggleapi.invalidsession");
    } else {
        if (userSettingsGet($_COOKIE["username"], "allowapi") == "false") {
            userSettingsSet($_COOKIE["username"], "allowapi", "true");
        } else {
            userSettingsSet($_COOKIE["username"], "allowapi", "false");
        }
        apiFinish();
    }
}