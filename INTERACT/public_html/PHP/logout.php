<?php
session_start();
if(isset($_POST['loggut'])){
  $_SESSION['loggetinn'] = false;
  header ("Location: ../login.php");
  exit();
}
?>
