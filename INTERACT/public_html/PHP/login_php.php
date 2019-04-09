<?php
session_start();
//Sjekker logginn validering, logger inn bruker hvis riktig
if(isset($_POST['logginn'])){
  include 'dbconnect.php';

  $_SESSION['email'] = $_POST['email'];
  $_SESSION['password'] = $_POST['password'];

  //Sikrer sql-injection
  $email = stripslashes($_SESSION['email']);
  $password = stripslashes($_SESSION['password']);

  $sql = "SELECT epost, passord FROM admin WHERE epost = '$email' AND passord = '$password'";
  $result = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($result);

  if($count == 1){
    while ($row = mysqli_fetch_array($result)){
      $check_email = $row['epost'];
      $check_pw = $row['passord'];
    }

    if ($email == $check_email && $password == $check_pw){
      $_SESSION['loggetinn'] = true;
      header("Location: ../all_cases.php");
      exit();
    }
  }
}

if(isset($_POST['loggut'])){
  $_SESSION['loggetinn'] = false;
  exit();
}

?>
