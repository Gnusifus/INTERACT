<?php
include '../dbconnect.php';
$sub_nodeid = $_POST['id'];

/*
//Sletter bilde fra mappe
$sqlSelectImg="SELECT * FROM bilde WHERE idsub_nodes = '$sub_nodeid'";
$resultSelectImg = mysqli_query($conn,$sqlSelectImg);
if(mysql_num_rows($resultSelectImg) > 0){
  $rowSelect = mysqli_fetch_array($resultSelectImg);
  $img = $_SERVER['DOCUMENT_ROOT'] . "/INTERACT_git/INTERACT/public_html" . substr($rowSelect['bilde'], 1);
  if (file_exists($img)) {
    unlink($img);
  }
}

//Sletter video fra mappe
$sqlSelectVid="SELECT * FROM video WHERE idsub_nodes = '$sub_nodeid'";
$resultSelectVid = mysqli_query($conn,$sqlSelectVid);
if(mysql_num_rows($resultSelectVid) > 0){
  $rowSelect = mysqli_fetch_array($resultSelectVid);
  $vid = $_SERVER['DOCUMENT_ROOT'] . "/INTERACT_git/INTERACT/public_html" . substr($rowSelect['video'], 1);
  if (file_exists($vid)) {
    unlink($vid);
  }
}

//Sletter lydfil fra mappe
$sqlSelectLyd="SELECT * FROM lyd WHERE idsub_nodes = '$sub_nodeid'";
$resultSelectLyd = mysqli_query($conn,$sqlSelectLyd);
if(mysql_num_rows($resultSelectLyd) > 0){
  $rowSelect = mysqli_fetch_array($resultSelectLyd);
  $lyd = $_SERVER['DOCUMENT_ROOT'] . "/INTERACT_git/INTERACT/public_html" . substr($rowSelect['lyd'], 1);
  if (file_exists($lyd)) {
    unlink($lyd);
  }
}

//Sletter dokument fra mappe
$sqlSelectDoc="SELECT * FROM dokument WHERE idsub_nodes = '$sub_nodeid'";
$resultSelectDoc = mysqli_query($conn,$sqlSelectDoc);
if(mysql_num_rows($resultSelectDoc) > 0){
  $rowSelect = mysqli_fetch_array($resultSelectDoc);
  $doc = $_SERVER['DOCUMENT_ROOT'] . "/INTERACT_git/INTERACT/public_html" . substr($rowSelect['dokument'], 1);
  if (file_exists($doc)) {
    unlink($doc);
  }
}*/

$sql="DELETE FROM sub_nodes WHERE idsub_nodes = '$sub_nodeid'";
$result = mysqli_query($conn,$sql);

if(!$result){
  echo "Kunne ikke slette noden";
}
 ?>
