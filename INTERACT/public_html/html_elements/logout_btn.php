<?php
//Viser ikke logg-ut knapp hvis siden vises i student-modus.
if($_SESSION['loggetinn'] == true){
  echo "<form method='post' action='./PHP/logout.php'>
          <div class='logdiv'>
            <input type='submit' name='loggut' class='logout btn btn-info btn-lg' value='Logg ut'>
          </div>
        </form>";
}
else{
  echo "<div class='logdiv'>
          <a href='./login.php'><button class='logout btn btn-info btn-lg'> Logg inn</button></a>
        </div>";
}
?>
