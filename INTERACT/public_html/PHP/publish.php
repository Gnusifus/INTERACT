<?php
//Publiserer / avpubliserer caser
include 'dbconnect.php';


$id = $_GET['id'];
$sqlstatus="SELECT publisert FROM cases WHERE idcases = '$id'";
$status = mysqli_query($conn,$sqlstatus);

if($status == 0){
  $sql="UPDATE publisert
        SET publisert = TRUE
        WHERE idcases = '$id'";
  mysqli_query($conn,$sql);
}
else{
  $sql="UPDATE publisert
        SET publisert = FALSE
        WHERE idcases = '$id'";
  mysqli_query($conn,$sql);
}

?>
