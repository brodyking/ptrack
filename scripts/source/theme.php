<?php

if (isset($_COOKIE["theme"])) {
    switch ($_COOKIE["theme"]) {
        case "dark":
            echo "
            <style>
                body { 
                    background-image: repeating-linear-gradient(48deg, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 27px, transparent 27px, transparent 30px), repeating-linear-gradient(352deg, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 27px, transparent 27px, transparent 30px), repeating-linear-gradient(30deg, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 27px, transparent 27px, transparent 30px), linear-gradient(90deg, rgb(14, 172, 245), rgb(129, 60, 165))!important;
                    background-repeat: no-repeat !important;
                    background-attachment: fixed !important;
                }
            </style>";
            break;
    }
}

?>