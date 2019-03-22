<?php
//Henter riktig ledd, og viser den i brodsmulemeny
include 'dbconnect.php';

if(!empty($_GET['case']) && empty($_GET['node']) && empty($_GET['sub_node'])){
  $case = $_GET['case'];

  $sql="SELECT tittel FROM cases c WHERE c.idcases = '$case'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  echo "<h1 class='my-4'><a href='all_cases.html'>INTERACT</a> | <small>" .$row['tittel'] . "</small></h1>";
}
elseif(!empty($_GET['case']) && !empty($_GET['node']) && empty($_GET['sub_node'])){
  $case = $_GET['case'];
  $node = $_GET['node'];

  $sql="SELECT c.tittel, n.overskrift
        FROM cases c
        INNER JOIN nodes n ON n.cases_idcases = c.idcases
        WHERE c.idcases = '$case', n.idnodes = '$node'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  echo "<h1 class='my-4'><a href='all_cases.html'>INTERACT</a> | <small>" .$row['tittel'] . "</small> | <small>" .$row['nodes.overskrift'] . "</small></h1>";
}
elseif(!empty($_GET['case']) && !empty($_GET['node']) && !empty($_GET['sub_node'])){
  $case = $_GET['case'];
  $node = $_GET['node'];
  $sub_node = $_GET['sub_node'];
  
  $sql="SELECT c.tittel, n.overskrift, s.overskrift
        FROM ((cases c
        INNER JOIN nodes n ON n.cases_idcases = c.idcases)
        INNER JOIN sub_nodes s ON s.nodes_idnodes = n.idnodes)
        WHERE c.idcases = '$case', n.idnodes = '$node', s.idsub_nodes = '$sub_node'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  echo "<h1 class='my-4'><a href='all_cases.html'>INTERACT</a> | <small>" .$row['tittel'] . "</small> | <small>" .$row['nodes.overskrift'] . "</small> | <small>" .$row['sub_nodes.overskrift'] . "</small></h1>";
}
else{
  echo "<h1 class='my-4'>INTERACT | <small>Dine caser</small></h1>";
}
?>
