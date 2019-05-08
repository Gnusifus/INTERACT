<?php
//Publiserer / avpubliserer caser
include '../dbconnect.php';

$id = $_POST['id'];
$sql = $conn->prepare("UPDATE cases SET publisert = NOT publisert WHERE idcases = ?");
$sql->bind_param('i', $id);
$sql->execute();
$result = $sql->get_result();

if(!$result){
  echo "Kunne ikke publisere / avpublisere casen";
}

?>
