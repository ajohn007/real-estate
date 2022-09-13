<?php
  session_start(); 
?>

<!DOCTYPE html>
<html>
<head>
    
    <title> Realbuy:Real Estate, Apartments, Mortgages & Home Values </title>
    <link rel="stylesheet" href="stylesheets/styles.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    
</head>

<body >


    <?php
        echo "hey";

        if(isset($_POST['emailsend'])){
            
            require_once 'vendor/autoload.php';
            
            // Create the Transport
            $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587,'tls'))
            ->setUsername('alphin@qburst.com')
            ->setPassword('nellikkattilcricketer007')
            ;
            
            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);
            echo "hello";
            // Create a message
            $message = (new Swift_Message('Wonderful Subject'))
            ->setFrom(['alphin@qburst.com' => 'John Doe'])
            ->setTo(['alphinjohnnellikkattil@gmail.com'])
            ->setBody('Here is the message itself')
            ;
            echo "hello2";
            // Send the message
            $result = $mailer->send($message);
             echo "hello3";
                    }

        ?>


         <div style="display:block;" id="sendmail">
    <div  id="sendmail2">
      <div id="sendmailhead">
        <span id="sendmailheading">SEND MAIL</span>
        <span onclick="closesendmail();" class="closemail">&times;</span>
      </div>
      <form id="sndmail"  role="form" method="post" enctype="multipart/formdata">
        <span id="emailname">Name</span><br>
        <input type="text" name="name" id="emailnameinput" value="<?php echo $_SESSION["username"];?>" ><br>
        <span id="emailemail">Email</span><br>
        <input type="text" name="mail" id="emailmailinput" value="<?php echo $_SESSION["email"];?>" ><br>
        <span id="emailtext">Comment</span><br>
        <textarea id="emailtextinput"  placeholder="Description"  name="comment"></textarea>
        <input type="submit" onclick="closesendmail();" value="SEND MAIL" name="emailsend" id="emailsend">
      </form>
    </div>

  </div>


</body>

</html>