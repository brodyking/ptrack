<?php
function settingsGetPrettyBool($variable)
{
    $settingsjson = file_get_contents("config.json");
    $settings = json_decode($settingsjson, true);
    if ($settings[$variable] == true) {
        return "true";
    }
    return "false";
}
?>
<style>
    @media only screen and (max-width : 795px) {
        .devwarning {
            position: relative !important;
            padding: 20px;
        }
    }
</style>
<pre style="position: fixed;" class="devwarning"><span style="background-color:black;"><span class="text-warning"><b><i class="bi bi-exclamation-triangle-fill"></i> <u>This is a Development Version.</u> <i class="bi bi-exclamation-triangle-fill"></i></b></span>

- No changes will be saved.
- Bugs may occour.
- Database is NOT secured

<span class="text-danger"><b>Under <u>no circumstance</u> should you input
any real information into this site.</b></span>

If you wish to hide this message for
any reason, you can add ?hidewarn to
the url params, or set a hidewarn cookie.

<span class="text-info"><b><i class="bi bi-git"></i> <u>Configuration</u> <i class="bi bi-git"></i></b></span>

site.name => <span class="text-primary"><?php echo settingsGet("site.name"); ?></span>
site.version => <span class="text-primary"><?php echo settingsGet("site.version"); ?></span>
site.allowmanage => <span class="text-primary"><?php echo settingsGetPrettyBool("site.allowManage"); ?></span>
site.isdev => <span class="text-primary"><?php echo settingsGetPrettyBool("site.isdev"); ?></span>

database.checkContents => <span class="text-primary"><?php echo settingsGetPrettyBool("database.checkContents"); ?></span>

tracking.views => <span class="text-primary"><?php echo settingsGetPrettyBool("tracking.views"); ?></span>
tracking.logs => <span class="text-primary"><?php echo settingsGetPrettyBool("tracking.logs"); ?></span>
tracking.logs.html => <span class="text-primary"><?php echo settingsGetPrettyBool("tracking.logs.html"); ?></span>
tracking.logs.txt => <span class="text-primary"><?php echo settingsGetPrettyBool("tracking.logs.txt"); ?></span>

bugreports => <span class="text-primary"><?php echo settingsGetPrettyBool("bugreports"); ?></span>

users.allowNewAccounts => <span class="text-primary"><?php echo settingsGetPrettyBool("users.allowNewAccounts"); ?></span>
users.allowLogin => <span class="text-primary"><?php echo settingsGetPrettyBool("users.allowLogin"); ?></span>

</span></pre>