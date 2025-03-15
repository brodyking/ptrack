<?php
function isLoggedIn()
{
  if (!isset($_GET['username']) || !isset($_GET['id'])) {
    return false;
  }
  return (userSessionGet($_GET['username']) == $_GET['id']);
}
?>