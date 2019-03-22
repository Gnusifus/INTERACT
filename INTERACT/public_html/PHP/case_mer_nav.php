<?php
//Henter alle casenoder fra db og viser dem til siden case_mer.php
include 'dbconnect.php';

$case = $_GET['case'];

$sql="SELECT * FROM nodes WHERE cases_idcases = '$case'";
$result = mysqli_query($conn,$sql);


echo "<div class='navigation'>";
while($row = mysqli_fetch_array($result)) {
  echo "
    <a><img class='navimg' src='./img/" . $row['bilde'] . "' alt='" . $row['overskrift'] . "'>
    ";
  }
echo "</div>";
?>

<script>
//Endrer brodsmulemeny, setter bildet sin alt (overksriften til noden) i menyen ved hover
$(function () {
    var old = $("#nodeoverskrift").html();
    $(".navimg").hover(function (e) {
        $('#nodeoverskrift').html($(this).attr("alt"));
    }, function (e) {
        $('#nodeoverskrift').html(old);
    });
});
</script>
