<?php
//Legger til ny case fra modal-form i all_cases.php
session_start();

if(isset($_POST['submit'])){

include './dbconnect.php';

$_SESSION['overskrift'] = $_POST['overskrift'];
//$_SESSION['bilde'] = $_POST['bilde'];

$overskrift = $_SESSION['overskrift'];
//$bilde = $_SESSION['bilde'];

    $sql = "INSERT INTO nodes (overskrift) VALUES ('$overskrift')";
    if ($conn->query($sql) === TRUE) {
      header('Location: ../case.php');
  }
    else {
       echo "Error: " . $sql . "<br>" . $conn->error;
       $conn->close();
    }
}
?>
