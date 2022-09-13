<?php 
    session_start();
    require('dbconnection.php');
    
    $n=$_POST["n"];
    $m=$_POST["m"];
    $c=$_POST["c"];
    $re=$_POST["r"];
    $id="localhost/Realbuy/details.php?propertyid=".$_POST["id"];
    $c2=$c.' go to the following link to view the property :- '.$id;
    
   
    

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
    $message = (new Swift_Message('Interested in the property'))
    ->setFrom([$m => $n])
    ->setTo([$re])
    ->setBody( $c.   '<html>' .
    ' <head></head>' .
    ' <body>' .
    ' <br> Click the below link to view the property <br>' .
    '<a href="'.$id.'">Click here</a>'.
    ' </body>' .
    '</html>',
    'text/html')
    ;
    
    // Send the message
    if($mailer->send($message)){
        echo "Email has been successfully sent";
       
    }else{
        echo false;
    }
     
            

    ?>