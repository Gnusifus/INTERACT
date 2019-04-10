<?php
//Henter alle casenoder fra db og viser dem til siden case_mer.php
include 'dbconnect.php';

$case = $_GET['case'];

$sql="SELECT * FROM nodes WHERE cases_idcases = '$case'";
$result = mysqli_query($conn,$sql);


echo "<div class='navigation'>";
while($row = mysqli_fetch_array($result)) {
  echo "<span data-toggle='tooltip' data-placement='right' title='" . $row['overskrift'] . "'>
          <img class='navimg' src='" . $row['bilde'] . "' alt='" . $row['overskrift'] . "'>
        </span>";
  }
echo "</div>";
?>
