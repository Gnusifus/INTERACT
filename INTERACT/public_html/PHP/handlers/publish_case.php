<?php
//Publiserer / avpubliserer caser
include '../dbconnect.php';

$id = $_POST['id'];

$sql = "UPDATE cases SET publisert = NOT publisert WHERE idcases = '$id'";
$result = mysqli_query($conn, $sql);

if(!$result){
  echo "Kunne ikke publisere / avpublisere casen";
}

?>
