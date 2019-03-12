<?php
//Legger til ny case fra modal-form i all_cases.php
session_start();

if(isset($_POST['submit'])){

include './dbconnect.php';

$_SESSION['tittel'] = $_POST['tittel'];
$_SESSION['beskrivelse'] = $_POST['beskrivelse'];
//$_SESSION['bilde'] = $_POST['bilde'];

$tittel = $_SESSION['tittel'];
$beskrivelse = $_SESSION['beskrivelse'];
//$bilde = $_SESSION['bilde'];

    $sql = "INSERT INTO cases (tittel, tekst) VALUES ('$tittel', '$beskrivelse')"; //Perf fnutt
    if ($conn->query($sql) === TRUE) {
      header('Location: ../all_cases.php');
  }
    else {
       echo "Error: " . $sql . "<br>" . $conn->error;
       $conn->close();
    }
}
?>
