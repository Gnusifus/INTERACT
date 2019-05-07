<?php
include "dbconnect.php";
if(isset($_POST['submit'])){
  $sub_node = $_GET['sub_node'];
  $case = $_GET['case'];
  $node = $_GET['node'];

  $overskrift = $_POST['overskrift'];
  $sql = "UPDATE sub_nodes
          SET overskrift = '$overskrift'
          WHERE idsub_nodes = '$sub_node'";
  $result = mysqli_query($conn, $sql);

  if(move_uploaded_file($_FILES['bildeup']['tmp_name'], $bildedir.$path)){
    $dbBilde = "./img/".$path;
    $sql="UPDATE nodes
          SET overskrift = '$overskrift', bilde = '$dbBilde'
          WHERE idnodes = '$node'";
    $result = mysqli_query($conn,$sql);
  }
  elseif(isset($_POST['slett_bilde'])){
    $sql="UPDATE nodes
          SET overskrift = '$overskrift', bilde = '$dbBilde'
          WHERE idnodes = '$node'";

    $result = mysqli_query($conn, $sql);

  }

  if($result){
    header("Location: ../case_mer.php?case=" . $case . "&node=" . $node);
  }
}
 ?>
