<?php
include "dbconnect.php";
if(isset($_POST['submit'])){
  $sub_node = $_GET['sub_node'];

  $overskrift = $_POST['overskrift'];
  $bilde = $_FILES['bildeup']['name'];
  $tekst = $_POST['tekst'];
  $video = $_FILES['videoup']['name'];
  $ytvideo = $_POST['ytvideo'];
  $lyd = $_FILES['lydup']['name'];
  $lenke = $_POST['lenke'];
  $dokument = $_FILES['dokumentup']['name'];
  $sporsmaal = $_POST['sporsmaal'];

  $sql = $conn->prepare("UPDATE sub_nodes SET overskrift = ? WHERE idsub_nodes = ?");
  $sql->bind_param('si', $overskrift, $sub_node);
  $sql->execute();
  $result = $sql->get_result();

  if(strlen($sporsmaal[0]) > 0){
    $sql = $conn->prepare("SELECT * FROM sporsmaal WHERE sub_nodes_idsub_nodes = ?");
    $sql->bind_param('i', $sub_node);
    $sql->execute();
    $result = $sql->get_result();

    if($result){
      foreach ($sporsmaal as $key){
        if($key == null){
          $row = $result->fetch_assoc();
          $id = $row['idsporsmaal'];

          $sqlSpm = $conn->prepare("DELETE FROM sporsmaal WHERE idsporsmaal = ?");
          $sqlSpm->bind_param('i', $id);
          $sqlSpm->execute();
        }
        else{
          $row = $result->fetch_assoc();
          $id = $row['idsporsmaal'];

          $sqlSpm = $conn->prepare("UPDATE sporsmaal SET sporsmaal = ? WHERE idsporsmaal = ?");
          $sqlSpm->bind_param('si', $key, $id);
          $sqlSpm->execute();
        }
      }
    }
  }

  if(isset($_POST['slett_tekst'])){
    $sql = $conn->prepare("DELETE FROM tekst WHERE sub_nodes_idsub_nodes = ?");
    $sql->bind_param('i', $sub_node);
    $sql->execute();
  }
  else{
    $sql = $conn->prepare("UPDATE tekst SET tekst = ? WHERE sub_nodes_idsub_nodes = ?");
    $sql->bind_param('si', $tekst, $sub_node);
    $sql->execute();
  }

  if(isset($_POST['slett_lenke'])){
    $sql = $conn->prepare("DELETE FROM link WHERE sub_nodes_idsub_nodes = ?");
    $sql->bind_param('i', $sub_node);
    $sql->execute();
  }
  else{
    $lenkebeskrivelse = $_POST['lenke_beksrivelse'];
    if(strlen($lenkebeskrivelse) > 0){
      $sql = $conn->prepare("UPDATE link SET link = ?, beskrivelse = ? WHERE sub_nodes_idsub_nodes = ?");
      $sql->bind_param('ssi', $lenke, $lenkebeskrivelse, $sub_node);
    }
    else{
      $sql = $conn->prepare("UPDATE link SET link = ? WHERE sub_nodes_idsub_nodes = ?");
      $sql->bind_param('si', $lenke, $sub_node);
    }
    $sql->execute();
  }

  if(isset($_POST['slett_youtube'])){
    $sql = $conn->prepare("DELETE FROM videolink WHERE sub_nodes_idsub_nodes = ?");
    $sql->bind_param('i', $sub_node);
    $sql->execute();
  }
  else{
    preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $ytvideo, $treff);
    $funn = $treff[0];
    $sql = $conn->prepare("UPDATE videolink SET videolink = ? WHERE sub_nodes_idsub_nodes = ?");
    $sql->bind_param('si', $funn, $sub_node);
    $sql->execute();
  }

  $bildedir = "./img/";
  $bildepath = time().$bilde;
  if(move_uploaded_file($_FILES['bildeup']['tmp_name'], $bildedir.$bildepath)){
    $dbBilde = "./img/".$path;
    $sql = $conn->prepare("UPDATE bilde SET bilde = ? WHERE sub_nodes_idsub_nodes = ?");
    $sql->bind_param('si', $dbBilde, $sub_node);
    $sql->execute();
  }
  elseif(isset($_POST['slett_bilde'])){
    $sql = $conn->prepare("DELETE FROM bilde WHERE sub_nodes_idsub_nodes = ?");
    $sql->bind_param('i', $sub_node);
    $sql->execute();
  }

  $docdir = "./doc/";
  if(move_uploaded_file($_FILES['dokumentup']['tmp_name'], $docdir.$dokument)){
    $docbeskrivelse = $_POST['dokument_beksrivelse'];
    if(strlen($docbeskrivelse) > 0){
      $sql = $conn->prepare("UPDATE dokument SET dokument = ?, beskrivelse = ? WHERE sub_nodes_idsub_nodes = ?");
      $sql->bind_param('ssi', $dokument, $docbeskrivelse, $sub_node);
    }
    else{
      $sql = $conn->prepare("UPDATE dokument SET dokument = ? WHERE sub_nodes_idsub_nodes = ?");
      $sql->bind_param('si', $dokument, $sub_node);
    }
    $sql->execute();
  }
  elseif(isset($_POST['slett_dokument'])){
    $sql = $conn->prepare("DELETE FROM dokument WHERE sub_nodes_idsub_nodes = ?");
    $sql->bind_param('i', $sub_node);
    $sql->execute();
  }

  $videodir = "./vid/";
  $videopath = time().$video;
  if(move_uploaded_file($_FILES['videoup']['tmp_name'], $videodir.$videopath)){
    $sql = $conn->prepare("UPDATE video SET video = ? WHERE sub_nodes_idsub_nodes = ?");
    $sql->bind_param('si', $videopath, $sub_node);
    $sql->execute();
  }
  elseif(isset($_POST['slett_video'])){
    $sql = $conn->prepare("DELETE FROM video WHERE sub_nodes_idsub_nodes = ?");
    $sql->bind_param('i', $sub_node);
    $sql->execute();
  }

  $lyddir = "./audio/";
  $lydpath = time().$lyd;
  if(move_uploaded_file($_FILES['lydup']['tmp_name'], $lyddir.$lydpath)){
    $sql = $conn->prepare("UPDATE lyd SET lyd = ? WHERE sub_nodes_idsub_nodes = ?");
    $sql->bind_param('si', $lydpath, $sub_node);
    $sql->execute();
  }
  elseif(isset($_POST['slett_lyd'])){
    $sql = $conn->prepare("DELETE FROM lyd WHERE sub_nodes_idsub_nodes = ?");
    $sql->bind_param('i', $sub_node);
    $sql->execute();
  }
  $node = $_GET['node'];
  $case = $_GET['case'];
  header("Location: ../case_mer.php?case=" . $case . "&node=" . $node);
}
 ?>
