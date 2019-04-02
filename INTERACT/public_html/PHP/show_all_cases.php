<?php
//Henter alle caser fra db og viser dem til siden all_cases.php
include 'dbconnect.php';

$sql="SELECT * FROM cases";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

if($_SESSION['loggetinn'] == true && $row != 0){
  while($row = mysqli_fetch_array($result)) {
    $dbdate = DateTime::createFromFormat('Y-m-d H:i:s', $row['dato']);
    $nordate = $dbdate->format('d/m/Y');
    $nortime = $dbdate->format('H:i');
    if($row['publisert'] == false){
      echo "
      <div class='col-lg-3 col-md-4 col-sm-6 portfolio-item'>
        <div class='card case_card'>
        <div class='card-header' id='" . $row['idcases'] . "'>
          <div id='ikke_pub' class='text-center text-danger font-weight-bold'>Ikke publisert<br></div>
          <div id='ikke_pub2' class='text-center text-danger'>Klikk her for å publisere</div>
        </div>
        <div class='all_cases_delete'>
          <i class='edit fas fa-trash-alt' id='" . $row['idcases'] . "'></i>
        </div>
        <a href='case.php?case=" . $row['idcases'] . "'>
          <img class='card-img-top' src='./img/" . $row['bilde'] . "'>
            <div class='card-body'>
              <h4 class='card-title'>" .$row['tittel'] . "</h4>
              <p class='card-text'>" . $row['tekst'] . "</p>
            </div>
            <div class='card-footer text-muted'>
              <div class='float-left'>" . $nordate . "</div>
              <div class='float-right'>kl. " . $nortime . "</div>
            </div>
          </div>
        </a>
      </div>";
    }
    else{
      echo "
      <div class='col-lg-3 col-md-4 col-sm-6 portfolio-item'>
        <div class='card'>
        <div class='card-header'>
          <div id='pub' class='text-center text-success font-weight-bold'>Publisert!<br></div>
          <div id='pub2' class='text-center text-success'>Klikk her for å avpublisere</div>
        </div>
        <div class='all_cases_delete'>
          <i class='edit fas fa-trash-alt'></i>
        </div>
        <a href='case.php?case=" . $row['idcases'] . "'>
          <img class='card-img-top' src='./img/" . $row['bilde'] . "'>
          <div class='card-body'>
            <h4 class='card-title'>" .$row['tittel'] . "</h4>
              <p class='card-text'>" . $row['tekst'] . "</p>
            </div>
            <div class='card-footer text-muted'>
              <div class='float-left'>" . $nordate . "</div>
              <div class='float-right'>kl. " . $nortime . "</div>
            </div>
          </div>
          </a>
        </div>
        ";
    }
  }
    echo "
    <div class='col-lg-3 col-md-4 col-sm-6 portfolio-item'>
      <div class='card h-100' data-toggle='modal' data-target='.bd-example-modal-lg'>
          <i class='new_node fas fa-plus'></i>
      </div>
    </div>
    ";
}
elseif($_SESSION['loggetinn'] == true && $row == 0){ //Hvis ingen caser er laget
  echo "
  <div class='col-lg-3 col-md-4 col-sm-6 portfolio-item'>
    <span data-toggle='tooltip' data-placement='right' title='Du har ingen caser enda, klikk her for å begynne!'>
      <div class='card h-100' data-toggle='modal' data-target='.bd-example-modal-lg'>
          <i class='new_node fas fa-plus'></i>
      </div>
    </span>
  </div>
  ";
}
else{ //hvis ikke logget inn, ikke vis pluss
  while($row = mysqli_fetch_array($result)) {
    $dbdate = DateTime::createFromFormat('Y-m-d H:i:s', $row['dato']);
    $nordate = $dbdate->format('d/m/Y');
    $nortime = $dbdate->format('H:i');
    echo "
    <div class='col-lg-3 col-md-4 col-sm-6 portfolio-item'>
    <a href='case.php?case=" . $row['idcases'] . "'>
      <div class='card'>
        <img class='card-img-top' src='./img/" . $row['bilde'] . "'>
        <div class='card-body'>
          <h4 class='card-title'>" .$row['tittel'] . "</h4>
            <p class='card-text'>" . $row['tekst'] . "</p>
          </div>
          <div class='card-footer text-muted'>
            <div class='float-left'>" . $nordate . "</div>
            <div class='float-right'>kl. " . $nortime . "</div>
          </div>
        </div>
        </a>
      </div>
      ";
    }
}
?>
