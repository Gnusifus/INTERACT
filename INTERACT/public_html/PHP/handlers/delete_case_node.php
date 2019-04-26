<?php
include '../dbconnect.php';
$nodeid = $_POST['id'];

$sql="DELETE FROM nodes WHERE idnodes = '$nodeid'";
$result = mysqli_query($conn,$sql);

if(!$result){
  echo "Kunne ikke slette noden";
}
 ?>
