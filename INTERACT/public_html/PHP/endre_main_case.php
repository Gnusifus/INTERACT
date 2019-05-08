<?php
if(isset($_POST['submit_endre'])){
  include 'dbconnect.php';
  $case = $_GET['case'];
  $tittel = $_POST['overskrift'];
  $tekst = $_POST['beskrivelse'];

  $bilde = $_FILES['bildeup']['name'];
  $bildedir = "../img/";
  $path = time().$bilde;

  if(move_uploaded_file($_FILES['bildeup']['tmp_name'], $bildedir.$path)){
    $dbBilde = "./img/".$path;

    $sql = $conn->prepare("UPDATE cases SET tittel = ?, tekst = ?, bilde = ?, dato = now() WHERE idcases = ?");
    $sql->bind_param('sssi', $tittel, $tekst, $dbBilde, $case);
    $sql->execute();
    $result = $sql->get_result();
  }
  elseif(isset($_POST['slett_bilde'])){
    $random_bilde_dir = "../color_imgs/";
    $images = glob($random_bilde_dir . '*.{jpg}', GLOB_BRACE);
    $randomImg = $images[array_rand($images)];
    $dbBilde = "./color_imgs/".$randomImg;

    $sql = $conn->prepare("UPDATE cases SET tittel = ?, tekst = ?, bilde = ?, dato = now() WHERE idcases = ?");
    $sql->bind_param('sssi', $tittel, $tekst, $dbBilde, $case);
    $sql->execute();
    $result = $sql->get_result();
  }
  else{
    $sql = $conn->prepare("UPDATE cases SET tittel = ?, tekst = ?, dato = now() WHERE idcases = ?");
    $sql->bind_param('ssi', $tittel, $tekst, $case);
    $sql->execute();
    $result = $sql->get_result();
  }
  header("Location: ../case.php?case=".$case);
}
 ?>
