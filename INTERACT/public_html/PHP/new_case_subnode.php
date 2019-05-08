<?php
//Legger til ny sub_node fra modal-form i case_mer.php
if(isset($_POST['submit'])){

  include './dbconnect.php';

  $node = $_GET['node'];
  $case = $_GET['case'];

  $overskrift = $_POST['overskrift'];
  $tekst = $_POST['tekst'];
  $bilde = $_FILES['bildeup']['name'];
  $video = $_FILES['videoup']['name'];
  $ytvideo = $_POST['ytvideo'];
  $lyd = $_FILES['lydup']['name'];
  $lenke = $_POST['lenke'];
  $dokument = $_FILES['dokumentup']['name'];
  $sporsmaal = $_POST['sporsmaal'];

  $sql = $conn->prepare("INSERT INTO sub_nodes (overskrift, nodes_idnodes, nodes_cases_idcases)
                        VALUES (?,?,?)");
  $sql->bind_param('sii', $overskrift, $node, $case);
  $sql->execute();

  $result = $sql->get_result();
  $sub_node = $conn->insert_id;

    if(strlen($tekst) > 0){
      $sql = $conn->prepare("INSERT INTO tekst (tekst, sub_nodes_idsub_nodes, sub_nodes_nodes_idnodes, sub_nodes_nodes_cases_idcases)
                            VALUES (?,?,?,?)");
      $sql->bind_param('siii', $tekst, $sub_node, $node, $case);
      $sql->execute();
    }
    if(isset($bilde)){
      $bildedir = "../img/";
      $bildepath = time().$bilde;
      if(move_uploaded_file($_FILES['bildeup']['tmp_name'], $bildedir.$bildepath)){
        $sql = $conn->prepare("INSERT INTO bilde (bilde, sub_nodes_idsub_nodes, sub_nodes_nodes_idnodes, sub_nodes_nodes_cases_idcases)
                              VALUES (?,?,?,?)");
        $sql->bind_param('siii', $bildepath, $sub_node, $node, $case);
        $sql->execute();
      }
    }
    if(isset($video)){
      $videodir = "../vid/";
      $videopath = time().$video;
      if(move_uploaded_file($_FILES['videoup']['tmp_name'], $videodir.$videopath)){
        $sql = $conn->prepare("INSERT INTO video (video, sub_nodes_idsub_nodes, sub_nodes_nodes_idnodes, sub_nodes_nodes_cases_idcases)
                              VALUES (?,?,?,?)");
        $sql->bind_param('siii', $videopath, $sub_node, $node, $case);
        $sql->execute();
      }
    }
    if(strlen($ytvideo) > 0){
      preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $ytvideo, $treff);
      $funn = $treff[0];
      $sql = $conn->prepare("INSERT INTO videolink (videolink, sub_nodes_idsub_nodes, sub_nodes_nodes_idnodes, sub_nodes_nodes_cases_idcases)
                            VALUES (?,?,?,?)");
      $sql->bind_param('siii', $funn, $sub_node, $node, $case);
      $sql->execute();
    }

    if(strlen($lenke) > 0){
      $lenkebeskrivelse = $_POST['lenke_beksrivelse'];
      $sql = $conn->prepare("INSERT INTO link (link, sub_nodes_idsub_nodes, sub_nodes_nodes_idnodes, sub_nodes_nodes_cases_idcases, beskrivelse)
                            VALUES (?,?,?,?,?)");
      $sql->bind_param('siiis', $lenke, $sub_node, $node, $case,$lenkebeskrivelse);
      $sql->execute();
    }

    if(isset($lyd)){
      $lyddir = "../audio/";
      $lydpath = time().$lyd;
      if(move_uploaded_file($_FILES['lydup']['tmp_name'], $lyddir.$lydpath)){
        $sql = $conn->prepare("INSERT INTO lyd (lyd, sub_nodes_idsub_nodes, sub_nodes_nodes_idnodes, sub_nodes_nodes_cases_idcases)
                              VALUES (?,?,?,?)");
        $sql->bind_param('siii', $lydpath, $sub_node, $node, $case);
        $sql->execute();
      }
    }
    if(isset($dokument)){
      $docdir = "../doc/";
      $docbeskrivelse = $_POST['dokument_beksrivelse'];
      if(move_uploaded_file($_FILES['dokumentup']['tmp_name'], $docdir.$dokument)){
        $sql = $conn->prepare("INSERT INTO dokument (dokument, sub_nodes_idsub_nodes, sub_nodes_nodes_idnodes, sub_nodes_nodes_cases_idcases, beskrivelse)
                              VALUES (?,?,?,?,?)");
        $sql->bind_param('siiis', $dokument, $sub_node, $node, $case, $docbeskrivelse);
        $sql->execute();
      }
    }

    if(strlen($sporsmaal[0]) > 0){
      foreach ($sporsmaal as $key) {
        $sql = $conn->prepare("INSERT INTO sporsmaal (sporsmaal, sub_nodes_idsub_nodes, sub_nodes_nodes_idnodes, sub_nodes_nodes_cases_idcases)
                              VALUES (?,?,?,?)");
        $sql->bind_param('siii', $key, $sub_node, $node, $case);
        $sql->execute();
      }
    }
    header("Location: ../case_mer.php?case=" . $case . "&node=" . $node);
  }
?>
