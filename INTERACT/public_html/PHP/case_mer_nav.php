<?php
//Henter alle casenoder fra db og viser dem til siden case_mer.php
include 'dbconnect.php';

$case = $_GET['case'];

$sql = $conn->prepare("SELECT * FROM nodes WHERE cases_idcases = ?");
$sql->bind_param('i', $case);
$sql->execute();
$result = $sql->get_result();

echo "<div class='navigation'>";
while($row = $result->fetch_assoc()) {
  echo "<a href='./case_mer.php?case=" . $case . "&node=" . $row['idnodes'] . "'>
        <span data-toggle='tooltip' data-placement='right' title='" . $row['overskrift'] . "'>
            <img class='navimg' src='" . $row['bilde'] . "' alt='" . $row['overskrift'] . "'>
        </span>
        </a>
        ";
  }
echo "</div>";
?>
