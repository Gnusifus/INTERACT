<?php
//Legger til ny case fra modal-form i all_cases.php
session_start();

if(isset($_POST['submit'])){

include './dbconnect.php';

$case = $_GET['case'];

$_SESSION['overskrift'] = $_POST['overskrift'];
$overskrift = $_SESSION['overskrift'];

$bilde = $_FILES['bildeup']['name'];
$bildedir = "../img/";
$path = time().$bilde;

if(move_uploaded_file($_FILES['bildeup']['tmp_name'], $bildedir.$path)){
    $dbBilde = "./img/".$path;
    $sql = "INSERT INTO nodes (overskrift, bilde, cases_idcases)
            VALUES ('$overskrift', '$dbBilde', '$case')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../case.php?case=".$case);
    }
    else {
         echo "Error: " . $sql . "<br>" . $conn->error;
         $conn->close();
    }
  }
  else{ //Tilfeldig farge
    $random_bilde_dir = "../color_imgs/";
    $images = glob($random_bilde_dir . '*.{jpg}', GLOB_BRACE);
    $randomImg = $images[array_rand($images)];
    $dbBilde = "./color_imgs/".$randomImg;

    $sql = "INSERT INTO nodes (overskrift, bilde, cases_idcases)
            VALUES ('$overskrift', '$dbBilde', '$case')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: ../case.php?case=".$case);
  }
    else {
       echo "Error: " . $sql . "<br>" . $conn->error;
       $conn->close();
    }
  }
}
?>
