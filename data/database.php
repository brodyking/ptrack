<?php
// BASIC FILE READING

function read($file)
{
    return file_get_contents($file);
}
function write($file, $data)
{
    file_put_contents($file, $data);
    return 0;
}
function isEmpty($file)
{
    return (read($file) == '');
}

// CONFIG ACCESS
function settingsGet($variable)
{
    $settingsjson = file_get_contents("config.json");
    $settings = json_decode($settingsjson, true);
    return $settings[$variable];
}
function getSiteName()
{
    return settingsGet("site.name");
}
function getSiteVersion()
{
    return settingsGet("site.version");
}
// USER FUNCTIONS
function userPathTo($username)
{
    return 'data/db_users/' . $username . '/';
}
function userExists($username)
{
    $pathto = userPathTo($username);
    return file_exists($pathto . 'account.json');
}
function userSettingsGet($username, $key)
{
    $pathto = userPathTo($username);
    $account = json_decode(read($pathto . "account.json"), true);
    return $account[$key];
}
function userSettingsSet($username, $key, $value)
{
    $pathto = userPathTo($username);
    $account = json_decode(read($pathto . "account.json"), true);
    $account[$key] = $value;
    $account = json_encode($account, JSON_PRETTY_PRINT);
    write($pathto . "account.json", $account);
}
function userAuth($username, $password)
{
    return $password == userSettingsGet($username, "password");
}
function userCreate($username, $password)
{
    $pathto = userPathTo($username);
    mkdir($pathto);
    write($pathto . "pouches.json", "");
    write($pathto . "cans.json", "");
    $accountdata = array();
    $accountdata["username"] = $username;
    $accountdata["password"] = $password;
    $accountdata["joindate"] = date("m-d-Y");
    $accountdata["isdeleted"] = "false";
    $accountdata["secureid"] = "false";
    $accountdata = json_encode($accountdata, JSON_PRETTY_PRINT);
    write($pathto . "account.json", $accountdata);
    return 0;
}
function userDelete($username)
{
    userSettingsSet($username, "password", (string) random_int(100000000, 100000000000));
    userSettingsSet($username, "isdeleted", "true");
}
function userSessionClear($username)
{
    $pathto = userPathTo($username);
    unlink($pathto . 'session.json');
    if (isset($_COOKIE['username'])) {
        unset($_COOKIE['username']);
        setcookie('username', '', -1, '/');
    }
    if (isset($_COOKIE['id'])) {
        unset($_COOKIE['id']);
        setcookie('id', '', -1, '/');
    }
    return 0;
}

function userSessionGet($username)
{
    $pathto = userPathTo($username);
    if (file_exists($pathto . "session.json")) {
        $session = read($pathto . "session.json");
        $session = json_decode($session, true);
        return $session["id"];
    }
    return -1;
}
function userSessionCreate($username)
{
    $pathto = userPathTo($username);
    $newid = array();
    $newidint = random_int(100000000, 1000000000);
    $newid["id"] = $newidint;
    $newid = json_encode($newid, JSON_PRETTY_PRINT);
    write($pathto . "session.json", $newid);
    return $newidint;
}
function userPasswordGet($username)
{
    userSettingsGet($username, "password");
}
function userChangePassword($username, $password)
{
    userSettingsSet($username, "password", $password);
}

function userIsAdmin($username)
{
    $isadmin = userSettingsGet($username, "isadmin");
    return ($isadmin == "true");
}

function userJoinDate($username)
{
    return userSettingsGet($username, "joindate");
}

// POUCH FUNCTIONS
function pouchInit($username, $day)
{
    $pathto = userPathTo($username);
    $old = json_decode(read($pathto . "pouches.json"), true);
    $old[$day] = [0, 0];
    $new = json_encode($old, JSON_PRETTY_PRINT);
    write($pathto . "pouches.json", $new);
    return 0;
}
function pouchExists($username, $day)
{
    $pathto = userPathTo($username);
    $old = json_decode(read($pathto . "pouches.json"), true);
    return isset($old[$day]);

}
function pouchAdd($username, $day, $strength)
{
    $pathto = userPathTo($username);
    $old = json_decode(read($pathto . "pouches.json"), true);
    $old[$day] = array((int) $old[$day][0] + 1, (int) $old[$day][1] + $strength);
    $new = json_encode($old, JSON_PRETTY_PRINT);
    write($pathto . "pouches.json", $new);
}
function pouchGetMgs($username, $day)
{
    $pathto = userPathTo($username);
    $old = json_decode(read($pathto . "pouches.json"), true);
    return $old[$day][1];
}
function pouchGetPouches($username, $day)
{
    $pathto = userPathTo($username);
    $old = json_decode(read($pathto . "pouches.json"), true);
    return $old[$day][0];
}
function pouchGetHistoryArray($username)
{
    $pathto = userPathTo($username);
    $old = json_decode(read($pathto . "pouches.json"), true);
    return array_keys($old);
}
function pouchGetHistoryArrayMonth($username, $month)
{
    $pathto = userPathTo($username);
    $old = array_keys(json_decode(read($pathto . "pouches.json"), true));
    $new = [];
    $newspot = 0;
    for ($i = 0; $i < count($old); $i++) {
        if (substr($old[$i], 0, 2) == $month) {
            $new[$newspot] = $old[$i];
            $newspot++;
        }
    }
    return $new;
}

function monthsIsValid($input)
{
    $months = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];
    foreach ($months as $month) {
        if ($input == $month)
            return true;
    }
    return false;
}

function monthsGet()
{
    return [["01", "January"], ["02", "February"], ["03", "March"], ["04", "April"], ["05", "May"], ["06", "June"], ["07", "July"], ["08", "August"], ["09", "September"], ["10", "October"], ["11", "November"], ["12", "December"]];
}

function canInit($username, $day)
{
    $pathto = userPathTo($username);
    $old = json_decode(read($pathto . "cans.json"), true);
    $old[$day] = 0;
    $new = json_encode($old, JSON_PRETTY_PRINT);
    write($pathto . "cans.json", $new);
    return 0;
}

function canExists($username, $day)
{
    $pathto = userPathTo($username);
    $old = json_decode(read($pathto . "cans.json"), true);
    return isset($old[$day]);

}

function canAdd($username, $day)
{
    $pathto = userPathTo($username);
    $old = json_decode(read($pathto . "cans.json"), true);
    $old[$day] = $old[$day] + 1;
    $new = json_encode($old, JSON_PRETTY_PRINT);
    write($pathto . "cans.json", $new);
}
function canGet($username, $day)
{
    $pathto = userPathTo($username);
    $old = json_decode(read($pathto . "cans.json"), true);
    return $old[$day];
}
function canGetHistoryArray($username)
{
    $pathto = userPathTo($username);
    $old = json_decode(read($pathto . "cans.json"), true);
    return array_keys($old);
}

function canGetHistoryArrayMonth($username, $month)
{
    $pathto = userPathTo($username);
    $old = array_keys(json_decode(read($pathto . "cans.json"), true));
    $new = [];
    $newspot = 0;
    for ($i = 0; $i < count($old); $i++) {
        if (substr($old[$i], 0, 2) == $month) {
            $new[$newspot] = $old[$i];
            $newspot++;
        }
    }
    return $new;
}

// ?>