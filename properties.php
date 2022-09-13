

<?php 
    session_start();
    require('dbconnection.php');
    require('design.php');
    $la=0;
    $lo=0;

 
      
      
    
      if(isset($_SESSION["key"])){
        $la=$_SESSION["key"];
    }
   
    //$la=9.7875389;
    $lo='96.6094997';

    $resultsperpage=4;
    
    if(!isset($_GET['page'])){
        $page=1;
    }else{
        $page=$_GET['page'];
    }

    $va=($page-1)*4;
    $va2=$va+4;
    
   
    
    
   
    //$purtype=null;
    //$srby=null;
    

    /*if((!isset($_GET['city']))&&(!isset($_GET['check'])))){
      $check='0';
    }elseif(isset($_GET['city'])&&(strlen($_GET['city'])>='1')){
      $check=$_GET['city'];
    }else{
      $check=$check;
    }
    */
    
    if(!(strlen($_GET['city'])>1)){ 
      $check=0;
    }else{
      $check=$_GET['city'];
    }
    //$check=0;
    



    $protype=$_GET['propertytype'];
    $purtype=$_GET['purchasetype'];
    $srby=$_GET['sortby'];
    
  
    if((isset($_GET['sortby']))&&($_GET['sortby']=='asc')){
      $sql1 = "SELECT * FROM propertydetails order by askingprice asc  ";
      
    }elseif((isset($_GET['sortby']))&&($_GET['sortby']=='desc')){
      $sql1 = "SELECT * FROM propertydetails order by askingprice desc ";
      
    }else{
      $sql1 = "SELECT * FROM propertydetails order by addedon desc  ";
      
    }
    if(($check!='0')){
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
      $em[$i]=$row1["email"];
      $phoneno[$i]=$row1["phoneno"];
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
    if ($result2->num_rows <= 0) {
      $flag=1;
    }

    





?>

<!DOCTYPE html>
<html>   
<head>
    <link rel="stylesheet" href="stylesheets/styles.css" type="text/css">


    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBK3_9Cp19T8O52x7vLfewOB3alXeMsIVc&callback=initAutocomplete&libraries=places&v=weekly"
        defer
    ></script>
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */


      /* Optional: Makes the sample page fill the window. */

      #locationField,
      #controls {
        position: relative; 
        width: 480px;
      }

      #autocomplete {
        position: relative;
        top: 11px;
        left: 9px;
        text-align: center;
        height: 47.8px;
        width: 183px;
        border: 1px solid ;
        border-color:  rgba(56, 55, 55, 1);
        letter-spacing: 1px;
        font-family: 'Antipasto';
        font-size: 16px;
        background-color: rgba(240, 240, 240, 1);
        color: rgba(51, 51, 51, 1);
      }

      .label {
        text-align: right;
        font-weight: bold;
        width: 100px;
        color: #303030;
        font-family: "Roboto", Arial, Helvetica, sans-serif;
      }

      #address {
        display: none;
        border: 1px solid #000090;
        background-color: #f0f9ff;
        width: 480px;
        padding-right: 2px;
      }

      #address td {
        font-size: 10pt;
      }

      .field {
        width: 99%;
      }

      .slimField {
        width: 80px;
      }

      .wideField {
        width: 200px;
      }

      #locationField {
        height: 20px;
        margin-bottom: 2px;
      }




    </style>
    <script>
      // This sample uses the Autocomplete widget to help the user select a
      // place, then it retrieves the address components associated with that
      // place, and then it populates the form fields with those details.
      // This sample requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script
      // src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
      let placeSearch;
      let autocomplete;
      const componentForm = {
        street_number: "short_name",
        route: "long_name",
        locality: "long_name",
        administrative_area_level_1: "short_name",
        country: "long_name",
        postal_code: "short_name",
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search predictions to
        // geographical location types.
        autocomplete = new google.maps.places.Autocomplete(
          document.getElementById("autocomplete"),
          { types: ["geocode"] }
        );
        // Avoid paying for data that you don't need by restricting the set of
        // place fields that are returned to just the address components.
        autocomplete.setFields(["address_component"]);
        // When the user selects an address from the drop-down, populate the
        // address fields in the form.
        autocomplete.addListener("place_changed", fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        const place = autocomplete.getPlace();

        for (const component in componentForm) {
          document.getElementById(component).value = "";
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details,
        // and then fill-in the corresponding field on the form.
        for (const component of place.address_components) {
          const addressType = component.types[0];

          if (componentForm[addressType]) {
            const val = component[componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition((position) => {
            const geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude,
            };
            const circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy,
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>





</head>

<body onload="myFunction2();mytrial();">
    
    <img id="realbuylogo2" src="images/web/Logo.png" alt="Logo">
    <div class="outline">
      <div class="properties">
        <h3>Properties</h3>



        <div class="menu">
          <form class="form4" action="properties.php?check2=tyy&yh=yu" enctype="multipart/form-data" method="get">
          <input id='autocomplete' type="text"  placeholder="LOCATION(ANY)" name="ad" onFocus="geolocate()" value="<?php $v9=$_GET["ad"];echo $v9; ?>">

          <table id="address" >
            <tr>
              <td class="label">Street address</td>
              <td class="slimField">
                <input class="field" id="street_number" disabled="true" name="house" />
              </td>
              <td class="wideField" colspan="2">
                <input class="field" id="route" disabled="true" name="area"  />
              </td>
            </tr>
            <tr>
              <td class="label">City</td>
              <td class="wideField" colspan="3">
                <input class="field" id="locality"  name="city" value="<?php $v6=$_GET["city"];echo $v6; ?>" />
              </td>
            </tr>
            <tr>
              <td class="label">State</td>
              <td class="slimField">
                <input
                  class="field"
                  id="administrative_area_level_1"
                  disabled="true"
                  name="state" 
                />
              </td>
              <td class="label">Zip code</td>
              <td class="wideField">
                <input class="field" id="postal_code" disabled="true" name="zip" />
              </td>
            </tr>
            <tr>
              <td class="label">Country</td>
              <td class="wideField" colspan="3">
                <input class="field" id="country" disabled="true" name="country" />
              </td>
            </tr>
          </table><br>



          <div class="propertytypedrop" >
            <select name="propertytype" >
              <option value="<?php if(($_GET['propertytype']=="0")||(!isset($_GET['propertytype']))){
                echo "0";
              }else{
                echo $_GET['propertytype'];
              } ?>"><?php if(($_GET['propertytype']=="0")||(!isset($_GET['propertytype']))){
                echo "PROPERTY TYPE";
              }else{
                echo $_GET['propertytype'];
              } ?></option>
              <option value="COMMERCIAL">COMMERCIAL</option>
              <option value="RESIDENTIAL">RESIDENTIAL</option>
              <option value="LAND & PLOT">LAND & PLOT</option>
            </select>
          </div>

          <div class="purchasetypedrop" >
            <select name="purchasetype">
              <option value="<?php if(($_GET['purchasetype']=="0")||(!isset($_GET['purchasetype']))){
                echo "0";
              }else{
                echo $_GET['purchasetype'];
              } ?>"><?php if(($_GET['purchasetype']=="0")||(!isset($_GET['purchasetype']))){
                echo "PURCHASE TYPE";
              }elseif($_GET['purchasetype']=="SELL"){
                echo "BUY";
              }else{
                echo $_GET['purchasetype'];
              } ?></option>
              <option value="SELL">BUY</option>
              <option value="RENT">RENT</option>
            </select>
          </div>

          <div class="sortbydrop" > 
            <select name="sortby">
            <option value="<?php if(($_GET['sortby']=="0")||(!isset($_GET['sortby']))){
                echo "0";
              }else{
                echo $_GET['sortby'];
              } ?>"><?php if(($_GET['sortby']=="0")||(!isset($_GET['sortby']))){
                echo "SORT BY";
              }elseif($_GET['sortby']=="1"){
                echo "MOST RECENT";
                
              }elseif($_GET['sortby']=="asc"){
                echo "PRICE LOW TO HIGH";               
              }else{
                echo "PRICE HIGH TO LOW";
              } ?>
                <option value="1">MOST RECENT</option>
                <option value="asc">PRICE LOW TO HIGH</option>
                <option value="desc">PRICE HIGH TO LOW</option>
            </select>
          </div>
          <button id="searchproperty" >SEARCH</button>
          </form>  
          <a href="properties.php?page=<?php if($page==1){
                                                echo 1;
                                              }else{
                                                echo $page-1;
                                               } ?>&ad=<?php echo $_GET['ad'];?>&city=<?php echo $check;?>&propertytype=<?php if(($protype!=null)&&($protype!='0')){echo $protype;}else{echo 0;}?>&purchasetype=<?php if(($purtype!=null)&&($purtype!='0')){echo $purtype;}else{echo 0;}?>&sortby=<?php if(($srby!=null)&&($srby!='0')){echo $srby;}else{ echo 0;}?>"><img id="F" src="images/properties/web/Prev_Arrow.png">
          <a href="properties.php?page=<?php if($flag==1){
                                                echo $page;
                                              }else{
                                                echo $page+1;
                                               } ?>&ad=<?php echo $_GET['ad'];?>&city=<?php echo $check;?>&propertytype=<?php if(($protype!=null)&&($protype!='0')){echo $protype;}else{echo 0;}?>&purchasetype=<?php if(($purtype!=null)&&($purtype!='0')){echo $purtype;}else{echo 0;}?>&sortby=<?php if(($srby!=null)&&($srby!='0')){echo $srby;}else{ echo 0;}?>"><img id="G" src="images/properties/web/Next_Arrow.png">       
        </div>
        
        <?php
        for($i=0;$i<$count;$i++){
          echo '
          <ul >
  
            <li>
              <a href="details.php?propertyid='.$id[$i] .'"><img id="K" src="images/useruploads/'.$image[$i].'"></a><br>
              
              <div class="p555">
                <p class="p5">₹ ' .$price[$i] .'</p><br>
                <p class="p55">TYPE & LOCATION: </p><span id="restdofetails">'.$propertytype[$i].'/'.$location[$i].'</span> <br>
                <p class="p55">';if($propertytype[$i]=="Land & Plot"){
                  echo 'PLOT AREA: ';
                }else{
                  echo 'Built Up Area: ';
                }
                echo '</p><span id="restdofetails"> '.$builtuparea[$i].' ' .$builtupareaunit[$i] .'</span><br>
                <p class="p55">CITY:</p><span id="restdofetails"> '.$city[$i].'</span><br>
                <p class="p55">DESCRIPTION: </p><span id="restdofetails"> ';if($propertytype[$i]!="Land & Plot"){
                  echo $transactiontype[$i].'/'.$availability[$i].'/';
                }
                echo $description[$i].'</span><br>
                <p class="p55">POSTED:</p><span id="restdofetails"> '.$month[$i].' ' .$day[$i].', '.$year[$i].'</span><br>
              </div>
              <div class="contact">
                <img onclick="sendmaill(\''.$id[$i].'\');" id="mail" src="images/contact/web/Mail_white.png">
                <a href="#" onclick="sendmaill(\''.$id[$i].'\');" class="contactdetails" style="text-decoration:none;">SEND MAIL   &emsp; &emsp; &emsp;&emsp; &emsp; &emsp;   </a>
                <img id="mail" onclick="phonenumber('.$id[$i].');" src="images/contact/web/Call_white.png">
                <a href="#" onclick="phonenumber('.$id[$i].');" class="contactdetails" style="text-decoration:none;">PHONE NUMBER  &emsp; &emsp; &emsp;&emsp; &emsp; &emsp;  </a>
                <img id="mail" class="'.$id[$i] .'" onclick="makefavourite('.$id[$i] .');" src="images/contact/web/Fav_white.png">
                <a href="#" class="contactdetails" style="text-decoration:none;">SHORTLIST    &emsp; &emsp; &emsp;&emsp; &emsp; &emsp; </a>
                <a href="#?iddd='.$i .'" class="clickmap1" onclick="openmap('.$lattitude[$i].','.$longitude[$i] .');initMap('.$lattitude[$i].','.$longitude[$i].');"><img id="mail" src="images/contact/web/Map_white.png"></a>
                <a href="#" id="clickmap2" onclick="openmap('.$lattitude[$i].','.$longitude[$i] .');initMap('.$lattitude[$i].','.$longitude[$i].');" class="contactdetails" style="text-decoration:none;">MAP    </a>
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
        <div id="map1">
          <div id="mapcloseout">
            <?php
            
            echo '
            <a href="try4.php?api=1&destination='.$lattitude[$_SESSION["key"]] .','.$longitude[$_SESSION["key"]] .'&valll='; echo $_SESSION["key"] .' " target="_blank"><button id="mapsearch">SEARCH</button></a>
            ';
            ?>
          </div>
          
          <div id="map"></div>

          <div id="mapclose" onclick="closemap()">
              <img id="mapcloseimage" src="images/map/close_button-3x.png"/>
          </div>
        </div>

      </div>
           
    </div>
   



    <script>

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

      var map1=document.getElementById("map1");

      function openmap(latti,longi){

        $.post("checkfile.php",
              { 
                latti: latti,
                longi: longi

              },
              function(data,status){
              
                
                
                  
                  
                  

                
              }
              );
              map1.style.display = "block";

        
      }
      function closemap(){
      
        map1.style.display = "none";
      }









