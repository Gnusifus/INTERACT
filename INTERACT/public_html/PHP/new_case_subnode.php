<?php
//Legger til ny case fra modal-form i case_mer.php
session_start();

if(isset($_POST['submit'])){

include './dbconnect.php';


    $sql = "INSERT INTO nodes (overskrift) VALUES ('$overskrift')";
    if ($conn->query($sql) === TRUE) {
      header('Location: ../case_mer.php');
  }
    else {
       echo "Error: " . $sql . "<br>" . $conn->error;
       $conn->close();
    }
}
?>
