<?php
//Henter riktig main-node, og viser den
include './PHP/dbconnect.php';

$case = $_GET['case'];

$sql="SELECT * FROM cases WHERE idcases = '$case'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
if(mysqli_num_rows($result) == 1){
  echo "
  <div class='modal fade bd-example-modal-lg' tabindex='-1' role='dialog' aria-labelledby='modal' aria-hidden='true'>
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h5 class='modal-title' id='exampleModalLongTitle'>" . $row['tittel'] . "</h5>
          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>
        <div class='modal-body'>
          <img class= 'modalimg' src='./img/" . $row['bilde'] . "'>
          <p>" . $row['tekst'] . "</p>
        </div>
        </div>
      </div>
    </div>
  ";
}
?>