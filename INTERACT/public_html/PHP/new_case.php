<?php
//Legger til ny case fra modal-form i all_cases.php
if(isset($_POST['submit'])){
  include './dbconnect.php';

  $tittel = $_POST['tittel'];
  $beskrivelse = $_POST['beskrivelse'];

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

  $sql = $conn->prepare("INSERT INTO cases (tittel, tekst, bilde, publisert, dato)
                        VALUES (?,?,?, FALSE, now())");
  $sql->bind_param('sss', $tittel, $beskrivelse, $dbBilde);
  $sql->execute();
  header("Location: ../all_cases.php");
}
?>
