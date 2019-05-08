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

$sql = $conn->prepare("DELETE FROM nodes WHERE idnodes = ?");
$sql->bind_param('i', $nodeid);
$sql->execute();
$result = $sql->get_result();

if(!$result){
  echo "Kunne ikke slette temakortet";
}
 ?>
