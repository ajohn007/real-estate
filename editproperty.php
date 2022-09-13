<?php 
  require('design.php');
  session_start();
  require('dbconnection.php');
  $id=$_GET["propertyid"];
  $sql="SELECT * from propertydetails where id='$id'";
  $result1 = $conn->query($sql);
  $row1 = $result1->fetch_assoc();

  $purpose=$row1["purpose"];
  $addpropertytype=$row1["propertytype"];
  $house=$row1["house"];
  $address=$row1["address"];
  $house=$row1["house"];
  $location=$row1["location"];
  $city=$row1["city"];
  $state=$row1["state"];
  $zipcode=$row1["zipcode"];
  $country=$row1["country"];
  $lattitude=$row1["lattitude"];
  $longitude=$row1["longitude"];
  $imagename=$row1["imagename"];

  $price=$row1["askingprice"];  
  $bed=$row1["bedrooms"];
  $bath=$row1["bathrooms"];  
  $builtuparea=$row1["builtuparea"];
  $builtupareaunit=strtoupper($row1["builtupareaunit"]);
  $carpetarea=$row1["carpetarea"];
  $carpetareaunit=strtoupper($row1["carpetareaunit"]);
  $transactiontype=$row1["transactiontype"];
  $propertyfloor=$row1["propertyfloor"];
  $ownership=$row1["ownership"];
  $totalfloors=$row1["totalfloors"];
  $availability=$row1["availability"];
  $plotlength=$row1["plotlength"];
  $plotbreadth=$row1["plotbreadth"];
  $plotarea=$row1["plotarea"];
  $plotlengthunit=$row1["plotlengthunit"];
  $plotbreadthunit=$row1["plotbreadthunit"];
  $plotareaunit=$row1["plotareaunit"];
  $opensides=$row1["opensides"];
  $boundarywallmade=$row1["boundarywallmade"];
  

  $description=$row1["description"];
  
  
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

    <style type="text/css">



     

      #autocomplete2 {
        position: absolute; 
        top: 62%; 
        left: 4.4%; 
        height: 45px;
        width: 355px;
        
        border: 1px solid ;
        padding-left:11px;
        font-family: 'Antipasto';
        font-size: 16px;
        color: rgba(123, 123, 123, 1);
        border-color:  rgba(140, 140, 140, 1);
       

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
          document.getElementById("autocomplete2"),
          { types: ["geocode"] }
        );
        // Avoid paying for data that you don't need by restricting the set of
        // place fields that are returned to just the address components.
        autocomplete.setFields(["address_component","geometry"]);
        // When the user selects an address from the drop-down, populate the
        // address fields in the form.
        autocomplete.addListener("place_changed", fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        const place = autocomplete.getPlace();

        const val1= place.geometry.location.lat();
        const val2=place.geometry.location.lng();
        document.getElementById("lattitude").value = val1;
        document.getElementById("longitude").value = val2;

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


<body onload="myFunction2();checklogin();accountdisplay();mytrial();<?php if($addpropertytype=='Commercial'){
                                                                            echo 'addcommercialchange();';
                                                                          }else if($addpropertytype=='Residential'){
                                                                            echo 'addfurnishedchange();';
                                                                          }
                                                                          else{
                                                                            echo 'addlandchange();';
                                                                          }
                                                                          ?>">


