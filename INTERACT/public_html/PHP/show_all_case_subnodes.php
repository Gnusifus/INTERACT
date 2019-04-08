<?php

//TODO: Gjøre ferdig denne!
//Henter alle casenoder fra db og viser dem til siden case_mer.php
include 'dbconnect.php';

$node = $_GET['node'];

//HELP
$sql="SELECT * FROM sub_nodes WHERE nodes_idnodes = '$node'";
$result = mysqli_query($conn,$sql);

if($result){
  $attr = "SELECT * FROM dokument, link, lyd, tekst, video, videolink, sporsmaal, bilde
            WHERE sub_nodes_idsub_nodes = '$node'";
  $attr_result = mysqli_query($conn, $attr);
  if($attr){
    echo "true";
  }
}

// TODO: FIKSE HENT FRA DB, MED ALLE ELEMENTER!!

//If inneholder overskrift og tekst
while($row = mysqli_fetch_array($result)) {
  echo "
  <div class='col-lg-3 col-md-4 col-sm-6 portfolio-item'>
    <div class='card h-100' data-toggle='modal' data-target='.bd-example-modal-lg'>
      <div class='card-body'>
        <h4 class='card-title'>" .$row['overskrift'] . "</h4>
          <p class='card-text'><br></p>
      </div>
      <div class='card-footer'>
        <div class='footer-icons'>
          <i class='fas fa-font'></i>
          <i class='fas fa-camera'></i>
          <i class='fas fa-video'></i>
          <i class='fas fa-headphones'></i>
          <i class='far fa-file'></i>
          <i class='fas fa-link'></i>
          <i class='fas fa-tasks'></i>
        </div>
      </div>
    </div>
  </div>
    ";
  }
?>
