<?php
function isLoggedIn()
{
  return isset($_COOKIE['username']) && isset($_COOKIE['id']) && userSessionGet($_COOKIE['username']) == $_COOKIE['id'];
}
?>