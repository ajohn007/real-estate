<?php 
  require('design.php');
  session_start();
  require('dbconnection.php');


  if(!isset($_SESSION["username"])){
    header("location: index.php");
  }


  $email=$_SESSION["email"];
  $sql="SELECT * from LoginCredentials where email='$email'";
  $result=$conn->query($sql);
  $row=$result->fetch_assoc();
  $iduser=$row["id"];
  $na=$row["name"];
  $phoneno=$row["phoneno"];
  $address1=$row["address1"];
  $address2=$row["address2"];
  $c=$row["city"];
  $district=$row["district"];
  $profilepic=$row["profilepic"];
  

  $sql1="SELECT *,monthname(addedon),day(addedon),year(addedon) FROM propertydetails where email='$email'";
  $result1 = $conn->query($sql1);
  $sql2="SELECT * FROM shortlist where email='$email'";
  $result2 = $conn->query($sql2);
  $count=0;
  $i=0;
  $count1=0;
  $count2=0;
  while($row1 = $result1->fetch_assoc()) {
    
    $id[$i]=$row1["id"];
    $name[$i]=$row1["name"];
    $image[$i]=$row1["imagename"];
    setlocale(LC_MONETARY, 'en_IN');

    $price[$i]=$row1["askingprice"];
    $price[$i]= preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $price[$i]);
    
    $propertytype[$i]=$row1["propertytype"];
    $purchasetype[$i]=strtoupper($row1["purpose"]);
    $builtuparea[$i]=$row1["builtuparea"];
    $builtupareaunit[$i]=$row1["builtupareaunit"];
    $transactiontype[$i]=$row1["transactiontype"];
    $availability[$i]=$row1["availability"];
    $description[$i]=$row1["description"];
    $month[$i]=$row1["monthname(addedon)"];
    $day[$i]=$row1["day(addedon)"];
    $year[$i]=$row1["year(addedon)"];
    $bed[$i]=$row1["bedrooms"];
    $bath[$i]=$row1["bathrooms"];
    $location[$i]=$row1["location"];
    $city[$i]=$row1["city"];
    $lattitude[$i]=$row1["lattitude"];
    $longitude[$i]=$row1["longitude"];
    ++$i;
    ++$count;
  }
  $i=0;
  $cond=null;
 while($row1 = $result2->fetch_assoc()) {
    
    $id1[$i]=$row1["propertyid"];
    $cond=$cond ."'" .$id1[$i]."',";
    ++$count1;
    

  }

  $i=0;
 if($cond!=null){
  $cond=substr_replace($cond, "", -1);
 }else{
   $cond=0;
 }

  $sql3="SELECT *,monthname(addedon),day(addedon),year(addedon) FROM propertydetails where id in ($cond)";
  $result3 = $conn->query($sql3);
  while($row1 = $result3->fetch_assoc()) {


    
    $id2[$i]=$row1["id"];
    $name2[$i]=$row1["name"];
    $image2[$i]=$row1["imagename"];
    setlocale(LC_MONETARY, 'en_IN');

    $price2[$i]=$row1["askingprice"];
    $price2[$i]= preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $price2[$i]);
    
    $propertytype2[$i]=$row1["propertytype"];
    $purchasetype2[$i]=strtoupper($row1["purpose"]);
    $builtuparea2[$i]=$row1["builtuparea"];
    $builtupareaunit2[$i]=$row1["builtupareaunit"];
    $transactiontype2[$i]=$row1["transactiontype"];
    $availability2[$i]=$row1["availability"];
    $description2[$i]=$row1["description"];
    $month2[$i]=$row1["monthname(addedon)"];
    $day2[$i]=$row1["day(addedon)"];
    $year2[$i]=$row1["year(addedon)"];
    $bed2[$i]=$row1["bedrooms"];
    $bath2[$i]=$row1["bathrooms"];
    $location2[$i]=$row1["location"];
    $city2[$i]=$row1["city"];
    $lattitude2[$i]=$row1["lattitude"];
    $longitude2[$i]=$row1["longitude"];
    ++$i;
    ++$count2;
    
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
          <div id="myaccountmyprofile">

            <div id="circle">
              <img id="userprofilepic" src="images/userprofilepic/<?php echo $profilepic; ?> " />
              
            </div>

            <img id="nameimage" src="images/myaccount/profileaccount_icon-3x.png" alt="image" />
            <span id="namepara"><?php echo $_SESSION["username"];?></span>
            <img id="phoneimage" src="images/myaccount/phone_icon-3x.png" alt="image" />
            <span id="phonepara2"><?php echo $phoneno;?></span>
            <img id="emailimage" src="images/myaccount/mail_icon-3x.png" alt="image" />
            <span id="emailpara"><?php echo $_SESSION["email"];?></span>
            <img id="addressimage" src="images/myaccount/location_icon-3x.png" alt="image" />
            <div id="myaccountaddressparadiv">
              <span id="myaccountaddresspara">
                <?php echo $address1; ?><br>
                <?php echo $address2; ?><br>
                <?php echo $c; ?>,<br>
                <?php echo $district; ?><br>
              </span>
            </div>
            <div id="editprofileimagediv">
              <a href="myprofile.php"><img id="editprofileimage" src="images/myaccount/edit1-3x.png" alt="image" /></a>
            </div>
            

            


          </div>
          <br><br>
          <span id="my">My </span><span id="mypro">Properties</span><br>
          <span id="1">

                  <?php
        for($i=0;$i<$count;$i++){
          echo '
          <ul id="myaccountul">
  
            <li id="myaccountli">
              <a href="details.php?propertyid='.$id[$i] .'&lattitude='.$lattitude[$i].'&longitude='.$longitude[$i].'"><img id="K" src="images/useruploads/'.$image[$i].'"></a><br>
              <div id="editpropertyimagediv">
                <a href="editproperty.php?propertyid='.$id[$i] .'"><img id="editpropertyimage" src="images/myaccount/edit1-3x.png" alt="image" /></a>
              </div>
              <div id="editpropertydeletediv">
                <img onclick="openconfirmdelete('.$id[$i].')" id="editpropertydelete" src="images/myaccount/delete-button-3x.png" alt="image" />
              </div>
              <div class="p555">
                <p class="p5">₹ ' .$price[$i] .'</p><br>
                <p class="p55">TYPE & LOCATION: </p><span id="restdofetails">'.$propertytype[$i].'/'.$location[$i].'</span> <br>
                <p class="p55">PLOT AREA: </p><span id="restdofetails"> '.$builtuparea[$i].' ' .$builtupareaunit[$i] .'</span><br>
                <p class="p55">CITY:</p><span id="restdofetails"> '.$city[$i].'</span><br>
                <p class="p55">DESCRIPTION: </p><span id="restdofetails"> '.$transactiontype[$i].'/'.$availability[$i].'/'.$description[$i].'</span><br>
                <p class="p55">POSTED:</p><span id="restdofetails"> '.$month[$i].' ' .$day[$i].', '.$year[$i].'</span><br>
              </div>
              
              ';if($purchasetype[$i]=='SELL'){
                  echo '<div id="detailpurchasetype2">
                          <span > ON SALE </span>
                        </div>';
                  }else{
                    echo '<div id="detailpurchasetype">
                            <span > ON RENT </span>
                          </div>';
                  }     
                echo  '
                
            </li>
       
          </ul>
          '; 
        }

        ?>
    </span>
      <br><br><br><span id="my2">My </span><span id="myshortlist">Shortlists</span><br><br><br><br><br>
      <span id="2">
      <?php
        for($i=0;$i<$count2;$i++){
          echo '
          <ul id="myaccountul">
  
            <li id="myshortlistli">
              <a href="details.php?imagelocation='.$id2[$i] .'&lattitude='.$lattitude2[$i].'&longitude='.$longitude2[$i].'"><img id="K" src="images/useruploads/'.$image2[$i].'"></a><br>

              <div id="editpropertydeletediv">
                <img onclick="openremoveshortlist('.$id2[$i].')" id="editpropertydelete" src="images/myaccount/delete-button-3x.png" alt="image" />
              </div>
              <div class="p555">
                <p class="p5">₹ ' .$price2[$i] .'</p><br>
                <p class="p55">TYPE & LOCATION: </p><span id="restdofetails">'.$propertytype2[$i].'/'.$location2[$i].'</span> <br>
                <p class="p55">PLOT AREA: </p><span id="restdofetails"> '.$builtuparea2[$i].' ' .$builtupareaunit2[$i] .'</span><br>
                <p class="p55">CITY:</p><span id="restdofetails"> '.$city2[$i].'</span><br>
                <p class="p55">DESCRIPTION: </p><span id="restdofetails"> '.$transactiontype2[$i].'/'.$availability2[$i].'/'.$description2[$i].'</span><br>
                <p class="p55">POSTED:</p><span id="restdofetails"> '.$month2[$i].' ' .$day2[$i].', '.$year2[$i].'</span><br>
              </div>
              
              ';if($purchasetype2[$i]=='SELL'){
                  echo '<div id="detailpurchasetype2">
                          <span > ON SALE </span>
                        </div>';
                  }else{
                    echo '<div id="detailpurchasetype">
                            <span > ON RENT </span>
                          </div>';
                  }     
                echo  '
                
            </li>
       
          </ul>
          '; 
        }

        ?>

      </span>
        </div>
    </div>

    <div id="confirmdelete">
      <div id="confirmdeletehead">
        <span id="confirmdeleteheading">CONFIRM DELETE </span>
        <span onclick="closeconfirmdelete();" class="closemail">&times;</span>
      </div>
      <div id="confirmdeletedata">
        <img id="confirmdeletealert" src="images/delete/alert-3x.png" alt="image" />
        <span id="confirmdeletepara">Are you sure you want to delete this item? </span>
        <button id="deletebutton" onclick="deleteproperty()" name="propertyid" value="">DELETE</button>
        <button onclick="closeconfirmdelete();" id="cancelbutton">CANCEL</button>

 
      </div>

    </div>

    <div id="confirmremoveshortlist">
      <div id="confirmdeletehead">
        <span id="confirmdeleteheading">CONFIRM REMOVE SHORTLIST   </span>
        <span onclick="closeremoveshortlist();" class="closemail">&times;</span>
      </div>
      <div id="confirmdeletedata">
        <img id="confirmdeletealert" src="images/delete/alert-3x.png" alt="image" />
        <span id="confirmdeletepara">Are you sure you want to remove this item from shortlist? </span>
        <button id="removeshortlistbutton" onclick="tyremoveshortlist();" name="propertyid2" value="">REMOVE</button>
        <button onclick="closeremoveshortlist();" id="cancelbutton">CANCEL</button>


      </div>
      
    </div>

  <script>


    var confirmdelete=document.getElementById("confirmdelete");
    var removeshortlist=document.getElementById("confirmremoveshortlist");



    function openremoveshortlist(propertyid){
      document.getElementById('removeshortlistbutton').value=propertyid;
      removeshortlist.style.display="block";
    }
    function closeremoveshortlist(){
      removeshortlist.style.display="none";
    }
    function tyremoveshortlist(){
      var propertyid=document.getElementById('removeshortlistbutton').value;
      $.post("deleteshortlist.php",
        { 
          propertyid: propertyid
        },
        function(data,status){
          if(data==false){
            alert("Email already taken");
          }else{

            removeshortlist.style.display="none";
            location.reload();
           

          }
        });
        
    }





    function openconfirmdelete(propertyid){
      document.getElementById('deletebutton').value=propertyid;
      confirmdelete.style.display="block";
    }




    function closeconfirmdelete(){
      confirmdelete.style.display="none";
    }




    function deleteproperty(){
      var propertyid=document.getElementById('deletebutton').value;
      $.post("deleteproperty.php",
        { 
          propertyid: propertyid
        },
        function(data,status){
          if(data==false){
            alert("Email already taken");
          }else{

            confirmdelete.style.display="none";
            alert(data);
            location.reload();
           

          }
        });
    }


  </script>

</body>

</html>



<?php 
  require('design2.php');
  session_start();
?>