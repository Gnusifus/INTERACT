<?php
//Henter alle casenoder fra db og viser dem til siden case.php
include 'dbconnect.php';

$sql="SELECT * FROM nodes";
$result = mysqli_query($conn,$sql);

//Teller antall noder i casen
$count = mysqli_num_rows($result);
//Legger n(i) som class til hver node
for($i = 1; $i <= $count; $i++){
  echo "<div class='node n" . $i . "'> <div class='card'>";
    $row = mysqli_fetch_array($result);
    echo "
    <a href='#'><img class='card-img-top nodeimg' src='#'></a>
    <div class='edit_icons'>
      <i class='edit fas fa-trash-alt'></i>
      <i class='edit fas fa-pencil-alt'></i>
    </div>
    <div class='new_picture' data-toggle='modal' data-target='#exampleModalCenter'>
      <span>Endre bildet</span>
    </div>
    <div class='card-body'>
      <h4 class='card-title'><a href='#'>" .$row['overskrift'] . "</a></h4>
    </div>";
  echo "</div></div>";
}
?>
