<?php
include "dbconnect.php";
if(isset($_POST['submit'])){
  $sub_node = $_GET['sub_node'];
  $case = $_GET['case'];
  $node = $_GET['node'];

  $overskrift = $_POST['overskrift'];
  $bilde = $_FILES['bildeup']['name'];
  $tekst = $_POST['tekst'];
  $video = $_FILES['videoup']['name'];
  $ytvideo = $_POST['ytvideo'];
  $lyd = $_FILES['lydup']['name'];
  $lenke = $_POST['lenke'];
  $dokument = $_FILES['dokumentup']['name'];
  $sporsmaal = $_POST['sporsmaal'];

  //TODO: spørsmål!!!

  $sql = "UPDATE sub_nodes
          SET overskrift = '$overskrift'
          WHERE idsub_nodes = '$sub_node'";
  $result = mysqli_query($conn, $sql);

  if(isset($_POST['slett_tekst'])){
    $sql="DELETE FROM tekst
          WHERE sub_nodes_idsub_nodes = '$sub_node'";

    $result = mysqli_query($conn, $sql);
  }
  else{
    $sql="UPDATE tekst
          SET tekst = '$tekst'
          WHERE sub_nodes_idsub_nodes = '$sub_node'";

    $result = mysqli_query($conn, $sql);
  }

  if(isset($_POST['slett_lenke'])){
    $sql="DELETE FROM link
          WHERE sub_nodes_idsub_nodes = '$sub_node'";

    $result = mysqli_query($conn, $sql);
  }
  else{
    $lenkebeskrivelse = $_POST['lenke_beksrivelse'];
    if(strlen($lenkebeskrivelse) > 0){
      $sql="UPDATE link
            SET link = '$lenke', beskrivelse = '$lenkebeskrivelse'
            WHERE sub_nodes_idsub_nodes = '$sub_node'";
    }
    else{
      $sql="UPDATE link
            SET link = '$lenke'
            WHERE sub_nodes_idsub_nodes = '$sub_node'";
    }

    $result = mysqli_query($conn, $sql);
  }

  if(isset($_POST['slett_youtube'])){
    $sql="DELETE FROM videolink
          WHERE sub_nodes_idsub_nodes = '$sub_node'";

    $result = mysqli_query($conn, $sql);
  }
  else{
    preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $ytvideo, $treff);
    $funn = $treff[0];
    $sql="UPDATE videolink
          SET videolink = '$funn'
          WHERE sub_nodes_idsub_nodes = '$sub_node'";

    $result = mysqli_query($conn, $sql);
  }

  $bildedir = "./img/";
  $bildepath = time().$bilde;
  if(move_uploaded_file($_FILES['bildeup']['tmp_name'], $bildedir.$bildepath)){
    $dbBilde = "./img/".$path;
    $sql="UPDATE bilde
          SET bilde = '$dbBilde'
          WHERE sub_nodes_idsub_nodes = '$sub_node'";
    $result = mysqli_query($conn,$sql);
  }
  elseif(isset($_POST['slett_bilde'])){
    $sql="DELETE FROM bilde
          WHERE sub_nodes_idsub_nodes = '$sub_node'";

    $result = mysqli_query($conn, $sql);
  }

  $docdir = "./doc/";
  if(move_uploaded_file($_FILES['dokumentup']['tmp_name'], $docdir.$dokument)){
    $docbeskrivelse = $_POST['dokument_beksrivelse'];
    if(strlen($docbeskrivelse) > 0){
      $sql="UPDATE dokument
            SET dokument = '$dokument', beskrivelse = '$docbeskrivelse'
            WHERE sub_nodes_idsub_nodes = '$sub_node'";
    }
    else{
      $sql="UPDATE dokument
            SET dokument = '$dokument'
            WHERE sub_nodes_idsub_nodes = '$sub_node'";
    }
    $result = mysqli_query($conn,$sql);
  }
  elseif(isset($_POST['slett_dokument'])){
    $sql="DELETE FROM dokument
          WHERE sub_nodes_idsub_nodes = '$sub_node'";

    $result = mysqli_query($conn, $sql);
  }

  $videodir = "./vid/";
  $videopath = time().$video;
  if(move_uploaded_file($_FILES['videoup']['tmp_name'], $videodir.$videopath)){
    $sql="UPDATE video
          SET video = '$videopath'
          WHERE sub_nodes_idsub_nodes = '$sub_node'";
    $result = mysqli_query($conn,$sql);
  }
  elseif(isset($_POST['slett_video'])){
    $sql="DELETE FROM video
          WHERE sub_nodes_idsub_nodes = '$sub_node'";

    $result = mysqli_query($conn, $sql);
  }

  $lyddir = "./audio/";
  $lydpath = time().$lyd;
  if(move_uploaded_file($_FILES['lydup']['tmp_name'], $lyddir.$lydpath)){
    $sql="UPDATE lyd
          SET lyd = '$lydpath'
          WHERE sub_nodes_idsub_nodes = '$sub_node'";
    $result = mysqli_query($conn,$sql);
  }
  elseif(isset($_POST['slett_lyd'])){
    $sql="DELETE FROM lyd
          WHERE sub_nodes_idsub_nodes = '$sub_node'";

    $result = mysqli_query($conn, $sql);
  }

  if($result){
    header("Location: ../case_mer.php?case=" . $case . "&node=" . $node);
  }
}
 ?>
