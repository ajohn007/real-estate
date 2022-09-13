<?php 
    session_start();
    require('dbconnection.php');
    
    
    $email=$_POST["email"];
    $m="sam@gmail.com";

    $sql="SELECT * from LoginCredentials where email='$email'";
    $result=$conn->query($sql);
    echo false;
    
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $password="Your password is ".$row["password"];
        require_once 'vendor/autoload.php';
        require_once 'emailpassword.php';
            
        // Create the Transport
        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587,'tls'))
        ->setUsername('alphin@qburst.com')
        ->setPassword($emailpass)
        ;
        
        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);
        
        // Create a message
        $message = (new Swift_Message('Forgot Password'))
        ->setFrom([$m])
        ->setTo($email)
        ->setBody($password)
        ;
        
        // Send the message
        if($mailer->send($message)){
            echo "Email has been successfully sent";
            
        }else{
            echo false;
        }
    }else{
        echo false;
    }
    
    
  
   
    


     
            

    ?>