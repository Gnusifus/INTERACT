<?php
//Henter alle casenoder fra db og viser dem til siden case_mer.php
include 'dbconnect.php';

$node = $_GET['node'];
$sql = $conn->prepare("SELECT * FROM sub_nodes WHERE nodes_idnodes = ?");
$sql->bind_param('i', $node);
$sql->execute();
$result = $sql->get_result();

while($row = $result->fetch_assoc()) {
  $sub_node_id = $row['idsub_nodes'];

  echo "
  <div class='col-lg-3 col-md-4 col-sm-6 portfolio-item'>
    <div class='card editable-card sub_node_card' data-toggle='modal' data-target='.empty_modal' id='" . $sub_node_id . "'>";
    $bildesql = $conn->prepare("SELECT * FROM bilde WHERE sub_nodes_idsub_nodes = ?");
    $bildesql->bind_param('i', $sub_node_id);
    $bildesql->execute();
    $bilderes = $bildesql->get_result();
    $bildecount = mysqli_num_rows($bilderes);

    if($bildecount > 0 ){
      $bilderow = $bilderes->fetch_assoc();
      echo "<img class='card-img-top' src='./img/" . $bilderow['bilde'] . "'>";
    }

    if($_SESSION['loggetinn'] == true){
      echo "
      <div class='edit_icons' id='" . $row['idsub_nodes'] . "'>
        <i class='edit fas fa-trash-alt sub_node_trash'></i>
        <i class='edit fas fa-pencil-alt sub_node_edit'></i>
      </div>";
    }

    echo "
      <div class='card-body'>
        <h4 class='card-title'>" .$row['overskrift'] . "</h4>";

        $tekstsql = $conn->prepare("SELECT * FROM tekst WHERE sub_nodes_idsub_nodes = ?");
        $tekstsql->bind_param('i', $sub_node_id);
        $tekstsql->execute();
        $tekstres = $tekstsql->get_result();
        $tekstcount = mysqli_num_rows($tekstres);

      if($tekstcount > 0 ){
          $tekstrow = $tekstres->fetch_assoc();
          echo "<p class='card-text'>" . $tekstrow['tekst'] . "</p>";
      }
      echo "
      </div>
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
        //Video (velger både videofil, og yt-link)
        $videosql = $conn->prepare("(SELECT * FROM video
                                    WHERE sub_nodes_idsub_nodes = ?)
                                    union
                                    (SELECT * FROM videolink
                                    WHERE sub_nodes_idsub_nodes = ?)");
        $videosql->bind_param('ii', $sub_node_id, $sub_node_id);
        $videosql->execute();
        $videores = $videosql->get_result();
        $videocount = mysqli_num_rows($videores);
        if($videocount > 0){
          echo "<i class='fas fa-video'></i>";
        }
        //Lydfil
        $lydsql = $conn->prepare("SELECT * FROM lyd WHERE sub_nodes_idsub_nodes = ?");
        $lydsql->bind_param('i', $sub_node_id);
        $lydsql->execute();
        $lydres = $lydsql->get_result();
        $lydcount = mysqli_num_rows($lydres);
        if($lydcount > 0 ){
          echo "<i class='fas fa-headphones'></i>";
        }
        //dokument
        $docsql = $conn->prepare("SELECT * FROM dokument WHERE sub_nodes_idsub_nodes = ?");
        $docsql->bind_param('i', $sub_node_id);
        $docsql->execute();
        $docres = $docsql->get_result();
        $doccount = mysqli_num_rows($docres);
        if($doccount > 0 ){
          echo "<i class='far fa-file'></i>";
        }
        //link
        $linksql = $conn->prepare("SELECT * FROM link WHERE sub_nodes_idsub_nodes = ?");
        $linksql->bind_param('i', $sub_node_id);
        $linksql->execute();
        $linkres = $linksql->get_result();
        $linkcount = mysqli_num_rows($linkres);
        if($linkcount > 0 ){
          echo "<i class='fas fa-link'></i>";
        }
        //oppgaver
        $oppgsql = $conn->prepare("SELECT * FROM sporsmaal WHERE sub_nodes_idsub_nodes = ?");
        $oppgsql->bind_param('i', $sub_node_id);
        $oppgsql->execute();
        $oppgres = $oppgsql->get_result();
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
