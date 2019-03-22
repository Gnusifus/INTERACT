<?php
//Henter riktig main-node, og viser den
include 'dbconnect.php';

$case = $_GET['case'];

$sql="SELECT * FROM cases WHERE idcases = '$case'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
if(mysqli_num_rows($result) == 1){
  echo "
  <div class='main'>
    <div class='card' data-toggle='modal' data-target='.bd-example-modal-lg'>
      <div class='edit_icons'>
        <i class='edit fas fa-pencil-alt'></i>
      </div>
      <div class='new_picture' data-toggle='modal' data-target='#exampleModalCenter'>
        <span>Endre bildet</span>
      </div>
    <img class='card-img-top' src='./img/" . $row['bilde'] . "'>
      <div class='card-body'>
        <h4 class='card-title'>" . $row['tittel'] . "</h4>
        <p class='card-text'>" . $row['tekst'] . "</p>
      </div>
    </div>
  </div>
  ";
}
else{
  //For mange eller ingen main node?!?!
}
?>
