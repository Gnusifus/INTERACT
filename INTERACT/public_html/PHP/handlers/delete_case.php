<?php
include '../dbconnect.php';
$caseid = $_POST['id'];

/*
//Sletter bilde fra mappe
$sqlSelect="SELECT * FROM cases WHERE idcases = '$caseid'";
$resultSelect = mysqli_query($conn,$sqlSelect);
$rowSelect = mysqli_fetch_array($resultSelect);
$bilde = $_SERVER['DOCUMENT_ROOT'] . "/INTERACT_git/INTERACT/public_html" . substr($rowSelect['bilde'], 1);

if (file_exists($bilde) && substr($rowSelect['bilde'], 0,6) === "./img/") {
  unlink($bilde);
}*/

$sql="DELETE FROM cases WHERE idcases = '$caseid'";
$result = mysqli_query($conn,$sql);

if(!$result){
  echo "Kunne ikke slette casen";
}
 ?>
