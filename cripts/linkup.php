<?php
/* Database connection start */
$servername = "sql204.epizy.com";
$username = "epiz_24490819";
$password = "7DMeTQ22fZsfB";
$dbname = "epiz_24490819_oopz";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>