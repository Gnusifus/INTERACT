<?php
//Sjekker logginn validering, logger inn bruker hvis riktig
if(isset($_POST['logginn'])){
  include 'dbconnect.php';

  $_SESSION['email'] = $_POST['email'];
  $_SESSION['password'] = $_POST['password'];

  //Sikrer sql-injection
  $email = stripslashes($_SESSION['email']);
  $password = stripslashes($_SESSION['password']);

  $sql = "SELECT epost, passord FROM admin WHERE epost = '$email' AND passord = '$password'";
  $result = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($result);

  if($count == 1){
    while ($row = mysqli_fetch_array($result)){
      $check_email = $row['epost'];
      $check_pw = $row['passord'];
    }

    if ($email == $check_email && $password == $check_pw){
      $_SESSION['loggetinn'] = true;
      header("Location: ../all_cases.php");
      exit;
    }
  }
  /*
  else{
    $_SESSION['loggetinn'] = false;
    header("Location: ../login.php");
    echo "
    <script>
    $(function(){
      $('#feilpw').show('200');
    });
    </script>
    ";
<<<<<<< HEAD
    exit();
=======
    header("Location: ../login.php");
    exit;
  }

/*
  $sql = "SELECT * FROM admin WHERE epost='$email'";
  $result = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($result);

  echo $count; //1

  if($result){
    echo "result funker";
    //Hvis brukeren finnes
    if($count == 1){
      $sqlpw = "SELECT passord FROM admin WHERE epost='$email'";
      $resultpw = mysqli_query($conn, $sqlpw);
      $countpw = mysqli_num_rows($resultpw);

      echo "antall med pw:";
      echo $resultpw;

      //Hvis passord stemmer med db
      if($resultpw == $password){
        $_SESSION['loggetinn'] = true;
        header('Location: ./all_cases.php');
      }
      else{

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
>>>>>>> parent of 703c93e... Nå kan man logge inn ;)
  }*/
}
if(isset($_POST['loggut'])){
  $_SESSION['loggetinn'] = false;
  echo $_SESSION['loggetinn'];
  header("Location: ../login.php");
  exit();
}

?>
