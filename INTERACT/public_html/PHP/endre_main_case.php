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
    $sql="UPDATE cases
          SET tittel = '$tittel', tekst = '$tekst', bilde = '$dbBilde', dato = now()
          WHERE idcases = '$case'";
    $result = mysqli_query($conn,$sql);
  }
  elseif(isset($_POST['slett_bilde'])){
    $random_bilde_dir = "../color_imgs/";
    $images = glob($random_bilde_dir . '*.{jpg}', GLOB_BRACE);
    $randomImg = $images[array_rand($images)];
    $dbBilde = "./color_imgs/".$randomImg;

    $sql="UPDATE cases
          SET tittel = '$tittel', tekst = '$tekst', bilde = '$dbBilde', dato = now()
          WHERE idcases = '$case'";

    $result = mysqli_query($conn, $sql);

  }
  else{
    $sql="UPDATE cases
          SET tittel = '$tittel', tekst = '$tekst', dato = now()
          WHERE idcases = '$case'";
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
