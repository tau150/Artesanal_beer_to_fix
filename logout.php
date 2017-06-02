<?php
require_once('./support.php');
 

// if(isset($_SESSION['username'])){
//     if(isset($_COOKIE['username'])){
//     unset($_COOKIE['username']);
//     unset($_COOKIE['id']);
//     setcookie('username', '', time() - 3600, '/');
//     setcookie('id', '', time() - 3600, '/');
//   }

  session_destroy();
  header("Location: index.php");exit;
  

?>