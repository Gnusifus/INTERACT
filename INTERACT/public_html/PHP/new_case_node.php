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

    $sql = "INSERT INTO nodes (overskrift, bilde, cases_idcases)
            VALUES ('$overskrift', '$path', '$case')";

if(move_uploaded_file($_FILES['bildeup']['tmp_name'], $bildedir.$path)){
    if ($conn->query($sql) === TRUE) {
        header("Location: ../case.php?case=".$case);
    }
    else {
         echo "Error: " . $sql . "<br>" . $conn->error;
         $conn->close();
    }
  }
  else{
    //Funker innimellom?
    echo "if(move_uploaded_file(_FILES['bildeup']['tmp_name'], bildedir.path)){ funker ikke";
  }
}
?>
