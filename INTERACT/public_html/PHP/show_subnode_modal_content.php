<?php
include 'dbconnect.php';

$sub_node_id = $_GET['id'];

$sql="SELECT * FROM sub_nodes WHERE idsub_nodes = '$sub_node_id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

if($result){
  echo "
  <div class='modal-header'>
    <h5 class='modal-title' id='exampleModalLongTitle'>" . $row['overskrift'] . "</h5>
    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>
  <div class='modal-body'>";
  $bildesql = "SELECT * FROM bilde WHERE sub_nodes_idsub_nodes = '$sub_node_id'";
  $bilderesult = mysqli_query($conn,$bildesql);
  if(mysqli_num_rows($bilderesult) > 0){
    $bilderow = mysqli_fetch_array($bilderesult);
    echo "<img class= 'modalimg' src='./img/" . $bilderow['bilde'] . "'>";
  }

  $ytvideosql = "SELECT * FROM videolink WHERE sub_nodes_idsub_nodes = '$sub_node_id'";
  $ytvideoresult = mysqli_query($conn,$ytvideosql);
  if(mysqli_num_rows($ytvideoresult) > 0){
    $ytvideorow = mysqli_fetch_array($ytvideoresult);
    echo "<iframe src='https://www.youtube.com/embed/" . $ytvideorow['videolink'] . "' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
  }

  $videosql = "SELECT * FROM video WHERE sub_nodes_idsub_nodes = '$sub_node_id'";
  $videoresult = mysqli_query($conn,$videosql);
  if(mysqli_num_rows($videoresult) > 0){
    $videorow = mysqli_fetch_array($videoresult);
    $ext = pathinfo($videorow['video'], PATHINFO_EXTENSION);
    echo "
    <video controls>
      <source src='" . $videorow['video'] . "' type='video/" . $ext . "'>
      Nettleseren din kan ikke vise videoen, prøv en annen nettleser.
    </video>";
  }

  $docsql = "SELECT * FROM dokument WHERE sub_nodes_idsub_nodes = '$sub_node_id'";
  $docresult = mysqli_query($conn,$docsql);
  if(mysqli_num_rows($docresult) > 0){
    $docrow = mysqli_fetch_array($docresult);
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



  echo "</div>";

}

?>
