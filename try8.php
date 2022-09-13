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
    $va2=$va+4;

        
    $check=$_GET['city'];
    $protype=$_GET['propertytype'];
    $purtype=$_GET['purchasetype'];
    $srby=$_GET['sortby'];
    
  
    if((isset($_GET['sortby']))&&($_GET['sortby']=='asc')&&0){
      $sql1 = "SELECT * FROM propertydetails order by askingprice desc  ";
      
    }elseif((isset($_GET['sortby']))&&($_GET['sortby']=='desc')&&0){
      $sql1 = "SELECT * FROM propertydetails order by askingprice desc ";
      
    }else{
      $sql1 = "SELECT * FROM propertydetails order by askingprice desc ";
      
    }
    if(isset($_GET['city'])){
      $sql2="SELECT  askingprice.* FROM ($sql1)askingprice where city='$check'" ;
    }else{
      $sql2="SELECT  askingprice.* FROM ($sql1)askingprice";
    }
    if((isset($_GET['propertytype']))&&($_GET['propertytype']!='0')){
      $sql3="SELECT askingprice.* FROM ($sql2)askingprice where propertytype='$protype'" ;
    }else{
      $sql3="SELECT askingprice.* FROM ($sql2)askingprice " ;
    }
    if((isset($_GET['purchasetype']))&&($_GET['purchasetype']!='0')){
      $sql4="SELECT askingprice.* FROM ($sql3)askingprice where purpose='$purtype'" ;
    }else{
      $sql4="SELECT askingprice.* FROM ($sql3)askingprice ";
    }
   
   
 
    $sql5="SELECT monthname(addedon),day(addedon),year(addedon),askingprice.* FROM ($sql4)askingprice LIMIT $va,4";

    $sql6="SELECT monthname(addedon),day(addedon),year(addedon),askingprice.* FROM ($sql4)askingprice LIMIT $va2,4";
    
    $result1 = $conn->query($sql5);
    $result2 = $conn->query($sql6);
    
    
    $flag=0;
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
      ++$i;
      ++$count;
    }
    if ($result2->num_rows <= 0) {
      $flag=1;
      echo $flag;
    }
    for($i=0;$i<$count;$i++){
        echo $price[$i] .'<br>';
    }

    

?>