<img id="realbuylogo2" style="top:1.8%;" src="images/web/Logo-3x.png" alt="Logo">




  <form action="editpropertyvalues.php?propertyid=<?php echo $id; ?>" method="post" enctype="multipart/form-data" onsubmit="return checklogin()">
    <div id="addproperty">
      <div id="addproperty2">
 
        <span id="addpropertyheading">ADD</span>
        <span id="addpropertyheading" style="color: rgba(47, 181, 110, 1);">PROPERTY</span>
        <a href="#" id="addpropertybasic" >BASIC INFORMATION</a>
        <a href="#" id="addpropertydetails">PROPERTY DETAILS</a>
        <div id="wantdiv"> 
          <p id="wantpara">I WANT TO</p>
        </div>
        <div class="testing">
          <input type="radio" id="addsell" name="purpose" value="Sell" <?php if($purpose=='Sell'){echo 'checked';} ?>>
          <label for="addsell" style="font-family: 'Antipasto';font-size: 14px;color: rgba(255, 255, 255, 1);position: absolute;top: 19%;left: 4.4%;cursor: pointer;">SELL</label>
          <input type="radio" id="addrent" name="purpose" value="Rent" <?php if($purpose=='Rent'){echo 'checked';} ?>>
          <label for="addrent" style="font-family: 'Antipasto';font-size: 14px;color: rgba(255, 255, 255, 1);position: absolute;top: 19%;left: 16%;cursor: pointer;">RENT</label><br>
        </div>
        <div id="typediv">
          <p id="wantpara">PROPERTY TYPE</p>
        </div>
        
        <label>
            <input type="radio" style=" position: absolute;opacity: 0;width: 0;height: 0;" name="addpropertytype" value="Commercial" <?php if($addpropertytype=='Commercial'){echo 'checked';} ?>>
            <?php if($addpropertytype=='Commercial'){
              echo '<img id="addcommercial"  onclick="addcommercialchange();" src="images/addproperties/commercial-select-3x.png">';
            }else{
              echo '<img id="addcommercial" onclick="addcommercialchange();" src="images/addproperties/commercial-3x.png">';
            }
            ?>
        </label>
        <label>
            <input type="radio" style=" position: absolute;opacity: 0;width: 0;height: 0;" name="addpropertytype" value="Residential" <?php if($addpropertytype=='Residential'){echo 'checked';} ?>>
            <?php if($addpropertytype=='Residential'){
              echo '<img id="addfurnished"  onclick="addfurnishedchange();" src="images/addproperties/furnished_Select-3x.png">';
            }else{
              echo '<img id="addfurnished" onclick="addfurnishedchange();" src="images/addproperties/furnished_homes-3x.png">';
            }
            ?>
            
        </label>
        <label>
            <input type="radio" style=" position: absolute;opacity: 0;width: 0;height: 0;cursor: pointer;" name="addpropertytype" value="Land & Plot" <?php if($addpropertytype=='Land & Plot'){echo 'checked';} ?>>    
            <?php if($addpropertytype=='Land & Plot'){
              echo '<img id="addland"  onclick="addlandchange();" src="images/addproperties/land&plot_select-3x.png">';
            }else{
              echo '<img id="addland" onclick="addlandchange();" src="images/addproperties/land&plot-3x.png">';
            }
            ?>
            
        </label>
        
        <p id="addcommercialpara">COMMERCIAL  </p>
        <p id="addfurnishedpara">FURNISHED HOMES</p>
        <p id="addlandpara">LAND & PLOT</p>

        <div id="photodiv">
          <p id="wantpara">ADD YOUR PROPERTY PHOTOS</p> 
        </div>
        <input type="file" name="fileToUpload" id="fileToUpload" onchange="loadFile(event)" value='<?php echo $imagename; ?>' style="display: none;">
        <label for="fileToUpload" style="cursor: pointer;"><img id="addphoto" src="images/addproperties/photo-camera-3x.png"></label>
        <img id="output" width="200"/>
        <p id="addphotopara">ADD PHOTO</p>

        <div id="addressdiv">
          <p id="wantpara">YOUR PROPERTY ADDRESS</p>
        </div> 

        <input id='autocomplete2' type="text" value='<?php echo $address; ?>' placeholder=" Address " style="font-family: 'Antipasto';font-size: 15px;color: rgba(113, 113, 113, 1);background-color: rgba(22, 22, 22, 1);" name="address" onFocus="geolocate()">
        <input style="display:none;" value=<?php echo $lattitude; ?> id="lattitude" placeholder="Enter your lattitude" name=lattitude type="text"/>
        <input style="display:none;" value=<?php echo $longitude; ?> id="longitude" placeholder="Enter your longitude" name=longitude type="text"/>
        <img id="locationcorousal" src="images/compass-bitmap/web/compass-3x.png"/>
        <input class="field" id="street_number" value='<?php echo $house; ?>' style="display:none"  name="house" />
        <input class="widefieldlocation" id="route" value='<?php echo $location; ?>' placeholder="Location"  name="location"  />
        <input class="wideFieldcity" id="locality" value='<?php echo $city; ?>' placeholder="City"  name="city"  />
        <input class="slimFieldstate" id="administrative_area_level_1" value='<?php echo $state; ?>' placeholder="State"  name="state" />
        <input class="wideFieldzip" id="postal_code" placeholder="Zip Code" value=<?php echo $zipcode; ?>  name="zipcode" />
        <input class="wideFieldcountry" id="country" value='<?php echo $country; ?>' placeholder="Country"  name="country" />

        <a href="#"> <p id="addnext">Next</p></a>
        
      
        

      </div>
    </div>
    
    <div id="addpropertyse">
      <div id="addproperty2se">
        <span id="addpropertyheading">ADD</span>
        <span id="addpropertyheading" style="color: rgba(47, 181, 110, 1);">PROPERTY</span><br>
        <a href="#" id="addpropertybasic2" >BASIC INFORMATION</a>
        <a href="#" id="addpropertydetails2">PROPERTY DETAILS</a><br>
        <input class="askingprice"  placeholder="Asking Price: ₹"  name="askingprice" value='<?php echo $price;?>' />
        <div class="bathroomdrop"  >
          
            
          <select name="addbathroom" >
            <option value="<?php echo $bath;?>"><?php echo $bath;?></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
          </select>
          
          
        </div>
        <br><br>
        <div class="bedroomdrop" > 
          <select name="addbedroom">
            <option value="<?php echo $bed;?>"><?php echo $bed;?></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
          </select>
        </div><br>
        <div id="areadiv">
          <span id="wantpara" >Property Area</span>
        </div>
        <input class="builtuparea" value='<?php echo $builtuparea;?>' placeholder="Built-Up Area"  name="builtuparea" />
        <input class="carpetarea" value='<?php echo $carpetarea;?>' placeholder="Carpet Area"  name="carpetarea" />
        <input class="plotlength" value='<?php echo $plotlength;?>' placeholder="Plot Length"  name="plotlength" style="display:none" />
        <input class="plotbreadth" value='<?php echo $plotbreadth;?>' placeholder="Plot Breadth"  name="plotbreadth" style="display:none" />
        <input class="plotarea" value='<?php echo $plotarea;?>' placeholder="Plot Area"  name="plotarea" style="display:none" />
        <div class="builtupareaunit" >
          <select name="builtupareaunit">
            <option value="<?php echo $builtupareaunit;?>"><?php echo $builtupareaunit;?></option>
            <option value="Sq-ft">Sq-ft</option>
            <option value="Sq-yrd">Sq-yrd</option>
            <option value="Sq-m">Sq-m</option>
            <option value="Cents">Cents</option>
            <option value="Acre">Acre</option>
          </select>
        </div>
        <div class="plotlengthunit" style="display:none">
          <select name="plotlengthunit">
            <option value="<?php echo $plotlengthunit;?>"><?php echo $plotlengthunit;?></option>
            <option value="Sq-ft">Sq-ft</option>
            <option value="Sq-yrd">Sq-yrd</option>
            <option value="Sq-m">Sq-m</option>
            <option value="Cents">Cents</option>
            <option value="Acre">Acre</option>
          </select>
        </div>
        <div class="plotbreadthunit" style="display:none">
          <select name="plotbreadthunit">
            <option value="<?php echo $plotbreadthunit;?>"><?php echo $plotbreadthunit;?></option>
            <option value="Sq-ft">Sq-ft</option>
            <option value="Sq-yrd">Sq-yrd</option>
            <option value="Sq-m">Sq-m</option>
            <option value="Cents">Cents</option>
            <option value="Acre">Acre</option>
          </select>
        </div>
        <div class="plotareaunit" style="display:none">
          <select name="plotareaunit">
            <option value="<?php echo $plotareaunit;?>"><?php echo $plotareaunit;?></option>
            <option value="Sq-ft">Sq-ft</option>
            <option value="Sq-yrd">Sq-yrd</option>
            <option value="Sq-m">Sq-m</option>
            <option value="Cents">Cents</option>
            <option value="Acre">Acre</option>
          </select>
        </div>
        <div class="carpetareaunit" >
          <select name="carpetareaunit">
            <option value="<?php echo $carpetareaunit;?>"><?php echo $carpetareaunit;?></option>
            <option value="Sq-ft">Sq-ft</option>
            <option value="Sq-yrd">Sq-yrd</option>
            <option value="Sq-m">Sq-m</option>
            <option value="Cents">Cents</option>
            <option value="Acre">Acre</option>
          </select>
        </div>
        <div id="transactiontypediv">
          <p id="wantpara" style="top:-13px;">Transaction Type</p>
        </div>
        <div class="testing">
          <input type="radio" id="resale" name="transactiontype" value="Resale" <?php if($transactiontype=='Resale'){echo 'checked';} ?>>
          <label for="resale" style="font-family: 'Antipasto';font-size: 14px;color: rgba(255, 255, 255, 1);position: absolute;top: 52.2%;left: 4.5%;cursor: pointer;">Resale</label>
          <input type="radio" id="newbooking" name="transactiontype" value="New Booking" <?php if($transactiontype=='New Booking'){echo 'checked';} ?>>
          <label for="newbooking" style="font-family: 'Antipasto';font-size: 14px;color: rgba(255, 255, 255, 1);position: absolute;top: 52.2%;left: 15.5%;cursor: pointer;">New Booking</label><br>
        </div>
          <div class="propertyfloor" >
          <select name="propertyfloor">
            <option value="<?php echo $propertyfloor;?>"><?php echo $propertyfloor;?></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
          </select>
        </div>
        <div class="opensides" style="display:none">
          <select name="opensides">
            <option value="<?php echo $opensides;?>"><?php echo $opensides;?></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>
        </div>
        <div class="ownership" >
          <select name="ownership">
            <option value="<?php echo $ownership;?>"><?php echo $ownership;?></option>
            <option value="Owner">Owner</option>
            <option value="Brocker">Brocker</option>
          </select>
        </div>
        <div class="totalfloors" >
          <select name="totalfloors">
            <option value="<?php echo $totalfloors;?>"><?php echo $totalfloors;?></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
          </select>
        </div>
        <div class="boundarywallmade" style="display:none">
          <select name="boundarywallmade">
            <option value="<?php echo $boundarywallmade;?>"><?php echo $boundarywallmade;?></option>
            <option value="YES">YES</option>
            <option value="NO">NO</option>

          </select>
        </div>
        <div id="availabilitydiv">
          <p id="wantpara" style="top:-13px;">Availability</p>
        </div>
        <div class="testing">
          <input type="radio" id="readytomove" name="availability" value="Ready to move" <?php if($availability=='Ready to move'){echo 'checked';} ?>>
          <label for="readytomove" style="font-family: 'Antipasto';font-size: 14px;color: rgba(255, 255, 255, 1);position: absolute;top: 76%;left: 4.5%;cursor: pointer;">Ready to move</label>
          <input type="radio" id="underconstruction" name="availability" value="Under construction" <?php if($availability=='Under Construction'){echo 'checked';} ?>>
          <label for="underconstruction" style="font-family: 'Antipasto';font-size: 14px;color: rgba(255, 255, 255, 1);position: absolute;top: 76%;left: 15.5%;cursor: pointer;">Under construction</label><br>
        </div>
        <textarea class="descriptionn"  placeholder="Description"  name="description" ><?php echo $description;?></textarea>
        
        <button id="postad">POST AD</button>


      </div>
    </div>
  </form>


  <script>

    var com="images/addproperties/commercial-3x.png";
    var comselect="images/addproperties/commercial-select-3x.png";
    var fur="images/addproperties/furnished_homes-3x.png";
    var furselect="images/addproperties/furnished_Select-3x.png";
    var land="images/addproperties/land&plot-3x.png";
    var landselect="images/addproperties/land&plot_select-3x.png";

    var bedroom = document.getElementsByClassName("bedroomdrop")[0];
    var bathroom = document.getElementsByClassName("bathroomdrop")[0];
    var propertyfloor = document.getElementsByClassName("propertyfloor")[0];
    var totalfloors = document.getElementsByClassName("totalfloors")[0];
    var builtuparea = document.getElementsByClassName("builtuparea")[0];
    var carpetarea = document.getElementsByClassName("carpetarea")[0];
    var builtupareaunit = document.getElementsByClassName("builtupareaunit")[0];
    var carpetareaunit = document.getElementsByClassName("carpetareaunit")[0];
    var plotlength = document.getElementsByClassName("plotlength")[0];
    var plotbreadth = document.getElementsByClassName("plotbreadth")[0];
    var plotarea = document.getElementsByClassName("plotarea")[0];
    var plotlengthunit = document.getElementsByClassName("plotlengthunit")[0];
    var plotbreadthunit = document.getElementsByClassName("plotbreadthunit")[0];
    var plotareaunit = document.getElementsByClassName("plotareaunit")[0];
    var opensides = document.getElementsByClassName("opensides")[0];
    var boundarywallmade = document.getElementsByClassName("boundarywallmade")[0];

    function addcommercialchange(){

      bathroom.style.display="block";
      propertyfloor.style.display="block";
      totalfloors.style.display="block";
      builtuparea.style.display="block";
      carpetarea.style.display="block";
      builtupareaunit.style.display="block";
      carpetareaunit.style.display="block";
      bedroom.style.display="none";
      plotlength.style.display="none";
      plotbreadth.style.display="none";
      plotarea.style.display="none";
      plotlengthunit.style.display="none";
      plotbreadthunit.style.display="none";
      plotareaunit.style.display="none";
      opensides.style.display="none";
      boundarywallmade.style.display="none";
      document.getElementById("addcommercial").src=comselect;
      document.getElementById("addfurnished").src=fur;
      document.getElementById("addland").src=land;
    }
    function addfurnishedchange(){
      bedroom.style.display="block";
      bathroom.style.display="block";
      propertyfloor.style.display="block";
      totalfloors.style.display="block";
      builtuparea.style.display="block";
      carpetarea.style.display="block";
      builtupareaunit.style.display="block";
      carpetareaunit.style.display="block";
      plotlength.style.display="none";
      plotbreadth.style.display="none";
      plotarea.style.display="none";
      plotlengthunit.style.display="none";
      plotbreadthunit.style.display="none";
      plotareaunit.style.display="none";
      opensides.style.display="none";
      boundarywallmade.style.display="none";
      document.getElementById("addcommercial").src=com;
      document.getElementById("addfurnished").src=furselect;
      document.getElementById("addland").src=land;
    }
    function addlandchange(){
      plotlength.style.display="block";
      plotbreadth.style.display="block";
      plotarea.style.display="block";
      plotlengthunit.style.display="block";
      plotbreadthunit.style.display="block";
      plotareaunit.style.display="block";
      opensides.style.display="block";
      boundarywallmade.style.display="block";
      bedroom.style.display="none";
      bathroom.style.display="none";
      propertyfloor.style.display="none";
      totalfloors.style.display="none";
      builtuparea.style.display="none";
      carpetarea.style.display="none";
      builtupareaunit.style.display="none";
      carpetareaunit.style.display="none";
      document.getElementById("addcommercial").src=com;
      document.getElementById("addfurnished").src=fur;
      document.getElementById("addland").src=landselect;
    }

    var loadFile = function(event) {
    var image = document.getElementById('output');
    image.src = URL.createObjectURL(event.target.files[0]);
  };


