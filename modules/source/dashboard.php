<script>
    function alltabs() {

        document.getElementById("pouches-tab").classList.remove("active");
        document.getElementById("cans-tab").classList.remove("active");
        document.getElementById("all-tab").classList.add("active");

        document.getElementById("cans").classList.add("active");
        document.getElementById("cans").classList.add("show");
        document.getElementById("pouches").classList.add("active");
        document.getElementById("pouches").classList.add("show");

    }

    function alltabsPouches() {
        document.getElementById("cans").classList.remove("active");
        document.getElementById("cans").classList.remove("show");
        document.getElementById("pouches").classList.add("active");
        document.getElementById("pouches").classList.add("show");
    }

    function alltabsCans() {
        document.getElementById("cans").classList.add("active");
        document.getElementById("cans").classList.add("show");
        document.getElementById("pouches").classList.remove("active");
        document.getElementById("pouches").classList.remove("show");
    }
</script>

<?php

    function whichTabLink($modeinput) {
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

    function whichTabPane($modeinput) {
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

<ul class="nav nav-tabs border-0 ps-2 pe-2 modepicker">
    <li class="nav-item" role="presentation">
        <button class="nav-link <?php echo whichTabLink("pouches") ?>" id="pouches-tab" onclick="alltabsPouches()" data-bs-toggle="tab"
            data-bs-target="#pouches" type="button" role="tab" aria-controls="pouches" aria-selected="true"><i
                class="bi bi-clock-fill"></i> Pouches</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link <?php echo whichTabLink("cans") ?>"" id="cans-tab" onclick="alltabsCans()" data-bs-toggle="tab" data-bs-target="#cans"
            type="button" role="tab" aria-controls="cans" aria-selected="false"><i class="bi bi-wallet-fill"></i>
            Cans</button>
    </li>
    <li class="nav-item ms-auto" role="presentation">
        <a class="nav-link" id="all-tab" href="#" onclick="alltabs();" role="tab"><i
                class="bi bi-grid-1x2-fill"></i> All</a>
    </li>
</ul>


<div class="tab-content border p-2 rounded mode" id="myTabContent">
    <div class="tab-pane multi fade <?php echo whichTabPane("pouches") ?>" id="pouches" role="tabpanel" aria-labelledby="pouches" tabindex="0">
        <?php
        include modulesGetPath("selection-pouches");
        include modulesGetPath("graph-pouches");
        ?>
    </div>
    <div class="tab-pane multi fade <?php echo whichTabPane("cans")?>" id="cans" role="tabpanel" aria-labelledby="cans" tabindex="0">
        <?php
        include modulesGetPath("selection-cans");
        include modulesGetPath("graph-cans");
        ?>
    </div>
</div>