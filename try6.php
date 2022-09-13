<?php 
    session_start();
    require('dbconnection.php');



    $resultsperpage=4;
    
    if(!isset($_GET['page'])){
        $page=1;
    }else{
        $page=$_GET['page'];
    }

    $va=($page-1)*4;


        

  


    if(!isset($_GET['city'])){
        $sql1 = "SELECT *,monthname(addedon),day(addedon),year(addedon) FROM propertydetails LIMIT $va,4";
        
    }else{
        $check=$_GET['city'];
        $sql1 = "SELECT *,monthname(addedon),day(addedon),year(addedon) FROM propertydetails WHERE city='$check' LIMIT $va,4 ";
        
    }
    
    $result1 = $conn->query($sql1);
    
    
    $count2=$row1["count(*)"];
    $count=0;
    $i=0;
    while($row1 = $result1->fetch_assoc()) {
    
      $id[$i]=$row1["id"];
      $name[$i]=$row1["name"];
      $image[$i]=$row1["imagename"];
      $price[$i]=$row1["askingprice"];
      $propertytype[$i]=$row1["propertytype"];
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
      $i=$i+1;
      ++$count;
    }
    
    /*for($i=0;$i<$count;$i++){
        echo $id[i];
        echo $price[i];
    }*/

    echo hello;
   echo $count2;
   echo $i;
    echo $id[0];





?>
