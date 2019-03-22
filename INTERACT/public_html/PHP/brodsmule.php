<?php
//Henter riktig ledd, og viser den i brodsmulemeny
include 'dbconnect.php';

if(!empty($_GET['case']) && empty($_GET['node']) && empty($_GET['sub_node'])){
  $case = $_GET['case'];

  $sql="SELECT tittel FROM cases c WHERE c.idcases = '$case'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  echo "<h1 class='my-4'><a href='./all_cases.php'>INTERACT</a> |
        <a href='./case.php?case=" . $case . "'><small>" .$row['tittel'] . "</small></a></h1>";
}
elseif(!empty($_GET['case']) && !empty($_GET['node']) && empty($_GET['sub_node'])){
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
        <a href='./case.php?case=" . $case . "&node=" . $node . "'><small id='nodeoverskrift'>" .$row['overskrift'] . "</small></a></h1>";
} /* UNØDVENDIG?
elseif(!empty($_GET['case']) && !empty($_GET['node']) && !empty($_GET['sub_node'])){
  $case = $_GET['case'];
  $node = $_GET['node'];
  $sub_node = $_GET['sub_node'];

  $sql="SELECT c.tittel, n.overskrift n_overskrift, s.overskrift s_overskrift
        FROM ((cases c
        INNER JOIN nodes n ON n.cases_idcases = c.idcases)
        INNER JOIN sub_nodes s ON s.nodes_idnodes = n.idnodes)
        WHERE c.idcases = '$case' AND n.idnodes = '$node' AND s.idsub_nodes = '$sub_node'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  echo "<h1 class='my-4'><a href='all_cases.php'>INTERACT</a> | <small>" .$row['tittel'] . "</small> | <small>" .$row['n_overskrift'] . "</small> | <small>" .$row['s_overskrift'] . "</small></h1>";
} */
else{
  echo "<h1 class='my-4'>INTERACT | <small>Dine caser</small></h1>";
}
?>
