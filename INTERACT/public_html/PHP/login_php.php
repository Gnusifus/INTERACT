<?php
//Sjekker logginn validering, logger inn bruker hvis riktig
$_SESSION['loggetinn'] = false;
if(isset($_POST['logginn'])){
  include 'dbconnect.php';

  echo "hei";

  $_SESSION['email'] = $_POST['email'];
  $_SESSION['password'] = $_POST['password'];

  //Sikrer sql-injection
  $email = stripslashes($_SESSION['email']);
  $password = stripslashes($_SESSION['password']);

  $sql = "SELECT * FROM admin WHERE epost='$email'";
  $result = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($result);
  if($result){
    //Hvis brukeren finnes
    if($count == 1){
      $sqlpw = "SELECT passord FROM admin WHERE epost='$email'";
      $resultpw = mysqli_query($conn, $sqlpw);

      //Hvis passord stemmer med db
      if($resultpw == $password){
        $_SESSION['loggetinn'] = true;
        header('Location: ./all_cases.php');
      }
      else{
        echo "
        <script>
          $('#feilpw').show('200');
        </script>
        ";
        $_SESSION['loggetinn'] = false;
        $conn->close();
      }
    }
    else{ //hvis brukeren ikke finnes
      echo "
      <script>
        $('#feilbruker').show('200');
      </script>
      ";
      $conn->close();
    }
  }
  else{
    echo "
    <script>
      $('#feilconn').show('200');
    </script>
    ";
    $conn->close();
  }
}

if(isset($_POST['loggut'])){
  $_SESSION['loggetinn'] = false;
  header("Location: ../login.php");
}

if(isset($_POST['videre'])){
  header("Location: ../all_cases.php");
}

?>
