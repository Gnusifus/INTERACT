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
    $sql="UPDATE nodes
          SET overskrift = '$overskrift', bilde = '$dbBilde'
          WHERE idnodes = '$node'";
    $result = mysqli_query($conn,$sql);
  }
  elseif(isset($_POST['slett_bilde'])){
    $random_bilde_dir = "../color_imgs/";
    $images = glob($random_bilde_dir . '*.{jpg}', GLOB_BRACE);
    $randomImg = $images[array_rand($images)];
    $dbBilde = "./color_imgs/".$randomImg;

    $sql="UPDATE nodes
          SET overskrift = '$overskrift', bilde = '$dbBilde'
          WHERE idnodes = '$node'";

    $result = mysqli_query($conn, $sql);

  }
  else{
    $sql="UPDATE nodes
          SET overskrift = '$overskrift'
          WHERE idnodes = '$node'";

    $result = mysqli_query($conn,$sql);
  }

  if($result){
    header("Location: ../case.php?case=".$case);
  }
  else {
     echo "Error: " . $sql . "<br>" . $conn->error;
     $conn->close();
  }
}
 ?>
