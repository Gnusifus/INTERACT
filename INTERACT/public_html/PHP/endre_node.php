<?php
if(isset($_POST['submit_endre'])){
  include 'dbconnect.php';
  $node = $_GET['node'];
  $case = $_GET['case'];
  $overskrift = $_POST['overskrift'];

  $bilde = $_FILES['bildeup']['name'];
  $bildedir = "../img/";
  $path = time().$bilde;

  if(move_uploaded_file($_FILES['bildeup']['tmp_name'], $bildedir.$path)){
    $dbBilde = "./img/".$path;
    $sql = $conn->prepare("UPDATE nodes SET overskrift = ?, bilde = ? WHERE idnodes = ?");
    $sql->bind_param('ssi', $overskrift, $dbBilde, $node);
    $sql->execute();
  }
  elseif(isset($_POST['slett_bilde'])){
    $random_bilde_dir = "../color_imgs/";
    $images = glob($random_bilde_dir . '*.{jpg}', GLOB_BRACE);
    $randomImg = $images[array_rand($images)];
    $dbBilde = "./color_imgs/".$randomImg;

    $sql = $conn->prepare("UPDATE nodes SET overskrift = ?, bilde = ? WHERE idnodes = ?");
    $sql->bind_param('ssi', $overskrift, $dbBilde, $node);
    $sql->execute();
  }
  else{
    $sql = $conn->prepare("UPDATE nodes SET overskrift = ? WHERE idnodes = ?");
    $sql->bind_param('si', $overskrift, $node);
    $sql->execute();
  }
  header("Location: ../case.php?case=".$case);
}
 ?>
