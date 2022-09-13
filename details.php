<?php 
    session_start();
    require('design.php');
    
    require('dbconnection.php');


    $id=$_GET['propertyid'];
    $sql = "SELECT * FROM propertydetails where id='$id'";
    $result = $conn->query($sql);
    $row1 = $result->fetch_assoc();
    $em=$row1["email"];
    $name=$row1["name"];
   
    
    $phoneno=$row1["phoneno"];
    $imagename=$row1["imagename"];
    $price1=$row1["askingprice"];
    $price1= preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $price1);
    $bed1=$row1["bedrooms"];
    $bath1=$row1["bathrooms"];
    $city1=$row1["city"];
    $builtuparea1=$row1["builtuparea"];
    $builtupareaunit1=strtoupper($row1["builtupareaunit"]);
    $lattitude1=$row1["lattitude"];
    $longitude1=$row1["longitude"];
    $description1=$row1["description"];
    $totalfloors=$row1["totalfloors"];
    $opensides=$row1["opensides"];
    $boundarywallmade=$row1["boundarywallmade"];
    $plotarea=$row1["plotarea"];
    $plotareaunit=$row1["plotareaunit"];
    $propertytype=$row1["propertytype"];
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBK3_9Cp19T8O52x7vLfewOB3alXeMsIVc&callback=initAutocomplete&libraries=places&v=weekly"
        defer
    ></script>

</head>

<body onload="myFunction2();">

    <img id="realbuylogo2" src="images/web/Logo-3x.png" alt="Logo">
    <div class="detailproperties">
        <div class="detailproperties2">
            <img id="detailimage" src="images/useruploads/<?php echo $imagename;?>">
            <div class="detailimagedescription">
                <img id="detailimagelocation" src="images/web/Location_carousel-3x.png"><h3 id="detailcity"><?php echo $city1;?></h3><h3 id="detailprice">₹ <?php echo $price1;?></h3>
            </div>
            <div class="detailimagedescription" style="background-color:rgba(16, 16, 16, 1);">
                <img id="detailimagearea" src="images/web/Area-3x.png">
                <p id="detailimageareapara" >Area</p>
                <div id="detailareadiv">
                    <span id="detailarea"><?php if($propertytype=='Land & Plot'){
                        echo $plotarea;
                    }else{
                        echo $builtuparea1;
                    }?></span><span id="detailareaunit"><?php if($propertytype=='Land & Plot'){
                        echo $plotareaunit;
                    }else{
                        echo $builtupareaunit1;
                    }?></span>
                </div>
                
            </div>
            <div class="detailimagedescription">
                <?php if($propertytype=='Residential'){
                    echo '<img id="detailimagebedrooms" src="images/web/Bed-3x.png">
                <p id="detailimageareapara" >Bedrooms</p><h3 id="detailbedrooms">'.$bed1 .'</h3>';
                }elseif($propertytype=='Land & Plot'){
                    echo '<img id="detailimagearea" src="images/web/Area-3x.png">
                    <p id="detailimageareapara" >Boundary Wall</p><h3 id="detailbedrooms">'.$boundarywallmade .'</h3>';
                }else{
                    echo '<img id="detailimagearea" src="images/web/Area-3x.png">
                    <p id="detailimageareapara" >Total Floors</p><h3 id="detailbedrooms">'.$totalfloors .'</h3>';
                }   ?>
            </div>
            <div class="detailimagedescription " style="background-color:rgba(16, 16, 16, 1);">
            <?php if($propertytype!='Land & Plot'){
                    echo '<img id="detailimagebathrooms" src="images/web/bathroom-3x.png">
                <p id="detailimageareapara" >Bathrooms</p><h3 id="detailbathrooms">'.$bath1 .'</h3>';
                }else{
                    echo '<img id="detailimagearea" src="images/web/Area-3x.png">
                    <p id="detailimageareapara" >Open Sides</p><h3 id="detailbathrooms">'.$opensides .'</h3>';
                }?>
            </div>
            <div id="detailimageabout">

                <span id="detailparadescription"><?php echo $description1;?>

    <!--        <p class="detailpara">Realbuy is a real estate firm with a vision to create luxurious living spaces that surpass the expectations of customers. Although recently launched the firm is driven with an instinct and far stretching insight that improves the real estate offerings in the city. Realbuy is a well-known name in creating the high-quality residential projects in Kochi region. With years of experience, the company has earned a good reputation in providing quality construction along with its dedicated team. It is a diversified group with significant . </p>
                <p class="detailpara">Realbuy has built a remarkable name and has established itself as one of the well known entities in the real estate arena. Providing help and assistance to the clients regarding realty issues along with offering useful and effective real estate solutions, stems out as the company's main motto sinc.</p><br>
                <p class="detailpara2" style="font-size: 18px;color: rgba(47, 181, 110, 1);">Seller Info</p>
                <p class="detailpara2">Avin CP </p>
                <p class="detailpara2">Chirapparambil House, Anickadu. P. O, Kottayam </p>
         -->   
           
            </div> 
            <div id="detailimagesend">
           <img onclick="sendmaill('<?php echo $id;?>');" id="detailmail" src="images/contact/web/Mail_white.png">
                <a href="#" onclick="sendmaill('<?php echo $id;?>');" style="text-decoration:none;"><pre class="contactdetails2">SEND MAIL                                     </pre></a>
                <img onclick="phonenumber(<?php echo $id;?>);" id="detailmail" src="images/contact/web/Call_white.png">
                <a href="#" onclick="phonenumber(<?php echo $id;?>);" style="text-decoration:none;"><pre class="contactdetails2">PHONE NUMBER                                     </pre></a>
                <img id="detailmail" class="makefavourite2" onclick="makefavourite2(<?php echo $id;?>);" src="images/contact/web/Fav_white.png">
                <a href="#" style="text-decoration:none;"><pre class="contactdetails2">SHORTLIST                                     </pre></a>
                <a href="#" onclick="openmap();initMap(<?php echo $lattitude1;?>,<?php echo $longitude1;?>);"><img id="detailmail" src="images/contact/web/Map_white.png"></a>
                <a href="#" onclick="openmap();initMap(<?php echo $lattitude1;?>,<?php echo $longitude1;?>);" style="text-decoration:none;"><pre class="contactdetails2">MAP    </pre></a>
            
            </div>

            <div id="map1">
          <div id="mapcloseout">
            <?php
            
            echo '
            <a href="https://www.google.com/maps/dir/?api=1&destination='.$lattitude1 .','.$longitude1 .'&valll='; echo $_SESSION["key"] .' " target="_blank"><button id="mapsearch">SEARCH</button></a>
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


var map1=document.getElementById("map1");

function openmap(latti,longi){

 
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

</script>

</body>

</html>


<?php 
    session_start();
    require('design2.php');

?> 