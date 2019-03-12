<?php
//Henter alle caser fra db og viser dem til siden all_cases.php
include 'dbconnect.php';

$sql="SELECT * FROM cases";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)) {
  echo "
  <div class='col-lg-3 col-md-4 col-sm-6 portfolio-item'>
    <div class='card h-100'>
        <a href='#'><img class='card-img-top' src=''></a>
      <div class='card-body'>
        <h4 class='card-title'>
          <a href='#'>" .$row['tittel'] . "</a>
        </h4>
          <p class='card-text'>" . $row['tekst'] . "</p>
        </div>
      </div>
    </div>";
  }
?>
