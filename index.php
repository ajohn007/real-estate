<?php 
  require('design.php');
  session_start();
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



      #locationField,
      #controls {
        position: relative;
        width: 480px;
      }

      #autocomplete {
        position: absolute; 
        top: 40px; 
        left: 0px; 
        height: 44px;
        width: 348px;
        border: 1px solid ;
        border-color:  rgba(56, 55, 55, 1);
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

    <img id="B" src="images/web/Logo-3x.png" alt="Logo">


  <h1>Welcome to realbuy </h1>
    
  <p>Realbuy is a real estate firm with a vision to create luxurious living spaces that surpass the expectations of customers. Although recently launched the firm is driven with an instinct and far stretching insight that improves the real estate offerings in the city...</p>
    
  <form class="form" action="properties.php" method="get">
    <div class="tab">
    <label>
      <input type="radio" style=" position: absolute;opacity: 0;width: 0;height: 0;" name="purchasetype" value="SELL" >
      <h4 id="buy">BUY</h4>
    </label>
    <label>
      <input type="radio" style=" position: absolute;opacity: 0;width: 0;height: 0;"  name="purchasetype" value="RENT" >
      <h4 id="rent">RENT</h4>
    </label>
    </div> 
    
    
    <input id='autocomplete' type="text"  placeholder="Type Location or Project/Society or Keyword " style="font-family: 'Antipasto';font-size: 15px;color: rgba(113, 113, 113, 1);background-color: rgba(240, 240, 240, 1);padding-left:16px;" name="ad" onFocus="geolocate()">
    <div class="custom-select"> 
      <select name="propertytype">
        <option value="0">PROPERTY TYPE</option>
        <option value="COMMERCIAL">COMMERCIAL</option>
        <option value="RESIDENTIAL">RESIDENTIAL</option>
        <option value="LAND & PLOT">LAND & PLOT</option>
      </select>
    </div>    
   
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
          <input class="field" id="locality" disabled="true" name="city"  />
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
    <button id="subbt" >SEARCH</button>
  </form>

   
  
  <script>

      

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









    function mytrial(){
      hombtn.style.background="rgba(0, 0, 0, 1)";
      hombtn.style.color="rgba(47, 181, 110, 1)";
    }
    
    
    
  </script>

  
</body>
</html>

<?php 
  require('design2.php');
  session_start();
?>
