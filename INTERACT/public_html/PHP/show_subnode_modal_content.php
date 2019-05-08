<?php
$sub_node_id = $_POST['id'];
include 'dbconnect.php';

$sql = $conn->prepare("SELECT * FROM sub_nodes WHERE idsub_nodes = ?");
$sql->bind_param('i', $sub_node_id);
$sql->execute();
$result = $sql->get_result();
$row = $result->fetch_assoc();
if($result){
  echo "
  <div class='modal-header'>
    <h5 class='modal-title'>" . $row['overskrift'] . "</h5>
    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>
  <div class='modal-body'>";
  //Bilde
  $bildesql = $conn->prepare("SELECT * FROM bilde WHERE sub_nodes_idsub_nodes = ?");
  $bildesql->bind_param('i', $sub_node_id);
  $bildesql->execute();
  $bilderesult = $bildesql->get_result();
  if(mysqli_num_rows($bilderesult) > 0){
    $bilderow = $bilderesult->fetch_assoc();
    echo "<img class= 'modalimg' src='./img/" . $bilderow['bilde'] . "'>";
  }

  //Dokument
  $docsql = $conn->prepare("SELECT * FROM dokument WHERE sub_nodes_idsub_nodes = ?");
  $docsql->bind_param('i', $sub_node_id);
  $docsql->execute();
  $docresult = $docsql->get_result();
  if(mysqli_num_rows($docresult) > 0){
    $docrow = $docresult->fetch_assoc();
    if($docrow['beskrivelse'] != null){
        $ext = pathinfo($docrow['dokument'], PATHINFO_EXTENSION);
        echo "<div class='documentView'>
                <a href='./doc/" . $docrow['dokument'] . "' target='_blank'>" . $docrow['beskrivelse'] . "." . $ext . "<i class='far fa-file'></i></a>
              </div>";
    }
    else{
      echo "<div class='documentView'>
              <a href='./doc/" . $docrow['dokument'] . "' target='_blank'>" . $docrow['dokument'] . "<i class='far fa-file'></i></a>
            </div>";
    }
  }

  //Lenke
  $linksql = $conn->prepare("SELECT * FROM link WHERE sub_nodes_idsub_nodes = ?");
  $linksql->bind_param('i', $sub_node_id);
  $linksql->execute();
  $linkresult = $linksql->get_result();
  if(mysqli_num_rows($linkresult) > 0){
    $linkrow = $linkresult->fetch_assoc();
    if($linkrow['beskrivelse'] != null){
        echo "<div class='documentView'>
                <a href='" . $linkrow['link'] . "' target='_blank'>" . $linkrow['beskrivelse'] . "<i class='fas fa-link'></i></a>
              </div>";
    }
    else{
      echo "<div class='documentView'>
              <a href='" . $linkrow['link'] . "' target='_blank'>" . $linkrow['link'] . "<i class='fas fa-link'></i></a>
            </div>";
    }
  }

  //Tekst
  $tekstsql = $conn->prepare("SELECT * FROM tekst WHERE sub_nodes_idsub_nodes = ?");
  $tekstsql->bind_param('i', $sub_node_id);
  $tekstsql->execute();
  $tekstresult = $tekstsql->get_result();
  if(mysqli_num_rows($tekstresult) > 0){
    $tekstrow = $tekstresult->fetch_assoc();
    echo "<p class='modal_txt'>" . $tekstrow['tekst'] . "</p>";
  }

  //Lyd
  $lydsql = $conn->prepare("SELECT * FROM lyd WHERE sub_nodes_idsub_nodes = ?");
  $lydsql->bind_param('i', $sub_node_id);
  $lydsql->execute();
  $lydresult = $lydsql->get_result();
  if(mysqli_num_rows($lydresult) > 0){
    $lydrow = $lydresult->fetch_assoc();
    $ext = pathinfo($lydrow['lyd'], PATHINFO_EXTENSION);
    echo "
    <audio controls>
      <source src='./audio/" . $lydrow['lyd'] . "' type='audio/" . $ext . "'>
    Your browser does not support the audio element.
    </audio>";
  }

  //Yt-video
  $ytvideosql = $conn->prepare("SELECT * FROM videolink WHERE sub_nodes_idsub_nodes = ?");
  $ytvideosql->bind_param('i', $sub_node_id);
  $ytvideosql->execute();
  $ytvideoresult = $ytvideosql->get_result();
  if(mysqli_num_rows($ytvideoresult) > 0){
    $ytvideorow = $ytvideoresult->fetch_assoc();
    echo "<iframe src='https://www.youtube.com/embed/" . $ytvideorow['videolink'] . "' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
  }

  //Video
  $videosql = $conn->prepare("SELECT * FROM video WHERE sub_nodes_idsub_nodes = ?");
  $videosql->bind_param('i', $sub_node_id);
  $videosql->execute();
  $videoresult = $videosql->get_result();
  if(mysqli_num_rows($videoresult) > 0){
    $videorow = $videoresult->fetch_assoc();
    $ext = pathinfo($videorow['video'], PATHINFO_EXTENSION);
    echo "
    <video controls>
      <source src='./vid/" . $videorow['video'] . "' type='video/" . $ext . "'>
      Nettleseren din kan ikke vise videoen, prøv en annen nettleser.
    </video>";
  }

  //Spørsmål
  $sporsmaalsql = $conn->prepare("SELECT * FROM sporsmaal WHERE sub_nodes_idsub_nodes = ?");
  $sporsmaalsql->bind_param('i', $sub_node_id);
  $sporsmaalsql->execute();
  $sporsmaalresult = $sporsmaalsql->get_result();
  if(mysqli_num_rows($sporsmaalresult) > 0){
    echo "<hr>";
    echo "<p class='h3'>Oppgaver</p><br>";
    while($sporsmaalrow = $sporsmaalresult->fetch_assoc()){
      echo "<i class='fas fa-question'></i><i>" . $sporsmaalrow['sporsmaal'] . "</i><br>";
    }
  }

  echo "</div>";

}

?>