var x, i, j, l, ll, selElmnt, a, b, c;
    /* Look for any elements with the class "custom-select": */
    x = document.getElementsByClassName("custom-select");
    l = x.length;
    for (i = 0; i < l; i++) {
      selElmnt = x[i].getElementsByTagName("select")[0];
      ll = selElmnt.length;
      /* For each element, create a new DIV that will act as the selected item: */
      a = document.createElement("DIV");
      a.setAttribute("class", "select-selected");
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
      y = document.getElementsByClassName("select-selected");
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
        x = document.getElementsByClassName("bathroomdrop");
        l = x.length;
        for (i = 0; i < l; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        ll = selElmnt.length;
        /* For each element, create a new DIV that will act as the selected item: */
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected6");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /* For each element, create a new DIV that will contain the option list: */
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items6 select-hide");
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
        x = document.getElementsByClassName("select-items6");
        y = document.getElementsByClassName("select-selected6");
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
        x = document.getElementsByClassName("bedroomdrop");
        l = x.length;
        for (i = 0; i < l; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        ll = selElmnt.length;
        /* For each element, create a new DIV that will act as the selected item: */
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected6");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /* For each element, create a new DIV that will contain the option list: */
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items6 select-hide");
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
        x = document.getElementsByClassName("select-items6");
        y = document.getElementsByClassName("select-selected6");
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
        x = document.getElementsByClassName("builtupareaunit");
        l = x.length;
        for (i = 0; i < l; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        ll = selElmnt.length;
        /* For each element, create a new DIV that will act as the selected item: */
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected6");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /* For each element, create a new DIV that will contain the option list: */
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items6 select-hide");
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
        x = document.getElementsByClassName("select-items6");
        y = document.getElementsByClassName("select-selected6");
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
        x = document.getElementsByClassName("plotlengthunit");
        l = x.length;
        for (i = 0; i < l; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        ll = selElmnt.length;
        /* For each element, create a new DIV that will act as the selected item: */
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected6");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /* For each element, create a new DIV that will contain the option list: */
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items6 select-hide");
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
        x = document.getElementsByClassName("select-items6");
        y = document.getElementsByClassName("select-selected6");
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
        x = document.getElementsByClassName("plotbreadthunit");
        l = x.length;
        for (i = 0; i < l; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        ll = selElmnt.length;
        /* For each element, create a new DIV that will act as the selected item: */
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected6");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /* For each element, create a new DIV that will contain the option list: */
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items6 select-hide");
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
        x = document.getElementsByClassName("select-items6");
        y = document.getElementsByClassName("select-selected6");
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
        x = document.getElementsByClassName("plotareaunit");
        l = x.length;
        for (i = 0; i < l; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        ll = selElmnt.length;
        /* For each element, create a new DIV that will act as the selected item: */
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected6");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /* For each element, create a new DIV that will contain the option list: */
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items6 select-hide");
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
        x = document.getElementsByClassName("select-items6");
        y = document.getElementsByClassName("select-selected6");
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
        x = document.getElementsByClassName("carpetareaunit");
        l = x.length;
        for (i = 0; i < l; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        ll = selElmnt.length;
        /* For each element, create a new DIV that will act as the selected item: */
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected6");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /* For each element, create a new DIV that will contain the option list: */
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items6 select-hide");
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
        x = document.getElementsByClassName("select-items6");
        y = document.getElementsByClassName("select-selected6");
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
        x = document.getElementsByClassName("propertyfloor");
        l = x.length;
        for (i = 0; i < l; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        ll = selElmnt.length;
        /* For each element, create a new DIV that will act as the selected item: */
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected6");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /* For each element, create a new DIV that will contain the option list: */
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items6 select-hide");
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
        x = document.getElementsByClassName("select-items6");
        y = document.getElementsByClassName("select-selected6");
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
        x = document.getElementsByClassName("opensides");
        l = x.length;
        for (i = 0; i < l; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        ll = selElmnt.length;
        /* For each element, create a new DIV that will act as the selected item: */
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected6");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /* For each element, create a new DIV that will contain the option list: */
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items6 select-hide");
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
        x = document.getElementsByClassName("select-items6");
        y = document.getElementsByClassName("select-selected6");
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
        x = document.getElementsByClassName("boundarywallmade");
        l = x.length;
        for (i = 0; i < l; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        ll = selElmnt.length;
        /* For each element, create a new DIV that will act as the selected item: */
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected6");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /* For each element, create a new DIV that will contain the option list: */
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items6 select-hide");
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
        x = document.getElementsByClassName("select-items6");
        y = document.getElementsByClassName("select-selected6");
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
        x = document.getElementsByClassName("ownership");
        l = x.length;
        for (i = 0; i < l; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        ll = selElmnt.length;
        /* For each element, create a new DIV that will act as the selected item: */
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected6");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /* For each element, create a new DIV that will contain the option list: */
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items6 select-hide");
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
        x = document.getElementsByClassName("select-items6");
        y = document.getElementsByClassName("select-selected6");
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
        x = document.getElementsByClassName("totalfloors");
        l = x.length;
        for (i = 0; i < l; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        ll = selElmnt.length;
        /* For each element, create a new DIV that will act as the selected item: */
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected6");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /* For each element, create a new DIV that will contain the option list: */
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items6 select-hide");
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
        x = document.getElementsByClassName("select-items6");
        y = document.getElementsByClassName("select-selected6");
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











    var property1=document.getElementById("addproperty");
    var property2=document.getElementById("addpropertyse");

    var basic = document.getElementById("addpropertybasic");
    var details = document.getElementById("addpropertydetails"); 
    var basic2 = document.getElementById("addpropertybasic2");
    var details2 = document.getElementById("addpropertydetails2");
    var next = document.getElementById("addnext");

    basic.onclick = function() {
      property2.style.display = "none";
      property1.style.display = "block";      
    }
    basic2.onclick = function() {
      property2.style.display = "none";
      property1.style.display = "block";      
    }
    details.onclick = function() {
      property1.style.display = "none";
      property2.style.display = "block";
    }
    details2.onclick = function() {
      property1.style.display = "none";
      property2.style.display = "block";
    }
    next.onclick = function() {
      property1.style.display = "none";
      property2.style.display = "block";
    }


    function mytrial(){
      addprobtn.style.background="rgba(0, 0, 0, 1)";
      addprobtn.style.color="rgba(47, 181, 110, 1)";
    }

  </script>

</body>
</html>

<?php 
  require('design2.php');
  session_start();
?>

