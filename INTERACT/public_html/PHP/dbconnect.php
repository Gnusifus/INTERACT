<?php
//Kolber til db. Inkluderes i alle filer som håndterer db.
$conn = mysqli_connect("localhost","root","","interact");

//Sjekker tilkobling
if (mysqli_connect_errno()) {
    printf("Kunne ikke koble til database:\n %s\n", mysqli_connect_error());
    exit();
}
?>
