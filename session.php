<?php
session_start();
function checkSession() {
  if (!isset($_SESSION['chk_login']) || $_SESSION['chk_login'] !== true) {
    header('Location: login.php');
    exit();
  }
}
?>
