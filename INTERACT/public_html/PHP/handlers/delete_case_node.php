<?php
include '../dbconnect.php';
$nodeid = $_POST['id'];

/*
$sqlSelect="SELECT * FROM nodes WHERE idnodes = '$nodeid'";
$resultSelect = mysqli_query($conn,$sqlSelect);
$rowSelect = mysqli_fetch_array($resultSelect);
$bilde = $_SERVER['DOCUMENT_ROOT'] . "/INTERACT_git/INTERACT/public_html" . substr($rowSelect['bilde'], 1);

if (file_exists($bilde) && substr($rowSelect['bilde'], 0,6) === "./img/") {
  unlink($bilde);
}*/

$sql="DELETE FROM nodes WHERE idnodes = '$nodeid'";
$result = mysqli_query($conn,$sql);

if(!$result){
  echo "Kunne ikke slette noden";
}
 ?>
