<?php
require 'connection.php';

$tableCreator = "CREATE TABLE bikedetails (id int auto_increment, prodname varchar(30), biketype varchar(50), primary key(id), price int, bikecondition varchar(40), pictureName varchar(50))";
// if(mysqli_query($connection,$tableCreator)){
//     echo "<h3 style='color:green'>Table created successfully</h3>";
// }
// else{
//     echo "<h3 style='color:red'>table not created</h3>" .mysqli_error($connection);
// }

$brand = mysqli_escape_string($connection,$_POST['brand']);
$type = mysqli_escape_string($connection,$_POST['type']);
$price = mysqli_escape_string($connection,$_POST['price']);
$condition = mysqli_escape_string($connection,$_POST['condition']);

// adding picture 
// $targetFolder = "pictures/";

// $picname = basename($_FILES['image']['picture']);
// $targetPath = $targetFolder.$picname;
// $fileType = pathinfo($targetPath,PATHINFO_EXTENSION);

// $tempname = $_FILES['image']['tmp_name'];
// $fileSize = $_FILES['image']['size'];
// $fileError = $_FILES['image']['type'];

// $fileExt = explode('.',$picname);
// $fileActualExt = strtolower(end($fileExt));

// // allowed file formats 
// $allowedFormats = array('jpg','jpeg','png','gif','pdf');



// $bicpic = 

$targetDir = "pictures/";


if(isset($_POST["submit"]) && !empty($_FILES["image"]["name"])){
  $fileName = basename($_FILES["image"]["name"]);

  $targetFilePath = $targetDir . $fileName;
  $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);


  $tempname = $_FILES['image']['tmp_name'];
  $fileSize = $_FILES['image']['size'];
  $fileError = $_FILES['image']['type'];



  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  //allow certain file formats
  $allowedFormats = array('jpg','jpeg','png','gif','pdf');
  if(in_array($fileType, $allowedFormats)){
    if($fileError == 0 ){
      if($fileSize < 1000000){
        //upload to folder
        $fileNameNew = uniqid('', true).".".$fileActualExt;
        $fileDestination = 'pictures/'.$fileName;
        move_uploaded_file($tempname, $fileDestination);
        echo "Uploaded to images folder.<br>";
      }else{
        echo "Your file size is too large.<br>";
      }
    }else{
      echo "Error uploading file.<br>";
    }

    $image = $_FILES['image']['tmp_name'];

    //insert image content into db
    // $insert = "INSERT INTO products(productName, description, price, Image_File, Quantity) VALUES('$productName', '$desc', '$price', '$fileName','$quantity')";
    // $result = mysqli_query($connection, $insert);

    // if($result){
    //   echo "File uploaded successfully to server database<br>";
    // }else{
    //   echo "Sorry, please try again.<br>";
    // }
}else{
  echo "Only JPG, JPEG, PNG, GIF, and PDF files are allowed.<br>";
}
}else{
  echo "Please select a product picture to upload.<br>";
}




$addRecord = "INSERT INTO bikedetails(prodname,biketype,price,bikecondition,picture) 
VALUES ('$brand','$type','$price','$condition','$fileName')";
if(mysqli_query($connection,$addRecord)){
    echo "Product added";
}
else{
    echo "Product not added" .mysqli_error($connection);
}

?>