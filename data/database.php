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
function pouchGetHistoryString($username) {
    $pathto = userPathTo($username);
    $history = scandir($pathto);
    $historyString = "";
    for ($i = 2; $i < sizeof($history);$i++) {
        if (!is_dir($pathto . $history[$i])) {
            break;
        }
      $historyString = $historyString . $history[$i] . ", ";
    }
    return $historyString;
}
function pouchGetHistoryArray($username) {
    $pathto = userPathTo($username);
    $history = scandir($pathto);
    $historyArray = array();
    $spotinnewarray = 0;
    for ($i = 2; $i < sizeof($history);$i++) {
        if (!is_dir($pathto . $history[$i])) {
            break;
        }
        $historyArray[$spotinnewarray] = $history[$i];
        $spotinnewarray++;
    }
    return $historyArray;
}

// ?>