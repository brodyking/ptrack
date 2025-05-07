<?php
$sitename = settingsGet("site.name");
$sitetitle = $sitename;
function pagetitleSet($title)
{
    global $sitetitle;
    global $sitename;
    $sitetitle = $title . " · " . $sitename;
}
function pagetitleShow()
{
    global $sitetitle;
    echo "<script>document.title = '{$sitetitle}';</script>";
}
?>