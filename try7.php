<?php 
    session_start();
    require('dbconnection.php');



    
    $sql="SELECT * FROM propertydetails where city='uzhavoor'" ;
    $sql3="SELECT askingprice.* FROM ($sql)askingprice where purpose='sell'" ;
    $sql4="SELECT askingprice.* FROM ($sql3)askingprice where propertytype='commercial'" ;
    $sql2 = "SELECT monthname(addedon),day(addedon),year(addedon),askingprice.* FROM ($sql4)askingprice order by askingprice desc";
    $result1 = $conn->query($sql2);
    $row1 = $result1->fetch_assoc();
    $ask=$row1["askingprice"];
    echo $ask;
    echo $row1["monthname(addedon)"];
    echo hello;

    $c=$_GET['propertytype'];
    echo $c;
    if(isset($_GET['city'])){
        echo "city <br>";
        $sql1="SELECT * FROM propertydetails where city='$check'" ;
    }else{
        echo "no city <br>";
        $sql1="SELECT * FROM propertydetails";
    }
    if(isset($_GET['propertytype'])){
        if($c!='0'){
            echo "  pr <br>";
        }else{
            echo nooo;
        }
        
        $sql2="SELECT askingprice.* FROM ($sql1)askingprice where propertytype='$protype'" ;
      }else{
        echo "no pr <br>";
        $sql2="SELECT askingprice.* FROM ($sql1)askingprice " ;
      }
      if((isset($_GET['purchasetype']))&&($_GET['purchasetype']!='0')){
          echo $_GET['purchasetype'];
        echo "pu <br>";
        $sql3="SELECT askingprice.* FROM ($sql2)askingprice where purpose='$purtype'" ;
      }else{
        echo "pu no <br>";
        $sql3="SELECT askingprice.* FROM ($sql2)askingprice ";
      }
      if((isset($_GET['sortby']))&&($_GET['sortby']!='0')){
          echo $_GET['sortby'];
        echo "sr <br>";
        $sql4 = "SELECT monthname(addedon),day(addedon),year(addedon),askingprice.* FROM ($sql3)askingprice order by askingprice '$srby' LIMIT $va,4";
        $sql5="SELECT monthname(addedon),day(addedon),year(addedon),askingprice.* FROM ($sql3)askingprice order by askingprice '$srby' LIMIT $va2,4";
      }else{
        echo "sr no <br>";
        $sql4 = "SELECT monthname(addedon),day(addedon),year(addedon),askingprice.* FROM ($sql3)askingprice order by addedon desc";
        $sql5="SELECT monthname(addedon),day(addedon),year(addedon),askingprice.* FROM ($sql3)askingprice order by addedon desc LIMIT $va2,4";
      }
      echo heeeeee;
      
      

      if(!isset($ht)){
        echo "noi";
      }else{
        echo "yeah";
      }
      

?>