var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };
      var stylers = [
    {
        "featureType": "all",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "saturation": 36
            },
            {
                "color": "#000000"
            },
            {
                "lightness": 40
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#000000"
            },
            {
                "lightness": 16
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 17
            },
            {
                "weight": 1.2
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 21
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 17
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 29
            },
            {
                "weight": 0.2
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 18
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 16
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 19
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 17
            }
        ]
    }
];
        function initMap(lattitude,longitude) {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(lattitude, longitude),
          styles: stylers,
          zoom: 12
        });
       var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('https://storage.googleapis.com/mapsdevsite/json/mapmarkers2.xml', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            /*Array.prototype.forEach.call(markers, function(markerElem) {
              //var id = markerElem.getAttribute('id');
             // var name = markerElem.getAttribute('name');
              //var address = markerElem.getAttribute('address');
              //var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(40.92519182484799 ),
                  parseFloat(-73.89633758096939));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              //strong.textContent = name
              //infowincontent.appendChild(strong);
              //infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              //text.textContent = address
              infowincontent.appendChild(text);
              //var icon = customLabel[type] || {};
              
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                
                //label: icon.label
              });
              //marker.addListener('click', function() {
               // infoWindow.setContent(infowincontent);
               // infoWindow.open(map, marker);
              //});
            });*/

            var point = new google.maps.LatLng(
                  parseFloat(lattitude),
                  parseFloat(longitude));

                  var marker = new google.maps.Marker({
                map: map,
                position: point,
                
                
                //label: icon.label
              });


          });
        }



        function downloadUrl(url, callback) {
          var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }
      
      function doNothing() {}





























        var x, i, j, l, ll, selElmnt, a, b, c;
        /* Look for any elements with the class "custom-select": */
        x = document.getElementsByClassName("propertytypedrop");
        l = x.length;
        for (i = 0; i < l; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        ll = selElmnt.length;
        /* For each element, create a new DIV that will act as the selected item: */
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected2");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /* For each element, create a new DIV that will contain the option list: */
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items select-hide");
        for (j = 1; j < ll; j++) {
            /* For each option in the original select element,
            create a new DIV that will act as an option item: */
            c = document.createElement("DIV");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function(e) {
                /* When an item is clicked, update the original select box,
                and the selected item: */
                var y, i, k, s, h, sl, yl;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                sl = s.length;
                h = this.parentNode.previousSibling;
                for (i = 0; i < sl; i++) {
                if (s.options[i].innerHTML == this.innerHTML) {
                    s.selectedIndex = i;
                    h.innerHTML = this.innerHTML;
                    y = this.parentNode.getElementsByClassName("same-as-selected");
                    yl = y.length;
                    for (k = 0; k < yl; k++) {
                    y[k].removeAttribute("class");
                    }
                    this.setAttribute("class", "same-as-selected");
                    break;
                }
                }
                h.click();
            });
            b.appendChild(c);
        }
        x[i].appendChild(b);
        a.addEventListener("click", function(e) {
            /* When the select box is clicked, close any other select boxes,
            and open/close the current select box: */
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
        });
        }

        function closeAllSelect(elmnt) {
        /* A function that will close all select boxes in the document,
        except the current select box: */
        var x, y, i, xl, yl, arrNo = [];
        x = document.getElementsByClassName("select-items");
        y = document.getElementsByClassName("select-selected2");
        xl = x.length;
        yl = y.length;
        for (i = 0; i < yl; i++) {
            if (elmnt == y[i]) {
            arrNo.push(i)
            } else {
            y[i].classList.remove("select-arrow-active");
            }
        }
        for (i = 0; i < xl; i++) {
            if (arrNo.indexOf(i)) {
            x[i].classList.add("select-hide");
            }
        }
        }

        /* If the user clicks anywhere outside the select box,
        then close all select boxes: */
        document.addEventListener("click", closeAllSelect);




        var x, i, j, l, ll, selElmnt, a, b, c;
        /* Look for any elements with the class "custom-select": */
        x = document.getElementsByClassName("purchasetypedrop");
        l = x.length;
        for (i = 0; i < l; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        ll = selElmnt.length;
        /* For each element, create a new DIV that will act as the selected item: */
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected2");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /* For each element, create a new DIV that will contain the option list: */
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items select-hide");
        for (j = 1; j < ll; j++) {
            /* For each option in the original select element,
            create a new DIV that will act as an option item: */
            c = document.createElement("DIV");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function(e) {
                /* When an item is clicked, update the original select box,
                and the selected item: */
                var y, i, k, s, h, sl, yl;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                sl = s.length;
                h = this.parentNode.previousSibling;
                for (i = 0; i < sl; i++) {
                if (s.options[i].innerHTML == this.innerHTML) {
                    s.selectedIndex = i;
                    h.innerHTML = this.innerHTML;
                    y = this.parentNode.getElementsByClassName("same-as-selected");
                    yl = y.length;
                    for (k = 0; k < yl; k++) {
                    y[k].removeAttribute("class");
                    }
                    this.setAttribute("class", "same-as-selected");
                    break;
                }
                }
                h.click();
            });
            b.appendChild(c);
        }
        x[i].appendChild(b);
        a.addEventListener("click", function(e) {
            /* When the select box is clicked, close any other select boxes,
            and open/close the current select box: */
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
        });
        }

        function closeAllSelect(elmnt) {
        /* A function that will close all select boxes in the document,
        except the current select box: */
        var x, y, i, xl, yl, arrNo = [];
        x = document.getElementsByClassName("select-items");
        y = document.getElementsByClassName("select-selected2");
        xl = x.length;
        yl = y.length;
        for (i = 0; i < yl; i++) {
            if (elmnt == y[i]) {
            arrNo.push(i)
            } else {
            y[i].classList.remove("select-arrow-active");
            }
        }
        for (i = 0; i < xl; i++) {
            if (arrNo.indexOf(i)) {
            x[i].classList.add("select-hide");
            }
        }
        }

        /* If the user clicks anywhere outside the select box,
        then close all select boxes: */
        document.addEventListener("click", closeAllSelect);






        var x, i, j, l, ll, selElmnt, a, b, c;
        /* Look for any elements with the class "custom-select": */
        x = document.getElementsByClassName("sortbydrop");
        l = x.length;
        for (i = 0; i < l; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        ll = selElmnt.length;
        /* For each element, create a new DIV that will act as the selected item: */
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected2");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /* For each element, create a new DIV that will contain the option list: */
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items select-hide");
        for (j = 1; j < ll; j++) {
            /* For each option in the original select element,
            create a new DIV that will act as an option item: */
            c = document.createElement("DIV");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function(e) {
                /* When an item is clicked, update the original select box,
                and the selected item: */
                var y, i, k, s, h, sl, yl;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                sl = s.length;
                h = this.parentNode.previousSibling;
                for (i = 0; i < sl; i++) {
                if (s.options[i].innerHTML == this.innerHTML) {
                    s.selectedIndex = i;
                    h.innerHTML = this.innerHTML;
                    y = this.parentNode.getElementsByClassName("same-as-selected");
                    yl = y.length;
                    for (k = 0; k < yl; k++) {
                    y[k].removeAttribute("class");
                    }
                    this.setAttribute("class", "same-as-selected");
                    break;
                }
                }
                h.click();
            });
            b.appendChild(c);
        }
        x[i].appendChild(b);
        a.addEventListener("click", function(e) {
            /* When the select box is clicked, close any other select boxes,
            and open/close the current select box: */
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
        });
        }

        function closeAllSelect(elmnt) {
        /* A function that will close all select boxes in the document,
        except the current select box: */
        var x, y, i, xl, yl, arrNo = [];
        x = document.getElementsByClassName("select-items");
        y = document.getElementsByClassName("select-selected2");
        xl = x.length;
        yl = y.length;
        for (i = 0; i < yl; i++) {
            if (elmnt == y[i]) {
            arrNo.push(i)
            } else {
            y[i].classList.remove("select-arrow-active");
            }
        }
        for (i = 0; i < xl; i++) {
            if (arrNo.indexOf(i)) {
            x[i].classList.add("select-hide");
            }
        }
        }

        /* If the user clicks anywhere outside the select box,
        then close all select boxes: */
        document.addEventListener("click", closeAllSelect);




        function sendmail(email){
      sendmail.style.display="block";
    }

    function mytrial(){
      probtn.style.background="rgba(0, 0, 0, 1)";
      probtn.style.color="rgba(47, 181, 110, 1)";
    }



    </script>

</body>

</html            

<?php 
    session_start();
    require('design2.php');

?> 
