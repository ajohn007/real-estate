<?php
  session_start(); 
?>
<?php
session_start(); 
require('dbconnection.php');
require 'googlemail/vendor/autoload.php';
 
// init configuration
$clientID = '188050638342-o9dbrhu8o4qlu3270i8qcudvc07h66o7.apps.googleusercontent.com';
$clientSecret = 'aAmLGxWCk49lmCwANTdYdMK3';
$redirectUri = 'http://localhost/Realbuy/index.php';
  
// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");
 
// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
  
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);
  
  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $email =  $google_account_info->email;
  $name =  $google_account_info->name;
  $_SESSION["username"]=$name;
  $_SESSION["email"]=$email;

  $sql="SELECT * FROM LoginCredentials";
  $result = $conn->query($sql);
  $k=0;
  while($row = $result->fetch_assoc()) {
      if($row['email']==$email){
        $k=1;
      }
    }
    if($k==0){
        $sql = "INSERT INTO LoginCredentials (name,email)
        VALUES ('$name','$email')";
        $conn->query($sql);
    }






  header("location: index.php");
  
 
  // now you can use this profile info to create account in your website and make user logged in.
} 
  //echo "<a href='".$client->createAuthUrl()."'>Google Login</a>";

?>

<!DOCTYPE html>
<html>
<head>
    
    <title> Realbuy:Real Estate, Apartments, Mortgages & Home Values </title>
    <link rel="stylesheet" href="stylesheets/styles.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    
</head>

<body >
     
    <img id="A" src="images/web/Bg-3x.png" alt="House">  
    <a href="https://myaccount.google.com" target="_blank"><img id="C" src="images/web/g+-3x.png" alt="House"></a>
    <a href="https://twitter.com" target="_blank"><img id="D" src="images/web/twitter-3x.png" alt="House"></a>
    <a href="https://www.facebook.com" target="_blank"><img id="E" src="images/web/fb-3x.png" alt="Facebook image"></a>
    <p id="copywrite">© 2020. realbuy.com. All rights reserved.</p>


    <div class="topnav">
        <a href="#" class="button" ><span id="myText2"></span></a>
        <a id="addprobtn" href="addproperties.php" class="addpropertybutton">ADD PROPERTY</span></a>
        <a id="probtn" href="properties.php">PROPERTIES</a>
        <a id="hombtn" href="index.php">HOME</a> 
       
          
    </div>


    

    <script>
        var hombtn=document.getElementById("hombtn");
        var probtn=document.getElementById("probtn");
        var addprobtn=document.getElementById("addprobtn");


        function myFunction2() {


            var check=<?php
                if(!isset($_SESSION["username"])){
                    echo 1;
                }else{
                    echo 2;
                } 
            ?>;
            if(check==1){               
                document.getElementById("myText2").innerHTML = "LOGIN";
            }else{
                var number2 = "<?php echo(strtoupper($_SESSION["username"])); ?>";
                document.getElementById("myText2").innerHTML = number2;
            }
            
        }



          
               
        
    </script>

    

  
</body>
</html>
