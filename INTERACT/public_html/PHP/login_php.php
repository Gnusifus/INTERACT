<?php
//Sjekker logginn validering, logger inn bruker hvis riktig
session_start();

if(isset($_POST['logginn'])){

include 'dbconnect.php';

$_SESSION['email'] = $_POST['email'];
$_SESSION['password'] = $_POST['password'];

$email = stripslashes($_SESSION['email']);
$password = stripslashes($_SESSION['password']);

$sql1 = "SELECT * FROM admin WHERE epost='$email'";

$result1 = mysqli_query($conn, $sql1);
$count1 = mysqli_num_rows($result1);

if($count1 == 1){
    $sql2 = "SELECT passord FROM admin WHERE epost='$email'";
    $result2 = mysqli_query($conn, $sql2);
    $row = mysqli_fetch_array($result2);
    header('Location: ../all_cases.php');
   }
    else{
        //FRIDA FIX
        echo "Feil passord";
      }
$conn->close();
}


?>
