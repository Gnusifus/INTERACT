<?php
include "dbconnect.php";
if(isset($_POST['submit'])){
  $sub_node = $_GET['sub_node'];
  $node = $_GET['node'];
  $case = $_GET['case'];

  $overskrift = $_POST['overskrift'];
  $bilde = $_FILES['bildeup']['name'];
  $tekst = $_POST['tekst'];
  $video = $_FILES['videoup']['name'];
  $ytvideo = $_POST['ytvideo'];
  $lyd = $_FILES['lydup']['name'];
  $lenke = $_POST['lenke'];
  $dokument = $_FILES['dokumentup']['name'];
  $sporsmaal = $_POST['sporsmaal'];

  $sqlSpm = $conn->prepare("SELECT * FROM sporsmaal WHERE sub_nodes_idsub_nodes = ?");
  $sqlSpm->bind_param('i', $sub_node);
  $sqlSpm->execute();
  $sporsmaalres = $sqlSpm->get_result();

  $sqlLyd = $conn->prepare("SELECT * FROM lyd WHERE sub_nodes_idsub_nodes = ?");
  $sqlLyd->bind_param('i', $sub_node);
  $sqlLyd->execute();
  $lydres = $sqlLyd->get_result();

  $sqlVideo = $conn->prepare("SELECT * FROM video WHERE sub_nodes_idsub_nodes = ?");
  $sqlVideo->bind_param('i', $sub_node);
  $sqlVideo->execute();
  $videores = $sqlVideo->get_result();

  $sqlYt = $conn->prepare("SELECT * FROM videolink WHERE sub_nodes_idsub_nodes = ?");
  $sqlYt->bind_param('i', $sub_node);
  $sqlYt->execute();
  $ytres = $sqlYt->get_result();

  $sqlTxt = $conn->prepare("SELECT * FROM tekst WHERE sub_nodes_idsub_nodes = ?");
  $sqlTxt->bind_param('i', $sub_node);
  $sqlTxt->execute();
  $tekstres = $sqlTxt->get_result();

  $sqlLenke = $conn->prepare("SELECT * FROM link WHERE sub_nodes_idsub_nodes = ?");
  $sqlLenke->bind_param('i', $sub_node);
  $sqlLenke->execute();
  $lenkeres = $sqlLenke->get_result();

  $sqlDoc = $conn->prepare("SELECT * FROM dokument WHERE sub_nodes_idsub_nodes = ?");
  $sqlDoc->bind_param('i', $sub_node);
  $sqlDoc->execute();
  $dokumentres = $sqlDoc->get_result();

  $sqlBilde = $conn->prepare("SELECT * FROM bilde WHERE sub_nodes_idsub_nodes = ?");
  $sqlBilde->bind_param('i', $sub_node);
  $sqlBilde->execute();
  $bilderes = $sqlBilde->get_result();

  $sql = $conn->prepare("UPDATE sub_nodes SET overskrift = ? WHERE idsub_nodes = ?");
  $sql->bind_param('si', $overskrift, $sub_node);
  $sql->execute();
  $result = $sql->get_result();

  if(strlen($sporsmaal[0]) > 0){
    $sql = $conn->prepare("SELECT * FROM sporsmaal WHERE sub_nodes_idsub_nodes = ?");
    $sql->bind_param('i', $sub_node);
    $sql->execute();
    $result = $sql->get_result();
//Legge til nye spørsmål?!
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
    if(strlen($tekst) > 0){
      if(mysqli_num_rows($tekstres) == 0){
        $sql = $conn->prepare("INSERT INTO tekst (tekst, sub_nodes_idsub_nodes, sub_nodes_nodes_idnodes, sub_nodes_nodes_cases_idcases)
                              VALUES (?,?,?,?)");
        $sql->bind_param('siii', $tekst, $sub_node, $node, $case);
        $sql->execute();
      }
      else{
        $sql = $conn->prepare("UPDATE tekst SET tekst = ? WHERE sub_nodes_idsub_nodes = ?");
        $sql->bind_param('si', $tekst, $sub_node);
        $sql->execute();
      }
    }
  }

  if(isset($_POST['slett_lenke'])){
    $sql = $conn->prepare("DELETE FROM link WHERE sub_nodes_idsub_nodes = ?");
    $sql->bind_param('i', $sub_node);
    $sql->execute();
  }
  else{
    if(strlen($lenke) > 0){
      $lenkebeskrivelse = $_POST['lenke_beksrivelse'];
      if(mysqli_num_rows($lenkeres) == 0){
        $sql = $conn->prepare("INSERT INTO link (link, sub_nodes_idsub_nodes, sub_nodes_nodes_idnodes, sub_nodes_nodes_cases_idcases, beskrivelse)
                              VALUES (?,?,?,?,?)");
        $sql->bind_param('siiis', $lenke, $sub_node, $node, $case,$lenkebeskrivelse);
      }
      else{
        if(strlen($lenkebeskrivelse) > 0){
          $sql = $conn->prepare("UPDATE link SET link = ?, beskrivelse = ? WHERE sub_nodes_idsub_nodes = ?");
          $sql->bind_param('ssi', $lenke, $lenkebeskrivelse, $sub_node);
        }
        else{
          $sql = $conn->prepare("UPDATE link SET link = ? WHERE sub_nodes_idsub_nodes = ?");
          $sql->bind_param('si', $lenke, $sub_node);
        }
      }
    }
    $sql->execute();
  }

  if(isset($_POST['slett_youtube'])){
    $sql = $conn->prepare("DELETE FROM videolink WHERE sub_nodes_idsub_nodes = ?");
    $sql->bind_param('i', $sub_node);
    $sql->execute();
  }
  else{
    if(strlen($ytvideo) > 0){
      if(mysqli_num_rows($ytres) == 0){
        preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $ytvideo, $treff);
        $funn = $treff[0];
        $sql = $conn->prepare("INSERT INTO videolink (videolink, sub_nodes_idsub_nodes, sub_nodes_nodes_idnodes, sub_nodes_nodes_cases_idcases)
                              VALUES (?,?,?,?)");
        $sql->bind_param('siii', $funn, $sub_node, $node, $case);
      }
      else{
        preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $ytvideo, $treff);
        $funn = $treff[0];
        $sql = $conn->prepare("UPDATE videolink SET videolink = ? WHERE sub_nodes_idsub_nodes = ?");
        $sql->bind_param('si', $funn, $sub_node);
      }
    }
    $sql->execute();
  }

  $bildedir = "../img/";
  $bildepath = time().$bilde;
  if(isset($_POST['slett_bilde'])){
    $sql = $conn->prepare("DELETE FROM bilde WHERE sub_nodes_idsub_nodes = ?");
    $sql->bind_param('i', $sub_node);
    $sql->execute();
  }
  elseif(move_uploaded_file($_FILES['bildeup']['tmp_name'], $bildedir.$bildepath)){
    if(mysqli_num_rows($bilderes) == 0){
      $sql = $conn->prepare("INSERT INTO bilde (bilde, sub_nodes_idsub_nodes, sub_nodes_nodes_idnodes, sub_nodes_nodes_cases_idcases)
                            VALUES (?,?,?,?)");
      $sql->bind_param('siii', $bildepath, $sub_node, $node, $case);
    }
    else{
      $sql = $conn->prepare("UPDATE bilde SET bilde = ? WHERE sub_nodes_idsub_nodes = ?");
      $sql->bind_param('si', $bildepath, $sub_node);
    }
    $sql->execute();
  }

  $docdir = "../doc/";
  if(isset($_POST['slett_dokument'])){
    $sql = $conn->prepare("DELETE FROM dokument WHERE sub_nodes_idsub_nodes = ?");
    $sql->bind_param('i', $sub_node);
    $sql->execute();
  }
  elseif(move_uploaded_file($_FILES['dokumentup']['tmp_name'], $docdir.$dokument)){
    $docbeskrivelse = $_POST['dokument_beksrivelse'];
    if(mysqli_num_rows($dokumentres) == 0){
      $sql = $conn->prepare("INSERT INTO dokument (dokument, sub_nodes_idsub_nodes, sub_nodes_nodes_idnodes, sub_nodes_nodes_cases_idcases, beskrivelse)
                            VALUES (?,?,?,?,?)");
      $sql->bind_param('siiis', $dokument, $sub_node, $node, $case, $docbeskrivelse);
    }
    else{
      if(strlen($docbeskrivelse) > 0){
        $sql = $conn->prepare("UPDATE dokument SET dokument = ?, beskrivelse = ? WHERE sub_nodes_idsub_nodes = ?");
        $sql->bind_param('ssi', $dokument, $docbeskrivelse, $sub_node);
      }
      else{
        $sql = $conn->prepare("UPDATE dokument SET dokument = ? WHERE sub_nodes_idsub_nodes = ?");
        $sql->bind_param('si', $dokument, $sub_node);
      }
    }
    $sql->execute();
  }

  $videodir = "../vid/";
  $videopath = time().$video;
  if(isset($_POST['slett_video'])){
    $sql = $conn->prepare("DELETE FROM video WHERE sub_nodes_idsub_nodes = ?");
    $sql->bind_param('i', $sub_node);
    $sql->execute();
  }
  elseif(move_uploaded_file($_FILES['videoup']['tmp_name'], $videodir.$videopath)){
    if(mysqli_num_rows($videores) == 0){
      $sql = $conn->prepare("INSERT INTO video (video, sub_nodes_idsub_nodes, sub_nodes_nodes_idnodes, sub_nodes_nodes_cases_idcases)
                            VALUES (?,?,?,?)");
      $sql->bind_param('siii', $videopath, $sub_node, $node, $case);
    }
    else{
      $sql = $conn->prepare("UPDATE video SET video = ? WHERE sub_nodes_idsub_nodes = ?");
      $sql->bind_param('si', $videopath, $sub_node);
    }
    $sql->execute();
  }

  $lyddir = "../audio/";
  $lydpath = time().$lyd;
  if(isset($_POST['slett_lyd'])){
    $sql = $conn->prepare("DELETE FROM lyd WHERE sub_nodes_idsub_nodes = ?");
    $sql->bind_param('i', $sub_node);
    $sql->execute();
  }
  elseif(move_uploaded_file($_FILES['lydup']['tmp_name'], $lyddir.$lydpath)){
    if(mysqli_num_rows($lydres) == 0){
      $sql = $conn->prepare("INSERT INTO lyd (lyd, sub_nodes_idsub_nodes, sub_nodes_nodes_idnodes, sub_nodes_nodes_cases_idcases)
                            VALUES (?,?,?,?)");
      $sql->bind_param('siii', $lydpath, $sub_node, $node, $case);
    }
    else{
      $sql = $conn->prepare("UPDATE lyd SET lyd = ? WHERE sub_nodes_idsub_nodes = ?");
      $sql->bind_param('si', $lydpath, $sub_node);
    }
    $sql->execute();
  }
  header("Location: ../case_mer.php?case=" . $case . "&node=" . $node);
}
 ?>
