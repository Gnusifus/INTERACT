<?php
include "./PHP/login_php.php";
//Viser ikke logg-ut knapp hvis siden vises i student-modus.
if($_SESSION['loggetinn'] === true){
  if($_SERVER['REQUEST_URI'] !== './all_cases.php'){
    echo "
      <button class='publiser btn btn-danger btn-lg'> Publiser case </button>
      <a href='login.php' name='loggut' class='logout btn btn-info btn-lg'> Logg ut</a>
    ";
  }
  else{
    echo "<a href='login.php' name='loggut' class='logout btn btn-info btn-lg'> Logg ut</a>";
  }
}
?>
