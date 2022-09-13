<?php

    session_start();
    require('dbconnection.php');







    //echo '<script>alert("plesase");</script>' ;
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
    $id=$_GET["propertyid"];

    $d2=$_SESSION["email"];
    $s="SELECT * from propertydetails where id='$id'";
    $re = $conn->query($s);
    $r = $re->fetch_assoc();
    if($r["email"]!=$d2){
        echo '<script>alert("You are not authorised to edit this property");' ;
        echo 'window.location.href = "index.php";';
        echo '</script>';
        
    }else{
        $sq="SELECT * FROM LoginCredentials WHERE email='$d2'";
        $res = $conn->query($sq);
        $ro = $res->fetch_assoc();
        $namm=generateRandomString();
        $d1=$_SESSION["username"];
    
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
    /*
        echo $d1 .'<br>';
        echo $d2 .'<br>';
        echo $d3 .'<br>';
        echo $d4 .'<br>';
        echo $d5 .'<br>';
        echo $d6 .'<br>';
        echo $d7 .'<br>';
        echo $d8 .'<br>';
        echo $d9 .'<br>';
        echo $d10 .'<br>';
        echo $d11 .'<br>';
        echo $d12 .'<br>';
        echo $d13 .'<br>';
        echo $d14 .'<br>';
        echo $d15 .'<br>';
        echo $d16 .'<br>';
        echo $d17 .'<br>';
        echo $d18 .'<br>';
        echo $d19 .'<br>';
        echo $d20 .'<br>';
        echo $d21 .'<br>';
        echo $d22 .'<br>';
        echo $d23 .'<br>';
        echo $d24 .'<br>';
        echo $d25 .'<br>';
        echo $d26 .'<br>';
        echo $d27 .'<br>';
        echo $d28 .'<br>';
        echo $d29 .'<br>';
        echo $d30 .'<br>';
        echo $d31 .'<br>';
        echo $d32 .'b<br>';
        echo $d33 .'b<br>';
        echo $d34 .'b<br>';
        echo $d35 .'b<br>';
        echo $d36 .'b<br>';
        echo $d37 .'b<br>';
    */
    
        $sql1 = "UPDATE propertydetails set name='$d1',email='$d2',phoneno='$d3',purpose='$d4',propertytype='$d5',address='$d7',house='$d8',location='$d9',city='$d10',state='$d11',zipcode='$d12',country='$d13',askingprice='$d14',bedrooms='$d15',bathrooms='$d16',builtuparea='$d17',carpetarea='$d18',builtupareaunit='$d19',carpetareaunit='$d20',transactiontype='$d21',propertyfloor='$d22',ownership='$d23',totalfloors='$d24',availability='$d25',addedon='$d26',description='$d27',lattitude='$d28',longitude='$d29',plotlength='$d30',plotbreadth='$d31',plotarea='$d32',plotlengthunit='$d33',plotbreadthunit='$d34',plotareaunit='$d35',opensides='$d36',boundarywallmade='$d37' where id='$id'";
    
    
    
        if ($conn->query($sql1) === TRUE) {
            //echo  "record created successfully";
     /*       
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
            */
            echo '<script>alert(" Your property was successfully updated");' ;
            echo 'window.location.href = "properties.php";';
            echo '</script>';
            } else {
            echo '<script>alert("'.$conn->error .'");' ;
            echo 'window.location.href = "editproperty.php?propertyid='.$id .'";';
            echo '</script>';
            }
           
    }   






    }else{
    echo '<script>alert("Please LOGIN or SIGNUP");' ;
    echo 'window.location.href = "index.php";';
    echo '</script>'; 
    
    }


    
?>
