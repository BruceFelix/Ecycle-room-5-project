<?php
require 'connection.php';

$username = mysqli_escape_string($connection,$_POST["username"]);
$email = mysqli_escape_string($connection,$_POST["email"]);
$dob = mysqli_escape_string($connection,$_POST["dob"]);
$postalCode = mysqli_escape_string($connection,$_POST["code"]);
$pass = mysqli_escape_string($connection,password_hash($_POST['password'], PASSWORD_BCRYPT));
$insertor = "INSERT INTO userdetails(username,email,dob,code, password) VALUES('$username','$email','$dob','$postalCode','$pass')";

$getRecords = "SELECT email FROM userdetails WHERE email ='$email'";

$receivedEmail = mysqli_query($connection,$getRecords);
if(mysqli_num_rows($receivedEmail)>0)
{   
    $updates = mysqli_query($connection,$insertor);
    echo "Details updated";
}
else{
    if(mysqli_query($connection,$insertor)){

        echo "<h3 style='color:green'>User added successfully</h3>";
        header("location:../../front-end/landing-shop/contact.html");

    }
    else{
        echo "<h3 style='color:red'>User not added</h3>".mysqli_error($connection);
    }
}
?>