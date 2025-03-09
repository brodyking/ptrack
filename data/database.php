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
    return 'data/db_users/' . $username . '/';
}
function userExists($username)
{
    $pathto = userPathTo($username);
    return file_exists($pathto . 'account.json');
}
function userSettingsGet($username,$key) {
    $pathto = userPathTo($username);
    $account = json_decode(read($pathto."account.json"),true);
    return $account[$key];
}
function userSettingsSet($username,$key,$value) {
    $pathto = userPathTo($username);
    $account = json_decode(read($pathto."account.json"),true);
    $account[$key] = $value; 
    $account = json_encode($account,JSON_PRETTY_PRINT);
    write($pathto."account.json",$account);
}
function userAuth($username, $password)
{
    return $password == userSettingsGet($username,"password");
}
function userCreate($username, $password)
{
    $pathto = userPathTo($username);
    mkdir($pathto);
    write($pathto."pouches.json","");
    $accountdata = array();
    $accountdata["username"] = $username;
    $accountdata["password"] = $password;
    $accountdata["joindate"] = date("m-d-Y");
    $accountdata["secureid"] = "true";
    $accountdata["isdeleted"] = "false";
    $accountdata = json_encode($accountdata,JSON_PRETTY_PRINT);
    write($pathto."account.json",$accountdata);
    return 0;
}
function userDelete($username)
{
    userSettingsSet($username,"password",(string)random_int(100000000,100000000000));
    userSettingsSet($username,"isdeleted","true");
}
function userSessionInit($username, $id)
{
    $pathto = userPathTo($username);
    $idtosend = array();
    $idtosend["id"] = $id;
    write($pathto . 'session.json',json_encode($idtosend,JSON_PRETTY_PRINT));
    return 0;
}

function userSessionClear($username)
{
    $pathto = userPathTo($username);
    unlink($pathto . 'session.json');
    return 0;
}

function userSessionGet($username)
{
    $pathto = userPathTo($username);
    if (file_exists($pathto . "session.json")) {
        $session = read($pathto . "session.json");
        $session = json_decode($session,true);
        return $session["id"];
    }
    return -1;
}
function userSessionCreate($username)
{
    $pathto = userPathTo($username);
    $newid = array();
    $newidint = random_int(100000000, 1000000000);
    $newid["id"] =  $newidint;
    $newid = json_encode($newid,JSON_PRETTY_PRINT);
    write($pathto . "session.json", $newid);
    return $newidint;
}
function userSessionSecureInit($username) {
    if (userSessionSecureGet($username)) {
        return userSessionCreate($username);
    } else {
        return userSessionGet($username);
    }
}
function userSessionSecureGet($username) {
    $issecuresession = userSettingsGet($username,"secureid");
    return ($issecuresession == "true");
}
function userSessionSecureSet($username,$value) {
   userSettingsSet($username,"secureid",$value);
}
function userPasswordGet($username) {
    userSettingsGet($username,"password");
}
function userChangePassword($username, $password)
{
    userSettingsSet($username,"password",$password);
}

function userIsAdmin($username)
{
    $isadmin = userSettingsGet($username,"isadmin");
    return ($isadmin == "true");
}

function userJoinDate($username)
{
    userSettingsGet($username,"joindate");
}

// POUCH FUNCTIONS
function pouchInit($username, $day)
{
    $pathto = userPathTo($username);
    $old = json_decode(read($pathto."pouches.json"),true);
    $old[$day] = [0,0];
    $new = json_encode($old,JSON_PRETTY_PRINT);
    write($pathto."pouches.json",$new);   
    return 0;
}
function pouchExists($username, $day)
{
    $pathto = userPathTo($username);
    $old = json_decode(read($pathto."pouches.json"),true);
    return isset($old[$day]);

}
function pouchAdd($username,$day,$strength) {
    $pathto = userPathTo($username);
    $old = json_decode(read($pathto."pouches.json"),true);
    $old[$day] = array((int)$old[$day][0] + 1,(int)$old[$day][1] + $strength);
    $new = json_encode($old,JSON_PRETTY_PRINT);
    write($pathto."pouches.json",$new);
}
function pouchGetMgs($username, $day)
{
    $pathto = userPathTo($username);
    $old = json_decode(read($pathto."pouches.json"),true);
    return $old[$day][1];
}
function pouchGetPouches($username, $day)
{
    $pathto = userPathTo($username);
    $old = json_decode(read($pathto."pouches.json"),true);
    return $old[$day][0];
}
function pouchGetHistoryArray($username)
{
    $pathto = userPathTo($username);
    $old = json_decode(read($pathto."pouches.json"),true);
    return array_keys($old);
}
// ?>