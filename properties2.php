

<?php 
    session_start();
    require('dbconnection.php');
    require('design.php');


    $resultsperpage=4;
    
    if(!isset($_GET['page'])){
        $page=1;
    }else{
        $page=$_GET['page'];
    }

    $va=($page-1)*4;


        

  


    if(!isset($_GET['city'])){
        $sql = "SELECT *,monthname(addedon),day(addedon),year(addedon) FROM propertydetails LIMIT $va,4";
    }else{
        $check=$_GET['city'];
        $sql = "SELECT *,monthname(addedon),day(addedon),year(addedon) FROM propertydetails WHERE city='$check' LIMIT $va,4 ";
    }
    
    $result = $conn->query($sql);
    $row1 = $result->fetch_assoc();
    $row2 = $result->fetch_assoc();
    $row3 = $result->fetch_assoc();
    $row4 = $result->fetch_assoc();

    $id1=$row1["id"];
    $name1=$row1["name"];
    $image1=$row1["imagename"];
    $price1=$row1["askingprice"];
    $propertytype1=$row1["propertytype"];
    $builtuparea1=$row1["builtuparea"];
    $builtupareaunit1=$row1["builtupareaunit"];
    $transactiontype1=$row1["transactiontype"];
    $availability1=$row1["availability"];
    $description1=$row1["description"];
    $month1=$row1["monthname(addedon)"];
    $day1=$row1["day(addedon)"];
    $year1=$row1["year(addedon)"];
    $bed1=$row1["bedrooms"];
    $bath1=$row1["bathrooms"];
    $location1=$row1["location"];
    $city1=$row1["city"];

    $name2=$row2["name"];
    $image2=$row2["imagename"];
    $price2=$row2["askingprice"];
    $propertytype2=$row2["propertytype"];
    $builtuparea2=$row2["builtuparea"];
    $builtupareaunit2=$row2["builtupareaunit"];
    $transactiontype2=$row2["transactiontype"];
    $availability2=$row2["availability"];
    $description2=$row2["description"];
    $month2=$row2["monthname(addedon)"];
    $day2=$row2["day(addedon)"];
    $year2=$row2["year(addedon)"];
    $bed2=$row2["bedrooms"];
    $bath2=$row2["bathrooms"];
    $location2=$row2["location"];
    $city2=$row2["city"];

    $name3=$row3["name"];
    $image3=$row3["imagename"];
    $price3=$row3["askingprice"];
    $propertytype3=$row3["propertytype"];
    $builtuparea3=$row3["builtuparea"];
    $builtupareaunit3=$row3["builtupareaunit"];
    $transactiontype3=$row3["transactiontype"];
    $availability3=$row3["availability"];
    $description3=$row3["description"];
    $month3=$row3["monthname(addedon)"];
    $day3=$row3["day(addedon)"];
    $year3=$row3["year(addedon)"];
    $bed3=$row3["bedrooms"];
    $bath3=$row3["bathrooms"];
    $location3=$row3["location"];
    $city3=$row3["city"];

    $name4=$row4["name"];
    $image4=$row4["imagename"];
    $price4=$row4["askingprice"];
    $propertytype4=$row4["propertytype"];
    $builtuparea4=$row4["builtuparea"];
    $builtupareaunit4=$row4["builtupareaunit"];
    $transactiontype4=$row4["transactiontype"];
    $availability4=$row4["availability"];
    $description4=$row4["description"];
    $month4=$row4["monthname(addedon)"];
    $day4=$row4["day(addedon)"];
    $year4=$row4["year(addedon)"];
    $bed4=$row4["bedrooms"];
    $bath4=$row4["bathrooms"];
    $location4=$row4["location"];
    $city4=$row4["city"];
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

