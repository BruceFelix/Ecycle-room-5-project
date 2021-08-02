<?php
// mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
require 'connection.php';

$picturesDir = 'pictures/';

if(isset($_POST['submit']) && !empty($_FILES['image']['name'])){
  $imageFIle = basename($_FILES['image']['name']);

  $targetfilepath = $picturesDir.$imageFIle;
  $fileType = pathinfo($targetfilepath,PATHINFO_EXTENSION);

  $prodname = mysqli_escape_string($connection,$_POST['brand']); 
  $biketype = mysqli_escape_string($connection,$_POST['type']); 
  $bikecondition = mysqli_escape_string($connection,$_POST['condition']); 
  $price = mysqli_escape_string($connection,$_POST['price']); 

  $tempName = $_FILES['image']['tmp_name'];
  $fileSize = $_FILES['image']['size'];
  // $file = $_FILES['image']['type'];

  $file_extension = explode('.',$imageFIle);
  $fileActualExtension = strtolower(end($file_extension));

  $imageFormats = array('jpg','jpeg','png','gif');
  
  if(in_array($fileType,$imageFormats)){
    
      if($fileSize < 1000000){
        $newFileName = uniqid('',true).".".$fileActualExtension;
        $fileDestination = 'pictures/'.$imageFIle;
        move_uploaded_file($tempName,$fileDestination);
        echo "Image uploaded to images folder <br>";
      }
      else{
        echo "File size too large";
      }

    // $image = $_FILES['image']['tmp_name'];
    $insertintodb = "INSERT INTO bikedetails(prodname,biketype,bikecondition,price,picture) 
    VALUES ('$prodname','$biketype','$bikecondition','$price','$imageFIle')";
    $recordquery = mysqli_query($connection, $insertintodb);

    if($recordquery){
      echo "Uploaded to successfuly";
    }
    else{
      echo "Image not updaded".mysqli_error($connection);
    }
  }
  else{
    echo "Only this types of extensions are allowed".mysqli_error($connection );
  }
}
else{
  echo "Picture not selected";
}


?>