<?php
require '$connection';

$username = mysqli_escape_string($connection,$_POST["username"]);
$email = mysqli_escape_string($connection,$_POST["email"]);
$dob = mysqli_escape_string($connection,$_POST["dob"]);
$postalCode = mysqli_escape_string($connection,$_POST["code"]);
?>