<!DOCTYPE html>
<html>
<head>
    
    <title> Zillow:Real Estate, Apartments, Mortgages & Home Values </title>
    <link rel="stylesheet" href="stylesheets/styles.css" type="text/css">

    

    <?php
    include('dbconnection.php');
    $v2="";
        if(isset($_POST['submit1'])){
            $v=$_POST["namee"];
            $p=$_POST["passwordd"];
            $sql = "SELECT * FROM LoginCredentials Where email='$v'";
            $sql2 = "SELECT * FROM LoginCredentials Where name='$v'";
            $sql3 = "SELECT password FROM LoginCredentials Where email='$v'";
            $sql4 = "SELECT password FROM LoginCredentials Where name='$v'";

            $result = $conn->query($sql);
            $result2 = $conn->query($sql2);
            $result3 = $conn->query($sql3);
            $result4 = $conn->query($sql4);

            $row = $result->fetch_assoc();
            $row2 = $result2->fetch_assoc();
            
            if ($result->num_rows > 0){
                $pass=$row["password"];
                if($pass==$p)
                    $v2=$row["name"];
                else
                    $v2="";
            }
            else{
                $pass=$row2["password"];
                if($pass==$p)
                    $v2=$row2["name"];
                else
                    $v2="";
            }
            $error=false;
            if($v2==""){
                echo "<span>Invalid</span>";
                $error=true;
            }else{
                echo "<span>Success</span>";
            }
        }else{
            $v=$_POST["name"];
            $v4=$_POST["email"];
            $v3=$_POST["password"];
            $v2=$v;


            $sql = "INSERT INTO LoginCredentials (name,email,password)
            VALUES ('$v','$v4','$v3')";
        }
                
    
    
    $conn->close();
    ?> 

    <script>
        function myFunction() {
          var number = <?php echo(json_encode($v2)); ?>;
          document.getElementById("myText").innerHTML = number;
        }
    </script>
</head>

<body onload="myFunction()">
    
     
     <img id="A" src="images/web/Bg.png" alt="House">  
     <img id="B" src="images/web/Logo.png" alt="Logo">
     <img id="C" src="images/web/g+.png" alt="House">
     <img id="D" src="images/web/twitter.png" alt="House">
     <img id="E" src="images/web/fb.png" alt="House">

     <div class="topnav">
        <a href="#">Home</a>
        <a href="#">Properties</a>
        <a href="#" class="button">logout</a>
    </div> 
 
    
        
     <h1>Welcome to realbuy <span id="myText"></span></h1>
     
     <p>Realbuy is a real estate firm with a vision to create luxurious living spaces that surpass the expectations of customers. Although recently launched the firm is driven with an instinct and far stretching insight that improves the real estate offerings in the city...</p>
 </body>
    
  
</html>



