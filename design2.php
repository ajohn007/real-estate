<?php
  session_start(); 

?>


<!DOCTYPE html>
<html>
<head>
    
    <title> Zillow:Real Estate, Apartments, Mortgages & Home Values </title>
    <link rel="stylesheet" href="stylesheets/styles.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBK3_9Cp19T8O52x7vLfewOB3alXeMsIVc&callback=initAutocomplete&libraries=places&v=weekly"
      defer
    ></script>

    

</head>

<body>

  





  <div id="myModal" class="modal">
    <div class="loginhead">
      <p>LOGIN</p>
      <span class="close">&times;</span>
      <div class="modal-content">
        <form  id="just" class="form2"   action="#" method="post"  onsubmit="return validationlogin()">
        <label for="name"><p id="loginname">Email</p></label><br>
        <input id='namee' type="text"   name="namee" ><br>
        <label for="password"><p id="loginpass">Password</p></label><br>
        <input id='passs' type="password"   name="passwordd" ><br><br> 
        <button id="login" type="submit" name="submit">LOGIN</button><br>
        <p id="forgot" onclick="forgotpassword();">Forgot password?</p><br>
        <p id="or">or</p><br>
        <a href="<?php echo $client->createAuthUrl(); ?>" ><img id="loging" src="images/web/g+.png" alt="House"></a>
        <img id="logintwi" src="images/web/twitter.png" alt="House">
        <img id="loginfb" src="images/web/fb.png" alt="House">
        <p id="signup">Don't have an account?</p><a href="#" id="signupclick"><p id="signup2">Create account</p></a><br>
        </form><br>
        
          
      </div>
    </div>

  </div>



  <div id="myModal2" class="modal2"> 
    <div class="signuphead">
      <p>SIGNUP</p>
      <span class="close2">&times;</span>
      <div class="modal-content2">
      
      
        <form class="form3"  method="post" onsubmit="return validation()">
        
          <div>
            <label for="name"><p id="signupname">Name</p></label>
            <span id="nameerror" class="text-danger font-weight-bold"></span><br>
            <input id='name' type="text" name="name" ><br> 
        
          </div>
          <div>
            <label for="email"><p id="signupemail">Email</p></label>
            <span id="emailerror" class="text-danger font-weight-bold"></span><br>
            <input id='email' type="text"  name="email" ><br>
          </div>
          <div>
            <label for="phoneno"><p id="signupphone">Phone No.</p></label>
            <span id="phonenoerror" class="text-danger font-weight-bold"></span><br>
            <input id='phone' type="tel"  name="phoneno" ><br><br> 
          </div>
          <div>
            <label for="password"><p id="signuppass">Password</p></label>
            <span id="passworderror" class="text-danger font-weight-bold"></span><br>
            <input id='pass' type="password"  name="password" ><br><br> 
          </div> 
          <div>
            <label for="confpassword"><p id="signupconfpass">Confirm Password</p></label>
            <span id="confpassworderror" class="text-danger font-weight-bold"></span><br>
            <input id='confpass' type="password"  name="confpassword" ><br><br> 
          </div> 
          <button id="login2" type="submit">SIGNUP</button>
          <p id="or2">or</p><br>
          <img id="loging2" src="images/web/g+.png" alt="House">
          <img id="logintwi2" src="images/web/twitter.png" alt="House">
          <img id="loginfb2" src="images/web/fb.png" alt="House">
          
        </form><br>
      
      </div>

    </div>

  </div>

  <div id="myaccount">
    <div id="myaccount2">
      <div id="myaccounthead">
      <span id="myaccountheading"> MY ACCOUNT</span>
      <span class="close3">&times;</span>
      </div>
      <a href="myaccount.php"><button id="myprofile">MY PROFILE</button></a>
      <a href="myaccount.php#2"><button id="myprofile">MY SHORTLISTS</button></a>
      <a href="myaccount.php#1"><button id="myprofile">MY PROPERTIES</button></a>
      <button id="logout">LOG OUT</button>

    </div>
  
  </div>

  <div id="sendmail">
    <div id="sendmail2">
      <div id="sendmailhead">
        <span id="sendmailheading">SEND MAIL</span>
        <span onclick="closesendmail();" class="closemail">&times;</span>
      </div>
      <form id="sndmail"  onsubmit="return false" method="post" enctype="text/plain">
        <span id="emailname">Name</span><br>
        <input type="text" name="n" id="emailnameinput" value="<?php echo $_SESSION["username"];?>" readonly><br>
        <input type="text" style="display:none;" id="propertyid"  >
        <span id="emailemail">Email</span><br>
        <input type="text" name="m" id="emailmailinput" value="<?php echo $_SESSION["email"];?>" readonly><br>
        <span id="emailtext">Comment</span><br>
        <textarea id="emailtextinput"  placeholder="Description"  name="c"></textarea>
        <input type="submit" onclick="closesendmail();sendthemail();" value="SEND MAIL" id="emailsend">
      </form>
    </div>

  </div>


  <div id="phonenumberdiv">
    <div id="phonenumberdiv2">
      <div id="phonenumberhead">
        <span id="phonenumberheading">PHONE NUMBER</span>
        <span onclick="closephonenumber();" class="closemail">&times;</span>
      </div>
      <div id="phoneparadiv">   
        <span id="phonepara"><span id="phonename"></span>.</span>
      </div>

    </div>
  </div>

  <div id="forgotpassworddiv">
    <div id="forgotpassworddiv2">
      <div id="forgotpasswordhead" >
        <span id="phonenumberheading" style="height: 64px;width: 500px;">Forgot Password?</span>
        <span onclick="closeforgotpassword();" class="closemail">&times;</span>
      </div>
      <form id="forgotmailform"  onsubmit="return false" method="post" enctype="text/plain">

        <span id="forgotmailemail">Please enter your registered Email</span><br>
        <input type="text" name="m" id="forgotmailinput"  ><br>
        <input type="submit" onclick="closeforgotpassword();forgotmailsend();" value="SUBMIT" id="forgotsubmit">
      </form>
    </div>
  </div>

  <div id="forgotpassworddivse">
    <div id="forgotpassworddiv2">
      <div id="forgotpasswordhead" >
        <span id="phonenumberheading" style="height: 64px;width: 500px;">Forgot Password?</span>
        <span onclick="closeforgotpassword2();" class="closemail">&times;</span>
      </div>
      <span id="forgotmailemail">The password has been sent to the registered Email</span><br>
      <input type="button" onclick="closeforgotopenlogin();" value="OK" id="forgotsubmit">      
    </div>
  </div>
  




    <script>

    // Get the modal
    var modal = document.getElementById("myModal");
    var modal2 = document.getElementById("myModal2");
    var modal3 = document.getElementById("addproperty");
    var modal4 = document.getElementById("addpropertyse");
    var myaccount = document.getElementById("myaccount");
    var sendmail = document.getElementById("sendmail");
    var phonenumberdiv = document.getElementById("phonenumberdiv");
    var forgotpassworddiv = document.getElementById("forgotpassworddiv");
    var forgotpassworddiv2 = document.getElementById("forgotpassworddivse");

    // Get the button that opens the modal
    var login = document.getElementsByClassName("button")[0];
    var addproperty = document.getElementsByClassName("addpropertybutton")[0];
    var signup = document.getElementById("signupclick");
    var logout = document.getElementById("logout");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    var span2 = document.getElementsByClassName("close2")[0];
    var span3 = document.getElementsByClassName("close3")[0];

    
    function forgotmailsend(){
      var email=document.getElementById("forgotmailinput").value;
      $.post("forgotmail.php",
        { 
          email: email
        },
        function(data,status){
          
          if(data==false){
            alert("Please enter a valid email");
            forgotpassworddiv.style.display="block";
          }else{
            forgotpassworddiv2.style.display="block";              
          }          
        });      
    }

    function forgotpassword(){
      modal.style.display="none";
      forgotpassworddiv.style.display="block";
    }

    function closeforgotpassword(){
      forgotpassworddiv.style.display="none";
    }
    function closeforgotpassword2(){
      forgotpassworddiv2.style.display="none";
    }
    function closeforgotopenlogin(){
      forgotpassworddiv2.style.display="none";
      modal.style.display="block";
    }
    
    
    function sendthemail(){
      var n=document.getElementById("emailnameinput").value;
      var m=document.getElementById("emailmailinput").value;
      var c=document.getElementById("emailtextinput").value;
      var r=document.getElementById("sndmail").value;
      var id=document.getElementById("propertyid").value;
      $.post("sendthemail.php",
        { 
          n: n,
          m: m,
          c: c,
          r: r,
          id: id
        },
        function(data,status){
          
          if(data==false){
            alert("There was an error sending the mail");
          }else{

            alert(data);
         
           
              
            }
      

          
        });
        return false;
    }


    
    function makefavourite(proid){
          var check=<?php
                if(!isset($_SESSION["username"])){
                    echo 1;
                }else{
                    echo 2;
                } 
            ?>;

      if(check==1){               
              modal.style.display = "block";
            }else{
          var sr="images/contact/web/Fav_select.png";
          document.getElementsByClassName(proid)[0].src=sr;
          $.post("shortlist.php",
              { 
                propertyid: proid
              }
              );
        }
        }




    function makefavourite2(proid){
      var check=<?php
            if(!isset($_SESSION["username"])){
                echo 1;
            }else{
                echo 2;
            } 
        ?>;

      if(check==1){               
              modal.style.display = "block";
            }else{
          var sr="images/contact/web/Fav_select.png";
          document.getElementsByClassName("makefavourite2")[0].src=sr;
          $.post("shortlist.php",
              { 
                propertyid: proid
              }
              );
        }
        }





    function phonenumber(i){
      var check=<?php
                if(!isset($_SESSION["username"])){
                    echo 1;
                }else{
                    echo 2;
                } 
            ?>;

      if(check==1){               
              modal.style.display = "block";
            }else{
              $.post("findphone.php",
        { 
          id: i
        },
        function(data,status){
          if(data==false){
            phonenumberdiv.style.display = "block";
            document.getElementById("phonename").innerHTML = "The owner hasn't added any phone number yet.";
          }else{

            
            phonenumberdiv.style.display = "block";
              document.getElementById("phonename").innerHTML = data;
       

              
            }
      

          
        });

            }


    }



    function closephonenumber(){
      phonenumberdiv.style.display="none";
    }




    function sendmaill(id){
      var check=<?php
                if(!isset($_SESSION["username"])){
                    echo 1;
                }else{
                    echo 2;
                } 
            ?>;

      if(check==1){               
              modal.style.display = "block";
            }else{ 
              
              
          $.post("findemail.php",
        { 
          id: id
        },
        function(data,status){
          if(data==false){
            alert("Email already taken");
          }else{

            sendmail.style.display = "block";
            document.getElementById('sndmail').value = data;
            document.getElementById('propertyid').value = id;
            /*  var email1='mailto:';
              var email2=data;
              var email3="?subject=Interested in the property(Realbuy)";
              var email4=email1.concat(email2);
              var email5=email4.concat(email3);
              
              document.getElementById('sndmail').action = email5;
              */
              
            }
      

          
        });
     
            }

    }

    function closesendmail(){
      sendmail.style.display="none";
    }
    // When the user clicks the button, open the modal 
  
    login.onclick = function() {
      var check=<?php
                if(!isset($_SESSION["username"])){
                    echo 1;
                }else{
                    echo 2;
                } 
            ?>;
      if(check==1){               
        modal.style.display = "block";
      }else{
        myaccount.style.display = "block"; 
      }
    
    }

    function accountdisplay(){
      var check=<?php
                if(!isset($_SESSION["username"])){
                    echo 1;
                }else{
                    echo 2;
                } 
            ?>;
      if(check==2){ 
        myaccount.style.display = "block";
      }
    }

    signup.onclick = function() {
      modal.style.display = "none";
      modal2.style.display = "block";
    }
    logout.onclick = function() {
      var name1="alphin"; 
      $.post("logout.php",
        { 
          name: name1
 
        },
        function(data,status){
          if(data==false){
            alert("Email already taken");
          }else{

            
            document.getElementById("myText2").innerHTML = data;
            window.location.href = "index.php";
            

          }
        });
    }



    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
    span2.onclick = function() {
      modal2.style.display = "none";
    }
    span3.onclick = function() {
      myaccount.style.display = "none";
    }
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }

    function validation(){
      

      var name1=document.getElementById('name').value;
      var email1=document.getElementById('email').value;
      var phone1=document.getElementById('phone').value;
      var pass1=document.getElementById('pass').value;
      var confpass1=document.getElementById('confpass').value;
 
      var namecheck=/^[a-zA-Z 0-9]{2,30}$/;
      var numcheck=/(^$)|(^\d{10}$)/;
      var passwordcheck=/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]{2,30}$/;
      var emailcheck=/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
      
      var f=true;


      if(namecheck.test(name1)){

        document.getElementById('nameerror').innerHTML = "";

      }else{

        document.getElementById('nameerror').innerHTML = "Please enter a valid name";

        f=false;
      }


      if(emailcheck.test(email1)){

        document.getElementById('emailerror').innerHTML = "";

      }else{

        document.getElementById('emailerror').innerHTML = "Please enter a valid email";
        f=false;

      }

      if(numcheck.test(phone1)){

        document.getElementById('phonenoerror').innerHTML = "";

      }else{

        document.getElementById('phonenoerror').innerHTML = "Please enter valid number";
        f=false;

      }
      if(pass1!==confpass1){
        document.getElementById('confpassworderror').innerHTML = "Password mismatch";
        f=false;
      }      
      
      if(passwordcheck.test(pass1)){

        document.getElementById('passworderror').innerHTML = "";

      }else{

        document.getElementById('passworderror').innerHTML = "Please enter a valid password";
        f=false;

      }
        
      if(f==true){

        $.post("signup.php",
        { 
          name: name1,
          email: email1,
          phone: phone1,
          password: pass1
        },
        function(data,status){
          if(data==false){
            alert("Email already taken");
          }else{

            modal2.style.display = "none";
            document.getElementById("myText2").innerHTML = data;
            location.reload();

          }
        });
        
      }

      return false;


    }



    function validationlogin(){
      
      
        
          
      var email=$("#namee").val();
      var password=$("#passs").val();
      var num="";

          
      /*$(".form-message").load("try4.php",{
        name: name,
        password: password,
        submit: submit
        */

        $.post("login.php",
        {
          email: email,
          password: password
        },
        function(data,status){
          if(data==false){
            alert("Invalid Email or password");
          }else{

            document.getElementById("myText2").innerHTML = data;
            modal.style.display = "none";
            location.reload();

          }
          
        });
      
                
    
      return false;
        
        
      
     }



     function checklogin(){
      var check=<?php
      if(!isset($_SESSION["username"])){ 
        echo 1;
      }else{
        echo 2;
      } 
      ?>;
      if(check==1){
      modal.style.display = "block";
      return false;
      }else{
      return true;
      }
    }


    





     </script>

</body>
</html>