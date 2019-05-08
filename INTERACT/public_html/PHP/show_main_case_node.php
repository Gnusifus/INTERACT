<?php
//Henter riktig main-node, og viser den
include 'dbconnect.php';

$case = $_GET['case'];
$sql = $conn->prepare("SELECT * FROM cases WHERE idcases = ?");
$sql->bind_param('i', $case);
$sql->execute();
$result = $sql->get_result();
$row = $result->fetch_assoc();
include "./html_elements/endre_bilde_modal.php";
if ($_SESSION['loggetinn']){
  if(mysqli_num_rows($result) == 1){
    echo "
    <div class='main'>
      <div class='card editable-card' data-toggle='modal' data-target='.bd-example-modal-lg'>
      <img class='card-img-top' src='" . $row['bilde'] . "'>
      <div class='edit_icons main_node_edit'>
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
