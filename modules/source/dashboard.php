<?php

function whichTabLink($modeinput)
{
    if (isset($_GET["cmonth"])) {
        $mode = "cans";
    } else {
        $mode = "pouches";
    }
    if ($modeinput == $mode) {
        return "active";
    }
    return "";
}

function whichTabPane($modeinput)
{
    if (isset($_GET["cmonth"])) {
        $mode = "cans";
    } else {
        $mode = "pouches";
    }
    if ($modeinput == $mode) {
        return "show active";
    }
    return "";
}

?>
<ul class="nav nav-underline border-0 ps-2 pe-2 modepicker">
    <li class="nav-item" role="presentation">
        <button class="nav-link <?php echo whichTabLink("pouches") ?>" id="pouches-tab" onclick="alltabsPouches()"
            data-bs-toggle="tab" data-bs-target="#pouches" type="button" role="tab" aria-controls="pouches"
            aria-selected="true"><i class="bi bi-clock-fill"></i> Pouches</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link <?php echo whichTabLink("cans") ?>" id=" cans-tab" onclick="alltabsCans()"
            data-bs-toggle="tab" data-bs-target="#cans" type="button" role="tab" aria-controls="cans"
            aria-selected="false"><i class="bi bi-wallet-fill"></i>
            Cans</button>
    </li>
</ul>


<div class="tab-content border p-2 rounded mode">
    <div class="tab-pane multi fade <?php echo whichTabPane("pouches") ?>" id="pouches" role="tabpanel"
        aria-labelledby="pouches" tabindex="0">
        <?php
        include modulesGetPath("selection-pouches");
        include modulesGetPath("graph-pouches");
        ?>
    </div>
    <div class="tab-pane multi fade <?php echo whichTabPane("cans") ?>" id="cans" role="tabpanel" aria-labelledby="cans"
        tabindex="0">
        <?php
        include modulesGetPath("selection-cans");
        include modulesGetPath("graph-cans");
        ?>
    </div>
</div>