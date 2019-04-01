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

  $sql = "INSERT INTO sub_nodes (overskrift, nodes_idnodes, nodes_cases_idcases)
          VALUES ('$overskrift', '$node', '$case')";

  $result = mysqli_query($conn,$sql);
  $sub_node = $conn->insert_id;

  if ($result == true && $conn->affected_rows == 1) {
    if(isset($tekst)){
      $tekstsql = "INSERT INTO tekst (tekst, sub_nodes_idsub_nodes, sub_nodes_nodes_idnodes, sub_nodes_nodes_cases_idcases)
                    VALUES ('$tekst', $sub_node, '$node', '$case')";
      mysqli_query($conn, $tekstsql);
    }
    if(isset($bilde)){
      $bildedir = "../img/";
      $bildepath = time().$bilde;
      if(move_uploaded_file($_FILES['bildeup']['tmp_name'], $bildedir.$bildepath)){
        $bildesql = "INSERT INTO bilde (bilde, sub_nodes_idsub_nodes, sub_nodes_nodes_idnodes, sub_nodes_nodes_cases_idcases)
                      VALUES ('$bildepath', $sub_node, '$node', '$case')";
        mysqli_query($conn, $bildesql);
      }
    }
    if(isset($video)){
      $videodir = "../vid/";
      $videopath = time().$video;
      if(move_uploaded_file($_FILES['videoup']['tmp_name'], $videodir.$videopath)){
        $videosql = "INSERT INTO video (video, sub_nodes_idsub_nodes, sub_nodes_nodes_idnodes, sub_nodes_nodes_cases_idcases)
                      VALUES ('$videopath', $sub_node, '$node', '$case')";
        mysqli_query($conn, $videosql);
      }
    }
    if(isset($ytvideo)){
      $ytvideosql = "INSERT INTO link (link, sub_nodes_idsub_nodes, sub_nodes_nodes_idnodes, sub_nodes_nodes_cases_idcases)
                    VALUES ('$ytvideo', $sub_node, '$node', '$case')";
      mysqli_query($conn, $ytvideosql);
    }
    if(isset($lenke)){
      $lenkesql = "INSERT INTO link (link, sub_nodes_idsub_nodes, sub_nodes_nodes_idnodes, sub_nodes_nodes_cases_idcases)
                    VALUES ('$lenke', $sub_node, '$node', '$case')";
      mysqli_query($conn, $lenkesql);
    }
    if(isset($lyd)){
      $lyddir = "../audio/";
      $lydpath = time().$lyd;
      if(move_uploaded_file($_FILES['lydup']['tmp_name'], $lyddir.$lydpath)){
        $lydsql = "INSERT INTO lyd (lyd, sub_nodes_idsub_nodes, sub_nodes_nodes_idnodes, sub_nodes_nodes_cases_idcases)
                      VALUES ('$lydpath', $sub_node, '$node', '$case')";
        mysqli_query($conn, $lydsql);
      }
    }
    if(isset($dokument)){
      $docdir = "../doc/";
      $docpath = time().$dokument;
      if(move_uploaded_file($_FILES['dokumentup']['tmp_name'], $docdir.$docpath)){
        $docsql = "INSERT INTO dokument (dokument, sub_nodes_idsub_nodes, sub_nodes_nodes_idnodes, sub_nodes_nodes_cases_idcases)
                      VALUES ('$docpath', $sub_node, '$node', '$case')";
        mysqli_query($conn, $docsql);
      }
    }
    header("Location: ../case_mer.php?case=" . $case . "&node=" . $node);
  }
  else {
       echo "Error: " . $sql . "<br>" . $conn->error;
       $conn->close();
  }
}
?>
