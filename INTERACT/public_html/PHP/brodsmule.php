
<?php
//Henter riktig ledd, og viser den i brodsmulemeny
include 'dbconnect.php';

// INTERACT | Case
if(!empty($_GET['case']) && empty($_GET['node'])){
  $case = $_GET['case'];

  $sql="SELECT tittel FROM cases c WHERE c.idcases = '$case'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  echo "<h1 class='my-4'><a href='./all_cases.php'>INTERACT</a> |
      <a href='./case.php?case=" . $case . "'><small>" .$row['tittel'] . "</small></a></h1>";
}

// INTERACT | Case | Node
elseif(!empty($_GET['case']) && !empty($_GET['node'])){
  $case = $_GET['case'];
  $node = $_GET['node'];

  $sql="SELECT c.tittel, n.overskrift
        FROM cases c
        INNER JOIN nodes n ON n.cases_idcases = c.idcases
        WHERE c.idcases = '$case' AND n.idnodes = '$node'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  echo "<h1 class='my-4'><a href='./all_cases.php'>INTERACT</a> |
        <a href='./case.php?case=" . $case . "'><small>" .$row['tittel'] . "</small></a> |
        <small>" .$row['overskrift'] . "</small></a></h1>";
}

// INTERACT | Dine caser
else{
  if($_SESSION['loggetinn'] == true){
    echo "<h1 class='my-4'>INTERACT | <small>Dine caser</small></h1>";
  }
  else{
    echo "<h1 class='my-4'>INTERACT | <small>Alle caser</small></h1>";
  }
}
?>
