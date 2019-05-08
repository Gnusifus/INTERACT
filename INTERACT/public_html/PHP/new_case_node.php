<?php
//Legger til ny case fra modal-form i all_cases.php
session_start();

if(isset($_POST['submit'])){

include './dbconnect.php';

$case = $_GET['case'];

$overskrift = $_POST['overskrift'];

$bilde = $_FILES['bildeup']['name'];
$bildedir = "../img/";
$path = time().$bilde;


if(move_uploaded_file($_FILES['bildeup']['tmp_name'], $bildedir.$path)){
    $dbBilde = "./img/".$path;
  }
  else{ //Tilfeldig farge
    $random_bilde_dir = "../color_imgs/";
    $images = glob($random_bilde_dir . '*.{jpg}', GLOB_BRACE);
    $randomImg = $images[array_rand($images)];
    $dbBilde = "./color_imgs/".$randomImg;
  }
  $sql = $conn->prepare("INSERT INTO nodes (overskrift, bilde, cases_idcases)
                        VALUES (?,?,?)");
  $sql->bind_param('ssi', $overskrift, $dbBilde, $case);
  $sql->execute();
  header("Location: ../case.php?case=".$case);
}
?>
