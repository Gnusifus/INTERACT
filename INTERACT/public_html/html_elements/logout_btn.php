<?php
include "./PHP/login_php.php";
//Viser ikke logg-ut knapp hvis siden vises i student-modus.
if($_SESSION['loggetinn'] === true){
  echo "<form method='post' action='./PHP/login_php.php'>
          <div class='logdiv'>
            <button name='loggut' class='logout btn btn-info btn-lg'> Logg ut</button>
          </div>
        </form>";
}
?>
