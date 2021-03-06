<?php
session_start();
//Sjekker logginn validering, logger inn bruker hvis riktig
if(empty($_SESSION['loggetinn'])){
  $_SESSION['loggetinn'] = false;
}
if(isset($_POST['logginn'])){
  include 'dbconnect.php';

  $_SESSION['email'] = $_POST['email'];
  $_SESSION['password'] = $_POST['password'];

  //Sikrer sql-injection
  $email = $_SESSION['email'];
  $password = $_SESSION['password'];

  $sql = $conn->prepare("SELECT epost, passord FROM admin WHERE epost = ? AND passord = ?");
  $sql->bind_param('ss', $email, $password);
  $sql->execute();
  $result = $sql->get_result();
  $count = mysqli_num_rows($result);

  if($count == 1){
    while ($row = $result->fetch_assoc()){
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
