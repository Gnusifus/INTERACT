<?php
include 'dbconnect.php';

$caseid = $_POST['id'];

$sql="DELETE FROM cases WHERE idcases = '$caseid'";
$result = mysqli_query($conn,$sql);

if($result){
  header("Location: ../all_cases.php");
}
else{
  printf("Kunne ikke koble til database:\n %s\n", mysqli_connect_error());
}
 ?>