<body onload="myFunction2()">
    
    <img id="realbuylogo2" src="images/web/Logo.png" alt="Logo">
    <div class="outline">
      <div class="properties">
        <h3>Properties</h3>



        <div class="menu">
          <form class="form4" action="properties.php" method="get">
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



          <div class="propertytypedrop" >
            <select name="propertytype" >
              <option value="<?php if(($_GET['propertytype']=="0")||(!isset($_GET['propertytype']))){
                echo "PROPERTY TYPE";
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
              }else{
                echo $_GET['purchasetype'];
              } ?></option>
              <option value="SELL">BUY</option>
              <option value="RENT">RENT</option>
            </select>
          </div>

          <div class="sortbydrop" > 
            <select name="sortby">
                <option value="0">SORT BY</option>
                <option value="1">MOST RECENT</option>
                <option value="2">PRICE LOW TO HIGH</option>
                <option value="3">PRICE HIGH TO LOW</option>
            </select>
          </div>
          <button id="searchproperty" >SEARCH</button>
          </form>  
          <a href="properties.php?page=<?php echo $page-1; ?>"><img id="F" src="images/properties/web/Prev_Arrow.png">
          <a href="properties.php?page=<?php echo $page+1; ?>"><img id="G" src="images/properties/web/Next_Arrow.png">       
        </div>

        <ul>

          <li>
            <a href="details.php?imagelocation=<?php echo $id1;?>"><img id="K" src="images/useruploads/<?php echo $image1?>"></a><br>
            
            <div class="p555">
              <p class="p5">₹ <?php echo $price1;?></p><br>
              <p class="p55">TYPE & LOCATION: </p><h3 id="restdofetails"> <?php echo $propertytype1;?>/<?php echo $location1;?> </h3> <br>
              <p class="p55">PLOT AREA: </p><h3 id="restdofetails"> <?php echo $builtuparea1;?> <?php echo $builtupareaunit1;?> </h3><br>
              <p class="p55">CITY:</p><h3 id="restdofetails"> <?php echo $city1;?> </h3><br>
              <p class="p55">DESCRIPTION: </p><h3 id="restdofetails"> <?php echo $transactiontype1;?>/<?php echo $availability1;?>/<?php echo $description1;?> </h3><br>
              <p class="p55">POSTED:</p><h3 id="restdofetails"> <?php echo $month1;?> <?php echo $day1;?>, <?php echo $year1;?> </h3><br>
            </div>
            <div class="contact">
              <a href="design.php"><img id="mail" src="images/contact/web/Mail_white.png"></a>
              <a href="design.php" style="text-decoration:none;"><pre class="contactdetails">SEND MAIL                      </pre></a>
              <a href="design.php"><img id="mail" src="images/contact/web/Call_white.png"></a>
              <a href="design.php" style="text-decoration:none;"><pre class="contactdetails">PHONE NUMBER                      </pre></a>
              <a href="design.php"><img id="mail" src="images/contact/web/Fav_white.png"></a>
              <a href="design.php" style="text-decoration:none;"><pre class="contactdetails">SHORTLIST                      </pre></a>
              <a href="design.php"><img id="mail" src="images/contact/web/Map_white.png"></a>
              <a href="design.php" style="text-decoration:none;"><pre class="contactdetails">MAP    </pre></a>
            </div>

          </li>
          <li>
            <a href="details.php?imagelocation=<?php echo $image2;?>"><img id="K" src="images/useruploads/<?php echo $image2?>"></a>
            <div class="p555">
              <p class="p5">₹ <?php echo $price2?></p><br>
              <p class="p55">TYPE & LOCATION: </p><h3 id="restdofetails"> <?php echo $propertytype2;?>/<?php echo $location2;?> </h3><br>
              <p class="p55">PLOT AREA: </p><h3 id="restdofetails"> <?php echo $builtuparea2;?> <?php echo $builtupareaunit2;?> </h3><br>
              <p class="p55">CITY:</p><h3 id="restdofetails"> <?php echo $city2;;?> </h3><br>
              <p class="p55">DESCRIPTION: </p><h3 id="restdofetails"><?php echo $transactiontype2;?>/<?php echo $availability2;?>/<?php echo $description2;?> </h3><br>
              <p class="p55">POSTED:</p><h3 id="restdofetails"> <?php echo $month2;?> <?php echo $day2;?>, <?php echo $year2;?> </h3><br>
            </div>               
            <div class="contact">
              <a href="design.php"><img id="mail" src="images/contact/web/Mail_white.png"></a>
              <a href="design.php" style="text-decoration:none;"><pre class="contactdetails">SEND MAIL                      </pre></a>
              <a href="design.php"><img id="mail" src="images/contact/web/Call_white.png"></a>
              <a href="design.php" style="text-decoration:none;"><pre class="contactdetails">PHONE NUMBER                      </pre></a>
              <a href="design.php"><img id="mail" src="images/contact/web/Fav_white.png"></a>
              <a href="design.php" style="text-decoration:none;"><pre class="contactdetails">SHORTLIST                      </pre></a>
              <a href="design.php"><img id="mail" src="images/contact/web/Map_white.png"></a>
              <a href="design.php" style="text-decoration:none;"><pre class="contactdetails">MAP    </pre></a>
            </div>

          </li>
          <li>
            <a href="details.php?imagelocation=<?php echo $image3;?>"><img id="K" src="images/useruploads/<?php echo $image3?>"></a>
            <div class="p555">
              <p class="p5">₹ <?php echo $price3?></p><br>
              <p class="p55">TYPE & LOCATION: </p><h3 id="restdofetails"> <?php echo $propertytype3;?>/<?php echo $location3;?> </h3><br>
              <p class="p55">PLOT AREA: </p><h3 id="restdofetails"> <?php echo $builtuparea3;?> <?php echo $builtupareaunit3;?> </h3><br>
              <p class="p55">CITY:</p><h3 id="restdofetails"> <?php echo $city3;?> </h3><br>
              <p class="p55">DESCRIPTION: </p><h3 id="restdofetails"><?php echo $transactiontype3;?>/<?php echo $availability3;?>/<?php echo $description3;?> </h3><br>
              <p class="p55">POSTED:</p><h3 id="restdofetails"> <?php echo $month3;?> <?php echo $day3;?>, <?php echo $year3;?> </h3><br>
            </div>
            <div class="contact">
              <a href="design.php"><img id="mail" src="images/contact/web/Mail_white.png"></a>
              <a href="design.php" style="text-decoration:none;"><pre class="contactdetails">SEND MAIL                      </pre></a>
              <a href="design.php"><img id="mail" src="images/contact/web/Call_white.png"></a>
              <a href="design.php" style="text-decoration:none;"><pre class="contactdetails">PHONE NUMBER                      </pre></a>
              <a href="design.php"><img id="mail" src="images/contact/web/Fav_white.png"></a>
              <a href="design.php" style="text-decoration:none;"><pre class="contactdetails">SHORTLIST                      </pre></a>
              <a href="design.php"><img id="mail" src="images/contact/web/Map_white.png"></a>
              <a href="design.php" style="text-decoration:none;"><pre class="contactdetails">MAP    </pre></a>
            </div>

          </li> 
          <li>
            <a href="details.php?imagelocation=<?php echo $image4;?>"><img id="K" src="images/useruploads/<?php echo $image4?>"></a>
            <div class="p555">
              <p class="p5">₹ <?php echo $price4?></p><br>
              <p class="p55">TYPE & LOCATION: </p><h3 id="restdofetails"> <?php echo $propertytype4;?>/<?php echo $location4;?> </h3><br>
              <p class="p55">PLOT AREA: </p><h3 id="restdofetails"> <?php echo $builtuparea4;?> <?php echo $builtupareaunit4;?> </h3><br>
              <p class="p55">CITY:</p><h3 id="restdofetails"> <?php echo $city4;?> </h3><br>
              <p class="p55">DESCRIPTION: </p><h3 id="restdofetails"><?php echo $transactiontype4;?>/<?php echo $availability4;?>/<?php echo $description4;?> </h3><br>
              <p class="p55">POSTED:</p><h3 id="restdofetails"> <?php echo $month4;?> <?php echo $day4;?>, <?php echo $year4;?> </h3><br>
            </div>
            <div class="contact">
              <a href="design.php"><img id="mail" src="images/contact/web/Mail_white.png"></a>
              <a href="design.php" style="text-decoration:none;"><pre class="contactdetails">SEND MAIL                      </pre></a>
              <a href="design.php"><img id="mail" src="images/contact/web/Call_white.png"></a>
              <a href="design.php" style="text-decoration:none;"><pre class="contactdetails">PHONE NUMBER                      </pre></a>
              <a href="design.php"><img id="mail" src="images/contact/web/Fav_white.png"></a>
              <a href="design.php" style="text-decoration:none;"><pre class="contactdetails">SHORTLIST                      </pre></a>
              <a href="design.php"><img id="mail" src="images/contact/web/Map_white.png"></a>
              <a href="design.php" style="text-decoration:none;"><pre class="contactdetails">MAP    </pre></a>
            </div>
              
          </li>
        </ul>

      </div>
           
    </div>
   



    <script>


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










    </script>

</body>

</html            

<?php 
    session_start();
    require('design2.php');

?> 
