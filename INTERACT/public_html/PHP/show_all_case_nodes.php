<?php
//Henter alle casenoder fra db og viser dem til siden case.php
include 'dbconnect.php';

$case = $_GET['case'];

$sql="SELECT * FROM nodes WHERE cases_idcases = '$case'";
$result = mysqli_query($conn,$sql);

//Teller antall noder i casen
$count = mysqli_num_rows($result);
//Legger n(i) som class til hver node MIDLERTIDIG LØSNING
if ($_SESSION['loggetinn']){
  for($i = 1; $i <= $count; $i++){
    echo "<div class='node n" . $i . "'> <div class='card editable-card'>";
      $row = mysqli_fetch_array($result);
      echo "
      <a href='case_mer.php?case=" . $row['cases_idcases'] . "&node=" . $row['idnodes'] . "'>
        <img class='card-img-top nodeimg' src='" . $row['bilde'] . "'>
      <div class='edit_icons' id='" . $row['idnodes'] . "'>
        <i class='edit fas fa-trash-alt node_trash'></i>
        <i class='edit fas fa-pencil-alt'></i>
      </div>
      <div class='new_picture' data-toggle='modal' data-target='#exampleModalCenter'>
        <span>Endre bildet</span>
      </div>
      <div class='card-body'>
        <h4 class='card-title'>" .$row['overskrift'] . "</h4>
      </div>
      </a>";
    echo "</div></div>";
  }
}
else{
  for($i = 1; $i <= $count; $i++){
    echo "<div class='node n" . $i . "'> <div class='card editable-card'>";
      $row = mysqli_fetch_array($result);
      echo "
      <a href='case_mer.php?case=" . $row['cases_idcases'] . "&node=" . $row['idnodes'] . "'>
        <img class='card-img-top nodeimg' src='" . $row['bilde'] . "'>
      <div class='card-body'>
        <h4 class='card-title'>" .$row['overskrift'] . "</h4>
      </div>
      </a>";
    echo "</div></div>";
  }
}
?>
