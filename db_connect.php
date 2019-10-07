<?php
/* Database connection start */
$servername = "127.0.0.1:49372";
$username = "azure";
$password = "6#vWHD_$";
$dbname = "moviedb";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>
