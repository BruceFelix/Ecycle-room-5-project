<!-- Paminus Murungi CIT-223-032/2018
purity nyakundi -CIT-227-028/2018
Alois Mutharimi - CIT-227-001/2018
Collins Kipkorir - CIT-227-006/2018
Tom Ngunyi King'ori - CIT-227-029/2018
Brian Nyagwansa Nyagwansa - CIT-227-032/2018
BruceFelix Macharia CIT-223-015/2018 -->



<?php
//create db connection
session_start();
require 'connection.php';

if(!isset($_SESSION['attempts'])){
    $_SESSION['attempts'] = 0;
}

$username = $_POST['username'];
$pass = $_POST['password'];

//the username entered should match with the password
$selectUser = "SELECT * FROM userdetails  WHERE username='$username' ";
$received = mysqli_query($connection,$selectUser);

//checking number of rows received
if(!$received){
    echo "msqli error" .mysqli_error($connection);
}
else{
    $row =mysqli_num_rows($received);
    $received = mysqli_fetch_assoc($received);
    if($row>0)
    {
        
        if($_SESSION['attempts']<3){
                if(password_verify($pass,$received['password']))
                {

                    $_SESSION['username'] = $username;
                    echo $_SESSION['username'] ."welcome";
                    sleep(5);
                    header("location: ../front-end/shop.html");
                     
                }
                else{
                    echo "<div style = 'color:red'> <strong>Check Your password </strong></div>";
                 
                    $_SESSION['attempts']++;
                    echo $received['username'];

                    echo  $_SESSION['attempts'];
                    // sleep(5);
                    // header("location:../front-end/login.html");

                }
            }
        else{
            echo "<div style = 'color:red'> <strong>You can only make 3 attempts at a login. <br> Please wait 10 mins before trying again. </strong></div>";
            // sleep(5);
            // header("location:../front-end/login.html");

        }
        
        }
    else
         {
             echo"<h1 style= 'color:red; text-transform: uppercase'>Login fail</h1>";
           
             $_SESSION['attempts']++;
            echo  $_SESSION['attempts'];
            }
                    }

        
       
// if(mysqli_num_rows($received)>0){
//     //a record has been found
//     echo "<h3 style='color:green'>Log in successfull</h3> ";
//     echo "<h1> WELCOME </h1>";
//     while($row = mysqli_fetch_assoc($received)){
//         echo "{$row['username']} ";
//     }
// }
// //     header("login.html");
// // }
// else{
//     //no record found
//   echo  "<h3 style='color:red'>Could not log in successfully</h3>".mysqli_error($connection);
// }


//Check to see if our countdown session
//variable has been initialized.
if(!isset($_SESSION['countdown'])){
    //Set the countdown to 120 seconds.
    $_SESSION['countdown'] = 120;
    //Store the timestamp of when the countdown began.
    $_SESSION['time_started'] = time();
}

//Get the current timestamp.
$now = time();

//Calculate how many seconds have passed since
//the countdown began.
$timeSince = $now - $_SESSION['time_started'];

//How many seconds are remaining?
$remainingSeconds = abs($_SESSION['countdown'] - $timeSince);

//Print out the countdown.
echo "There are $remainingSeconds seconds remaining.";

//Check if the countdown has finished.
if($remainingSeconds < 1){
   //Finished! Do something.
   echo "<h1> It is done</h1>";
}


?>