<?php
session_start();

$v1=$_POST['purpose'];
$vv1=$_POST['addpropertytype'];
$v2=$_FILES["fileToUpload"]["name"];
$v3=$_POST['address'];
$v4=$_POST['house'];
$v5=$_POST['location'];
$v6=$_POST['city'];
$v7=$_POST['state'];
$v8=$_POST['zipcode'];
$v9=$_POST['country'];
$v10=$_POST['askingprice'];
$v11=$_POST['addbathroom'];
$v12=$_POST['addbedroom'];
$v13=$_POST['builtuparea'];
$v14=$_POST['carpetarea'];
$v15=$_POST['builtupareaunit']; 
$v16=$_POST['carpetareaunit'];
$v17=$_POST['transactiontype'];
$v18=$_POST['propertyfloor'];
$v19=$_POST['ownership'];
$v20=$_POST['totalfloors'];
$v21=$_POST['availability'];
$v22=$_POST['description'];
$v23=$_SESSION["username"];
$v24=$_SESSION["email"];
$v25=$_SESSION["phoneno"];
date_default_timezone_set("America/New_York");
$w=date("Y-m-d");

echo $v1 ."1<br>";
echo $vv1 ."11<br>";
echo $v2 ."2<br>";
echo $v3 ."3<br>";
echo $v4 ."4<br>";
echo $v5 ."5<br>";
echo $v6 ."6<br>";
echo $v7 ."7<br>";
echo $v8 ."8<br>";
echo $v9 ."9<br>";
echo $v10 ."10<br>";
echo $v11 ."11<br>";
echo $v12 ."12<br>";
echo $v13 ."13<br>";
echo $v14 ."14<br>";
echo $v15."15<br>";
echo $v16 ."16<br>";
echo $v17 ."17<br>";
echo $v18 ."18<br>";
echo $v19 ."19<br>";
echo $v20 ."20<br>";
echo $v21 ."21<br>";
echo $v22 ."22<br>";
echo $v23 ."23<br>";
echo $v24 ."24<br>";
echo $v25 ."25<br>";
echo $w ."25<br>";


?>



