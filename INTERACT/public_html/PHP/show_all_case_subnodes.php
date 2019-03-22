<?php
//Henter alle casenoder fra db og viser dem til siden case_mer.php
include 'dbconnect.php';

$node = $_GET['node'];

$sql="SELECT * FROM sub_nodes WHERE nodes_idnodes = '$node'";
$result = mysqli_query($conn,$sql);


//If inneholder overskrift og tekst
while($row = mysqli_fetch_array($result)) {
  echo "
  <div class='col-lg-3 col-md-4 col-sm-6 portfolio-item'>
    <div class='card h-100' data-toggle='modal' data-target='.bd-example-modal-lg'>
      <div class='card-body'>
        <h4 class='card-title'>" .$row['overskrift'] . "</h4>
          <p class='card-text'>" .$row['tekst'] . "<br></p>
      </div>
    </div>
  </div>
    ";
  }
?>
