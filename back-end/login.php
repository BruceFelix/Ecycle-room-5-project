<!-- Paminus Murungi CIT-223-032/2018
purity nyakundi -CIT-227-028/2018
Alois Mutharimi - CIT-227-001/2018
Collins Kipkorir - CIT-227-006/2018
Tom Ngunyi King'ori - CIT-227-029/2018
Brian Nyagwansa Nyagwansa - CIT-227-032/2018
BruceFelix Macharia CIT-223-015/2018 -->



<?php
//create db connection
$user = 'room5';
$host = 'localhost';
$password = 'room5';
$database = 'accounts';

if($connection = mysqli_connect($host,$user,$password,$database)){
    echo "<h3 style='color:green'>Connected successfully</h3>";
}
else{
    echo"<h3 style='color:red'>Could not connect successfully</h3>" .mysqli_error($connection);
}

$username = $_POST['username'];
$pass = $_POST['password'];

//the username entered should match with the password
$selectUser = "SELECT * FROM userTable  WHERE username = '$username' AND password= '$pass'";
$received = mysqli_query($connection,$selectUser);

//checking number of rows received
if(mysqli_num_rows($received)>0){
    //a record has been found
    echo "<h3 style='color:green'>Log in successfull</h3> ";
    echo "<h1> WELCOME </h1>";
    while($row = mysqli_fetch_assoc($received)){
        echo "{$row['username']} ";
    }
}
else{
    //no record found
  echo  "<h3 style='color:red'>Could not log in successfully</h3>" .mysqli_error($connection);
}

?>