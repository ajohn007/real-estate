<?php 
  session_start();
  require('dbconnection.php');
  
  if(!(strlen($_POST["name"])>0)){
    echo '<script>alert("Invalid User");' ;
    echo 'window.location.href = "index.php";';
    echo '</script>'; 
  }else{
    if(!isset($_SESSION["username"])){
      echo '<script>alert("Please LOGIN or SIGNUP");' ;
      echo 'window.location.href = "index.php";';
      echo '</script>'; 
    }else{
      $em=$_SESSION["email"];
      function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
      }
      $imagename=null;
      $namm=generateRandomString();
      $email=$_POST["email"];
      $name=$_POST["name"];
      $phoneno=$_POST["phoneno"];
      $address1=$_POST["address1"];
      $address2=$_POST["address2"];
      $city=$_POST["city"];
      $district=$_POST["district"];
      $newpassword=$_POST["newpassword"];
      if(strlen($_FILES["fileToUpload"]["name"])>0){
        $imagename=$namm .$_FILES["fileToUpload"]["name"];
        $sql2="UPDATE LoginCredentials set profilepic='$imagename' WHERE email='$em'";
        $conn->query($sql2);
      }
      if(strlen($newpassword)>0){
        $sql3="UPDATE LoginCredentials set password='$newpassword' WHERE email='$em'";
        $conn->query($sql3);
      }
       
    
      $sql="UPDATE  LoginCredentials set name='$name', email='$email', phoneno='$phoneno', address1='$address1', address2='$address2', city='$city', district='$district' WHERE email='$em'";
      if($conn->query($sql)== true){
        if(strlen($_FILES["fileToUpload"]["name"])>0){
            $target_dir = "images/userprofilepic/" .$namm;
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
        }
    
       
        $_SESSION["username"]=$name;
        $_SESSION["email"]=$email;
        $_SESSION["phoneno"]=$phoneno;
        echo '<script>alert("Your profile has been successfully updated");' ;
        echo 'window.location.href = "myaccount.php";';
        echo '</script>'; 
      
      }
    } 
  }





?>