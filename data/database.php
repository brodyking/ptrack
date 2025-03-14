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
function settingsGet($variable) {
    $settingsjson = file_get_contents("config.json");
    $settings = json_decode($settingsjson,true);
    return $settings[$variable];
}
function getSiteName() {
    return settingsGet("site.name");
}
function getSiteVersion() {
    return settingsGet("site.version");
}
// USER FUNCTIONS
function userPathTo($username)
{
    return 'data/db_users/@' . $username . '/';
}
function userExists($username)
{
    $pathto = userPathTo($username);
    return file_exists($pathto . $username . '.password');
}
function userAuth($username, $password)
{
    $pathto = userPathTo($username);
    $realpassword = read($pathto . $username . '.password');
    return $realpassword == $password;
}
function userCreate($username, $password)
{
    $pathto = userPathTo($username);
    mkdir($pathto);
    write($pathto . $username . '.password', $password);
    write($pathto . $username . '.joindate', date("m-d-Y"));
    write($pathto . $username . '.secureid',"true");
    return 0;
}
function userDelete($username)
{

    $pathto = userPathTo($username);
    write($pathto . $username . '.password', random_int(10000000, 10000000000000));
    write($pathto . $username . '.isdeleted', "true");

}
function userSessionInit($username, $id)
{
    $pathto = userPathTo($username);
    write($pathto . $username . '.session', $id);
    return 0;
}

function userSessionClear($username)
{
    $pathto = userPathTo($username);
    unlink($pathto . $username . '.session');
    return 0;
}

function userSessionGet($username)
{
    $pathto = userPathTo($username);
    if (file_exists($pathto . $username . ".session")) {
        $session = read($pathto . $username . ".session");
        return $session;
    }
    return -1;
}
function userSessionCreate($username)
{
    $pathto = userPathTo($username);
    $newid = random_int(100000000, 1000000000);
    write($pathto . $username . ".session", $newid);
    return $newid;
}
function userSessionSecureInit($username) {
    if (userSessionSecureGet($username)) {
        return userSessionCreate($username);
    } else {
        return userSessionGet($username);
    }
}
function userSessionSecureGet($username) {

    $pathto = userPathTo($username);
    $value = read($pathto . $username . '.secureid');
    if ($value == "true") {
        return true;
    }
    return false;
}
function userSessionSecureSet($username,$value) {
    $pathto = userPathTo($username);
    if ($value == "true") {
        write($pathto.$username.".secureid","true");
    } else {
        write($pathto.$username.".secureid","false");
    }
}
function userPasswordGet($username) {
    $pathto = userPathTo($username);
    return read($pathto.$username.".password");
}
function userChangePassword($username, $password)
{
    $pathto = userPathTo($username);
    file_put_contents($pathto . $username . ".password", $password);
    return 0;
}

function userIsAdmin($username)
{
    $pathto = userPathTo($username);
    return (file_exists($pathto . $username . ".isadmin"));
}

function userJoinDate($username)
{
    $pathto = userPathTo($username);
    return read($pathto . $username . ".joindate");
}

// POUCH FUNCTIONS
function pouchInit($username, $day)
{
    $pathto = userPathTo($username);
    mkdir($pathto . '/' . $day);
    $pathto = $pathto . '/' . $day . '/';
    write($pathto . $username . ".totalpouches", 0);
    write($pathto . $username . ".totalmgs", 0);
    return 0;
}
function pouchExists($username, $day)
{
    $pathto = userPathTo($username);
    $pathto = $pathto . '/' . $day . '/';
    return (file_exists($pathto . $username . ".totalpouches") && file_exists($pathto . $username . ".totalmgs"));
}
function pouchAdd($username, $day, $strength)
{
    $pathto = userPathTo($username);
    $pathto = $pathto . '/' . $day . '/';

    $currentpouches = read($pathto . $username . ".totalpouches");
    $currentmgs = read($pathto . $username . ".totalmgs");

    $currentpouches += 1;
    $currentmgs += $strength;

    write($pathto . $username . ".totalpouches", $currentpouches);
    write($pathto . $username . ".totalmgs", $currentmgs);

    return 0;
}
function pouchGetMgs($username, $day)
{
    $pathto = userPathTo($username);
    $pathto = $pathto . '/' . $day . '/';
    return read($pathto . $username . ".totalmgs");
}
function pouchGetPouches($username, $day)
{
    $pathto = userPathTo($username);
    $pathto = $pathto . '/' . $day . '/';
    return read($pathto . $username . ".totalpouches");
}
function pouchGetHistoryString($username)
{
    $pathto = userPathTo($username);
    $history = scandir($pathto);
    $historyString = "";
    for ($i = 2; $i < sizeof($history); $i++) {
        if (!is_dir($pathto . $history[$i])) {
            break;
        }
        $historyString = $historyString . $history[$i] . ", ";
    }
    return $historyString;
}
function pouchGetHistoryArray($username)
{
    $pathto = userPathTo($username);
    $history = scandir($pathto);
    $historyArray = array();
    $spotinnewarray = 0;
    for ($i = 2; $i < sizeof($history); $i++) {
        if (!is_dir($pathto . $history[$i])) {
            break;
        }
        $historyArray[$spotinnewarray] = $history[$i];
        $spotinnewarray++;
    }
    return $historyArray;
}

// ?>