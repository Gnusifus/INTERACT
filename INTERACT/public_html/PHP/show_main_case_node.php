<?php
//Henter riktig main-node, og viser den
include 'dbconnect.php';

$case = $_GET['case'];

$sql="SELECT * FROM cases WHERE idcases = '$case'";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_array($result);
include "./html_elements/endre_bilde_modal.html";
if ($_SESSION['loggetinn']){
  if(mysqli_num_rows($result) == 1){
    echo "
    <div class='main'>
      <div class='card editable-card' data-toggle='modal' data-target='.bd-example-modal-lg'>
      <img class='card-img-top' src='" . $row['bilde'] . "'>
      <div class='edit_icons'>
        <i class='edit fas fa-pencil-alt'></i>
      </div>
        <div class='card-body'>
          <h4 class='card-title'>" . $row['tittel'] . "</h4>
          <p class='card-text'>" . $row['tekst'] . "</p>
        </div>
      </div>
    </div>
    ";
  }
}
else{
    echo "
    <div class='main'>
      <div class='card' data-toggle='modal' data-target='.bd-example-modal-lg'>
      <img class='card-img-top' src='" . $row['bilde'] . "'>
        <div class='card-body'>
          <h4 class='card-title'>" . $row['tittel'] . "</h4>
          <p class='card-text'>" . $row['tekst'] . "</p>
        </div>
      </div>
    </div>
    ";
  }
?>
