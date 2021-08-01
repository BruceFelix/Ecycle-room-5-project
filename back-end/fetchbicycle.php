<?php
mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
require 'connection.php';


$selectproduct = 'SELECT * FROM bikedetails';
$fetchfromdb = $connection->query($selectproduct);
$imageprods = array();
$productnames = array();

$counter = 0;

if($fetchfromdb){
    if($fetchfromdb->num_rows > 0){
        while($row = $fetchfromdb->fetch_assoc()){
            $productimage =$row['picture'];
            $productname =$row['prodname'];
            $imageprods[$counter] = $productimage; 
            $productnames[$counter] = $productnames; 
            $counter+=1;
        }
    }
    else{
        echo "There are no product images";
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    for($i = 0; $i < count($imageprods); $i++){ ?>
        <img src ="pictures\<?php echo implode(', ', $imageprods[$i]); ?>" alt ="No images">
        <label for=""><?php echo $productnames[$i]; ?></label>

    <?php } ?>
</body>
</html>