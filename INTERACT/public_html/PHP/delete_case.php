<?php
include 'dbconnect.php';

$caseid = $_POST['id'];

$sql="DELETE FROM cases WHERE idcases = '$caseid'";
$result = mysqli_query($conn,$sql);

if(!$result){
  echo "Kunne ikke slette casen";
}
 ?>
