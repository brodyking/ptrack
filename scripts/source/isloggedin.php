<?php
function isLoggedIn()
{
  return isset($_GET['username']) && isset($_GET['id']) && userSessionGet($_GET['username']) == $_GET['id'];
}
?>