<?php
//Henter riktig main-node, og viser den
include './PHP/dbconnect.php';

$case = $_GET['case'];

$sql = $conn->prepare("SELECT * FROM cases WHERE idcases = ?");
$sql->bind_param('i', $case);
$sql->execute();
$result = $sql->get_result();
$row = $result->fetch_assoc();
if(mysqli_num_rows($result) == 1){
  echo "
  <div class='modal fade bd-example-modal-lg' tabindex='-1' role='dialog' aria-labelledby='modal' aria-hidden='true'>
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>";
        if(substr( $row['bilde'], 0, 3) === "./c"){
          echo "
          <div id = 'modalheaderimg' style = 'background-image: url(" . $row['bilde'] . ")' class='modal-header'>
            <h5 class='modal-title' id='exampleModalLongTitle'>" . $row['tittel'] . "</h5>
            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>
          <div class='modal-body'>";
        }
        else{
          echo "
          <div class='modal-header'>
            <h5 class='modal-title' id='exampleModalLongTitle'>" . $row['tittel'] . "</h5>
            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>
          <div class='modal-body'>
          <img class= 'modalimg' src='" . $row['bilde'] . "'>";
        }
        echo "
          <p>" . $row['tekst'] . "</p>
        </div>
        </div>
      </div>
    </div>
  ";
}
?>
