<?php 
  require('design.php');
  session_start();
  require('dbconnection.php');
  $email=$_SESSION["email"];
  $sql="SELECT * FROM LoginCredentials WHERE email='$email'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $id=$row["id"];
  $name=$row["name"];
  $email=$row["email"];
  $id=$row["id"];
  $phoneno=$row["phoneno"];
  $address1=$row["address1"];
  $address2=$row["address2"];
  $city=$row["city"];
  $district=$row["district"];
  $p=$row["password"];

  if(!isset($_SESSION["username"])){
    header("location: index.php");
  }

?>



<!DOCTYPE html>
<html> 
<head>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
</head>

<body onload="myFunction2();checklogin();accountdisplay();">

    <img id="realbuylogo2" style="top:1.8%;" src="images/web/Logo-3x.png" alt="Logo">
    <div id="myaccountoutline">
        <div id="myaccountoutline2">

        <form action="profileupdate.php" onsubmit="return checking()"  class="myprofileedit"  method="post" enctype="multipart/form-data" >
    
        
            <label for="name"><span id="editlabelname">Name</span></label>
            <span id="editnameerror" class="text-danger font-weight-bold"></span><br>
            <input id='editname' type="text" value="<?php echo $name; ?>" name="name" ><br> 
            <input type="file" name="fileToUpload" id="fileToUpload" onchange="loadFile(event)" style="display: none;">
            <label for="fileToUpload" style="cursor: pointer;"><span id="editlabelprofilepic">Prfile picture</span>
            <img id="editphoto" src="images/addproperties/photo-camera-3x.png"></label>
            <img id="output2"/>

            <label for="email"><span id="editlabelemail">Email</span></label>
            <span id="editemailerror" class="text-danger font-weight-bold"></span><br>
            <input id='editemail' type="text"  value="<?php echo $email; ?>" name="email" ><br>
            <label for="currentpassword"><span id="currentlabelpass">Current Password</span></label>
            <span id="currentpassworderror" class="text-danger font-weight-bold"></span><br>
            <input id='currentpass' type="password"  name="password" ><br><br> 

            <label for="phoneno"><span id="editlabelphone">Phone No.</span></label>
            <span id="editphonenoerror" class="text-danger font-weight-bold"></span><br>
            <input id='editphone' type="tel"  value="<?php echo $phoneno; ?>" name="phoneno" ><br><br> 
            <label for="newpassword"><span id="newlabelpass">New Password</span></label>
            <span id="newpassworderror" class="text-danger font-weight-bold"></span><br>
            <input id='newpass' type="password"  name="newpassword" ><br><br> 

            <label for="addressfield1"><span id="editlabeladdressfield1">Address Field 1.</span></label>
            <span id="editaddressfielderror1" class="text-danger font-weight-bold"></span><br>
            <input id='editaddress1' type="tel"  value="<?php echo $address1; ?>" name="address1" ><br><br> 
            <label for="city"><span id="citylabel">City</span></label>
            <span id="cityerror" class="text-danger font-weight-bold"></span><br>
            <input id='editcity' type="tel" value="<?php echo $city; ?>" name="city" ><br><br> 

            <label for="addressfield2"><span id="editlabeladdressfield2">Address Field 2.</span></label>
            <span id="editaddressfielderror2" class="text-danger font-weight-bold"></span><br>
            <input id='editaddress2' type="tel" value="<?php echo $address2; ?>" name="address2" ><br><br> 
            <label for="district"><span id="districtlabel">District</span></label>
            <span id="districterror" class="text-danger font-weight-bold"></span><br>
            <input id='editdistrict' type="tel" value="<?php echo $district; ?>" name="district" ><br><br> 

            <button id="save" type="submit">SAVE</button>


        
            
           

        </form><br>



        </div>
    </div>
    
    <script>
        var loadFile = function(event) {
        var image = document.getElementById('output2');
        image.src = URL.createObjectURL(event.target.files[0]);
        };

        function checking(){

            
            
            var name1=document.getElementById('editname').value;
            var email1=document.getElementById('editemail').value;
            var phone1=document.getElementById('editphone').value;
            var pass1=document.getElementById('currentpass').value;
            
            var currentpassword="<?php echo $p; ?>";
            
            var newpass1=document.getElementById('newpass').value;
            var address1=document.getElementById('editaddress1').value;
            var address2=document.getElementById('editaddress2').value;
            var city=document.getElementById('editcity').value;
            var district=document.getElementById('editdistrict').value;


            
            
            var namecheck=/^[a-zA-Z 0-9]{2,30}$/;
            var numcheck=/(^$)|(^\d{10}$)/;
            var passwordcheck=/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]{2,30}$/;
            var emailcheck=/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            
            var f=true;

            
            if(namecheck.test(name1)){

                document.getElementById('editnameerror').innerHTML = "";

            }else{

                document.getElementById('editnameerror').innerHTML = "Please enter a valid name";

                f=false;
            }
            

            if(emailcheck.test(email1)){

                document.getElementById('editemailerror').innerHTML = "";

            }else{

                document.getElementById('editemailerror').innerHTML = "Please enter a valid email";
                f=false;

            }

            if(numcheck.test(phone1)){

                document.getElementById('editphonenoerror').innerHTML = "";

            }else{

                document.getElementById('editphonenoerror').innerHTML = "Please enter valid number";
                f=false;

            }
            if((newpass1.length)>0){
                if(pass1!==currentpassword){
                document.getElementById('currentpassworderror').innerHTML = "Password incorrect";
                f=false;
                }else{
                    document.getElementById('currentpassworderror').innerHTML = "";
                }      
            
                if(passwordcheck.test(newpass1)){

                    document.getElementById('newpassworderror').innerHTML = "";

                }else{

                    document.getElementById('newpassworderror').innerHTML = "Please enter a valid password";
                    f=false;

                }
            }

            return f;

        }           
    


    </script>
</body>
</html>




<?php 
  require('design2.php');
  session_start();
?>