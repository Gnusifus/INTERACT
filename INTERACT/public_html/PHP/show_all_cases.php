<?php
//Henter alle caser fra db og viser dem til siden all_cases.php
include 'dbconnect.php';

$sql="SELECT * FROM cases";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

if($_SESSION['loggetinn'] == true && $row != 0){
  while($row = mysqli_fetch_array($result)) {
    echo "
    <div class='col-lg-3 col-md-4 col-sm-6 portfolio-item'>
      <div class='card h-100'>
          <a href='#'><img class='card-img-top' src='./img/" . $row['bilde'] . "'></a>
        <div class='card-body'>
          <h4 class='card-title'>
            <a href='#'>" .$row['tittel'] . "</a>
          </h4>
            <p class='card-text'>" . $row['tekst'] . "</p>
          </div>
        </div>
      </div>";
    }
    echo "
    <div class='col-lg-3 col-md-4 col-sm-6 portfolio-item'>
      <div class='card h-100' data-toggle='modal' data-target='.bd-example-modal-lg'>
          <i class='new_node fas fa-plus'></i>
      </div>
    </div>
    ";
}
elseif($_SESSION['loggetinn'] == true && $row == 0){
  echo "
  <div class='col-lg-3 col-md-4 col-sm-6 portfolio-item'>
    <span data-toggle='tooltip' data-placement='top' title='Du har ingen caser enda, klikk her for å begynne!'>
      <div class='card h-100' data-toggle='modal' data-target='.bd-example-modal-lg'>
          <i class='new_node fas fa-plus'></i>
      </div>
    </span>
  </div>
  ";
}
else{ //hvis ikke logget inn, ikke vis pluss
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
}
?>
