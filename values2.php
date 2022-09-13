<?php

session_start();
require('dbconnection.php');
require('design.php');



?>



<!DOCTYPE html>
<html>
<head>

</head>

<body onload="myFunction2();">

<img id="B" src="images/web/Logo-3x.png" alt="Logo">





</body>
</html>

<?php
session_start();


if(!isset($_SESSION["username"])){
  $log= 0;
}else{
  $log=1;
} 

if($log==1){
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); 
  } 
  function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }
  $d2=$_SESSION["email"];
  $sq="SELECT * FROM LoginCredentials WHERE email='$d2'";
  $res = $conn->query($sq);
  $ro = $res->fetch_assoc();
  $namm=generateRandomString();
  $d1=$_SESSION["username"];
  $d2=$_SESSION["email"];
  $d3=$ro["phoneno"];
  if($d3==null){
    $d3=0;
  }
  $d4=$_POST['purpose'];
  $d5=$_POST['addpropertytype'];
  $d6=$namm .$_FILES["fileToUpload"]["name"];
  $d7=$_POST['address'];
  $d8=$_POST['house'];
  $d9=$_POST['location'];
  $d10=$_POST['city'];
  $d11=$_POST['state'];
  $d12=$_POST['zipcode'];
  $d13=$_POST['country'];
  $d14=$_POST['askingprice'];
  if($d14==null){
    $d14=0;
  }
  $d15=$_POST['addbedroom'];
  if($d15==null){
    $d15=0;
  }
  $d16=$_POST['addbathroom'];
  if($d16==null){
    $d16=0;
  }
  $d17=$_POST['builtuparea'];
  if($d17==null){
    $d17=0;
  }
  $d18=$_POST['carpetarea'];
  if($d18==null){
    $d18=0;
  }
  $d19=$_POST['builtupareaunit']; 
  $d20=$_POST['carpetareaunit'];
  $d21=$_POST['transactiontype'];
  $d22=0;
  $d22=$_POST['propertyfloor'];
  if($d22==null){
    $d22=0;
  }
  $d23=$_POST['ownership'];
  $d24=$_POST['totalfloors'];
  if($d24==null){
    $d24=0;
  }
  $d25=$_POST['availability'];
  date_default_timezone_set("America/New_York");
  $d26=date("Y-m-d H:i:s");
  $d27=$_POST['description'];
  $d28=$_POST['lattitude'];
  $d29=$_POST['longitude']; 
  $d30=$_POST['plotlength'];
  if($d30==null){
    $d30=0;
  }
  $d31=$_POST['plotbreadth'];
  if($d31==null){
    $d31=0;
  }
  $d32=$_POST['plotarea'];
  if($d32==null){
    $d32=0;
  }
  $d33=$_POST['plotlengthunit'];
  $d34=$_POST['plotbreadthunit'];
  $d35=$_POST['plotareaunit'];
  $d36=$_POST['opensides'];
  if($d36==null){
    $d36=0;
  }
  $d37=$_POST['boundarywallmade'];




  $sql1 = "INSERT INTO propertydetails (name,email,phoneno,purpose,propertytype,imagename,address,house,location,city,state,zipcode,country,askingprice,bedrooms,bathrooms,builtuparea,carpetarea,builtupareaunit,carpetareaunit,transactiontype,propertyfloor,ownership,totalfloors,availability,addedon,description,lattitude,longitude,plotlength,plotbreadth,plotarea,plotlengthunit,plotbreadthunit,plotareaunit,opensides,boundarywallmade)
  VALUES ('$d1','$d2','$d3','$d4','$d5','$d6','$d7','$d8','$d9','$d10','$d11','$d12','$d13','$d14','$d15','$d16','$d17','$d18','$d19','$d20','$d21','$d22','$d23','$d24','$d25','$d26','$d27','$d28','$d29','$d30','$d31','$d32','$d33','$d34','$d35','$d36','$d37')";


  if ($conn->query($sql1) === TRUE) {
      //echo  "record created successfully";
      
      $target_dir = "images/useruploads/" .$namm;
      
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      
    //echo $target_file;
      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
        // echo "File is not an image.";
          $uploadOk = 0;
        }
      }
      
      // Check if file already exists
      if (file_exists($target_file)) {
        //echo "Sorry, file already exists.";
        $uploadOk = 0;
      }
      
      // Check file size
      if ($_FILES["fileToUpload"]["size"] > 6000000) {
        //echo "Sorry, your file is too large.";
        $uploadOk = 0;
      }
      
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
        //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
      }
      
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        //echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
          //echo "Sorry, there was an error uploading your file.";
        }
      }
      echo '<script>alert(" Your property was successfully added");' ;
      echo 'window.location.href = "properties.php";';
      echo '</script>';
    } else {
      echo '<script>alert("'.$conn->error .'");' ;
      echo 'window.location.href = "addproperties.php";';
      echo '</script>';
    }






}else{
  echo '<script>alert("Please LOGIN or SIGNUP");' ;
  echo 'window.location.href = "addproperties.php";';
  echo '</script>'; 
}




?>


