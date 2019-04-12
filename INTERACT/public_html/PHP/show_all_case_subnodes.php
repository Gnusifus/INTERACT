<?php
//Henter alle casenoder fra db og viser dem til siden case_mer.php
include 'dbconnect.php';

$node = $_GET['node'];

$sql="SELECT * FROM sub_nodes WHERE nodes_idnodes = '$node'";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)) {
  $sub_node_id = $row['idsub_nodes'];

  echo "
  <div class='col-lg-3 col-md-4 col-sm-6 portfolio-item'>
    <div class='card' data-toggle='modal' data-target='.bd-example-modal-lg'>";

    $bildesql = "SELECT * FROM bilde
                WHERE sub_nodes_idsub_nodes = '$sub_node_id'";
    $bilderes = mysqli_query($conn, $bildesql);
    $bildecount = mysqli_num_rows($bilderes);
    if($bildecount > 0 ){
        $bilderow = mysqli_fetch_array($bilderes);
        echo "<img class='card-img-top' src='./img/" . $bilderow['bilde'] . "'>";
    }

    if($_SESSION['loggetinn'] == true){
      echo "
      <div class='sub_node_delete edit_icons'>
        <i class='edit fas fa-trash-alt' id='" . $row['idsub_nodes'] . "'></i>
      </div>";
    }

    echo "
      <div class='card-body'>
        <h4 class='card-title'>" .$row['overskrift'] . "</h4>
      </div>";

      $tekstsql = "SELECT * FROM tekst
                  WHERE sub_nodes_idsub_nodes = '$sub_node_id'";
      $tekstres = mysqli_query($conn, $tekstsql);
      $tekstcount = mysqli_num_rows($tekstres);
      if($tekstcount > 0 ){
          $tekstrow = mysqli_fetch_array($tekstres);
          echo "<p class='card-text'>" . $tekstrow['tekst'] . "</p>";
      }
      echo "
      <div class='card-footer'>
        <div class='footer-icons'>";
        //Tekst
        if($tekstcount > 0 ){
          echo "<i class='fas fa-font'></i>";
        }
        //Bilde
        if($bildecount > 0 ){
          echo "<i class='fas fa-camera'></i>";
        }
        //Video
        $videosql = "SELECT * FROM video
                    WHERE sub_nodes_idsub_nodes = '$sub_node_id'";
        $videores = mysqli_query($conn, $videosql);
        $videocount = mysqli_num_rows($videores);
        if($videocount > 0 ){
          echo "<i class='fas fa-video'></i>";
        }
        //Lydfil
        $lydsql = "SELECT * FROM lyd
                    WHERE sub_nodes_idsub_nodes = '$sub_node_id'";
        $lydres = mysqli_query($conn, $lydsql);
        $lydcount = mysqli_num_rows($lydres);
        if($lydcount > 0 ){
          echo "<i class='fas fa-headphones'></i>";
        }
        //dokument
        $docsql = "SELECT * FROM dokument
                    WHERE sub_nodes_idsub_nodes = '$sub_node_id'";
        $docres = mysqli_query($conn, $docsql);
        $doccount = mysqli_num_rows($docres);
        if($doccount > 0 ){
          echo "<i class='far fa-file'></i>";
        }
        //link
        $linksql = "SELECT * FROM link
                    WHERE sub_nodes_idsub_nodes = '$sub_node_id'";
        $linkres = mysqli_query($conn, $linksql);
        $linkcount = mysqli_num_rows($linkres);
        if($linkcount > 0 ){
          echo "<i class='fas fa-link'></i>";
        }
        //oppgaver
        $oppgsql = "SELECT * FROM sporsmaal
                    WHERE sub_nodes_idsub_nodes = '$sub_node_id'";
        $oppgres = mysqli_query($conn, $oppgsql);
        $oppgcount = mysqli_num_rows($oppgres);
        if($oppgcount > 0 ){
          echo "<i class='fas fa-tasks'></i>";
        }

          echo "
        </div>
      </div>
    </div>
  </div>
    ";
  }
?>
