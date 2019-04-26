<?php
include '../dbconnect.php';
$sub_nodeid = $_POST['id'];

$sql="DELETE FROM sub_nodes WHERE idsub_nodes = '$sub_nodeid'";
$result = mysqli_query($conn,$sql);

if(!$result){
  echo "Kunne ikke slette noden";
}
 ?>
