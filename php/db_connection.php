<?php
$con=mysqli_connect("<ENTER HOST>","<ENTER USERNAME>","<ENTER PASSWOR>","ovscoredatabase");
// Check connection
if (mysqli_connect_errno()){
    die("Failed to connect to MySQL: ".mysqli_connect_error());
}
?>
