<?php

    require('dbconnection.php');
    require('design.php');


    $resultsperpage=4;
    
    if(!isset($_GET['page'])){
        $page=1;
    }else{
        $page=$_GET['page'];
    }

    $va=($page-1)*4;


        

  



    $sql = "SELECT * FROM propertydetails3 LIMIT $va,4";
    $result = $conn->query($sql);
    $row1 = $result->fetch_assoc();
    $row2 = $result->fetch_assoc();
    $row3 = $result->fetch_assoc();
    $row4 = $result->fetch_assoc();

    $name1=$row1["name"];
    $image1=$row1["image"];
    $price1=$row1["price"];
    $bed1=$row1["bedrooms"];
    $bath1=$row1["bathrooms"];
    $location1=$row1["location"];
    $city1=$row1["city"];
    $name2=$row2["name"];
    $image2=$row2["image"];
    $price2=$row2["price"];
    $bed2=$row2["bedrooms"];
    $bath2=$row2["bathrooms"];
    $location2=$row2["location"];
    $city2=$row2["city"];
    $name3=$row3["name"];
    $image3=$row3["image"];
    $price3=$row3["price"];
    $bed3=$row3["bedrooms"];
    $bath3=$row3["bathrooms"];
    $location3=$row3["location"];
    $city3=$row3["city"];
    $name4=$row4["name"];
    $image4=$row4["image"];
    $price4=$row4["price"];
    $bed4=$row4["bedrooms"];
    $bath4=$row4["bathrooms"];
    $location4=$row4["location"];
    $city4=$row4["city"];
?>

<!DOCTYPE html>
<html>   
<head>
    <link rel="stylesheet" href="stylesheets/styles.css" type="text/css">
</head>

<body>
    
    <img id="realbuylogo2" src="images/web/Logo.png" alt="Logo">
    <div class="properties">
        <h3>Properties</h3>



        <div class="menu">
            <form class="form4" action="try3.php" method="post">
            <input id='location' type="text"  placeholder="LOCATION(ANY)" name="location" >   
            <div class="propertytypedrop" >
                <select name="propertytype">
                    <option value="0">PROPERTY TYPE:</option>
                    <option value="1">COMMERCIAL</option>
                    <option value="2">RESIDENTIAL</option>
                    <option value="3">LAND & PLOT</option>
                </select>
            </div>

            <div class="purchasetypedrop" >
                <select name="purchasetype">
                    <option value="0">PURCHASE TYPE:</option>
                    <option value="1">SELL</option>
                    <option value="2">RENT</option>
                </select>
            </div>

<div class="sortbydrop" >
    <select name="sortby">
        <option value="0">SORT BY:</option>
        <option value="1">MOST RECENT</option>
        <option value="2">PRICE LOW TO HIGH</option>
        <option value="3">PRICE HIGH TO LOW</option>
    </select>
            </div>
            <button id="searchproperty" >Search</button>
            </form>  
            <a href="try2.php?page=<?php echo $page-1; ?>"><img id="F" src="images/properties/web/Prev_Arrow.png">
            <a href="try2.php?page=<?php echo $page+1; ?>"><img id="G" src="images/properties/web/Next_Arrow.png">       
        </div>

        <ul>

            <li>
                <a href="details.php"><img id="K" src="images/uploads/<?php echo $image1?>"></a><br>
                
                <div class="p555">
                    <p class="p5">₹ <?php echo $price1?></p><br>
                    <p class="p55">TYPE & LOCATION: </p><br>
                    <p class="p55">PLOT AREA: </p><br>
                    <p class="p55">SOCIETY:</p><br>
                    <p class="p55">DESCRIPTION: </p><br>
                    <p class="p55">POSTED:</p><br>
                </div>
                <div class="contact">
                    <a href="design.php"><img id="mail" src="images/contact/web/Mail_white.png"></a>
                    <a href="design.php" style="text-decoration:none;"><pre class="contactdetails">SEND MAIL                      </pre></a>
                    <a href="design.php"><img id="mail" src="images/contact/web/Call_white.png"></a>
                    <a href="design.php" style="text-decoration:none;"><pre class="contactdetails">PHONE NUMBER                      </pre></a>
                    <a href="design.php"><img id="mail" src="images/contact/web/Fav_white.png"></a>
                    <a href="design.php" style="text-decoration:none;"><pre class="contactdetails">SHORTLIST                      </pre></a>
                    <a href="design.php"><img id="mail" src="images/contact/web/Map_white.png"></a>
                    <a href="design.php" style="text-decoration:none;"><pre class="contactdetails">MAP    </pre>
                </div>

            </li>
            <li>
                <a href="details.php"><img id="K" src="images/uploads/<?php echo $image2?>"></a>
                <div class="p555">
                    <p class="p5">₹ <?php echo $price1?></p><br>
                    <p class="p55">TYPE & LOCATION: </p><br>
                    <p class="p55">PLOT AREA: </p><br>
                    <p class="p55">SOCIETY:</p><br>
                    <p class="p55">DESCRIPTION: </p><br>
                    <p class="p55">POSTED:</p><br>
                </div>               
                <div class="contact">
                <a href="design.php"><img id="mail" src="images/contact/web/Mail_white.png"></a>
                    <a href="design.php" style="text-decoration:none;"><pre class="contactdetails">SEND MAIL                      </pre></a>
                    <a href="design.php"><img id="mail" src="images/contact/web/Call_white.png"></a>
                    <a href="design.php" style="text-decoration:none;"><pre class="contactdetails">PHONE NUMBER                      </pre></a>
                    <a href="design.php"><img id="mail" src="images/contact/web/Fav_white.png"></a>
                    <a href="design.php" style="text-decoration:none;"><pre class="contactdetails">SHORTLIST                      </pre></a>
                    <a href="design.php"><img id="mail" src="images/contact/web/Map_white.png"></a>
                    <a href="design.php" style="text-decoration:none;"><pre class="contactdetails">MAP    </pre>
                </div>

            </li>
            <li>
                <a href="details.php"><img id="K" src="images/uploads/<?php echo $image3?>"></a>
                <div class="p555">
                    <p class="p5">₹ <?php echo $price1?></p><br>
                    <p class="p55">TYPE & LOCATION: </p><br>
                    <p class="p55">PLOT AREA: </p><br>
                    <p class="p55">SOCIETY:</p><br>
                    <p class="p55">DESCRIPTION: </p><br>
                    <p class="p55">POSTED:</p><br>
                </div>
                <div class="contact">
                <a href="design.php"><img id="mail" src="images/contact/web/Mail_white.png"></a>
                    <a href="design.php" style="text-decoration:none;"><pre class="contactdetails">SEND MAIL                      </pre></a>
                    <a href="design.php"><img id="mail" src="images/contact/web/Call_white.png"></a>
                    <a href="design.php" style="text-decoration:none;"><pre class="contactdetails">PHONE NUMBER                      </pre></a>
                    <a href="design.php"><img id="mail" src="images/contact/web/Fav_white.png"></a>
                    <a href="design.php" style="text-decoration:none;"><pre class="contactdetails">SHORTLIST                      </pre></a>
                    <a href="design.php"><img id="mail" src="images/contact/web/Map_white.png"></a>
                    <a href="design.php" style="text-decoration:none;"><pre class="contactdetails">MAP    </pre>
                </div>

            </li> 
            <li>
                <a href="details.php"><img id="K" src="images/uploads/<?php echo $image4?>"></a>
                <div class="p555">
                    <p class="p5">₹ <?php echo $price1?></p><br>
                    <p class="p55">TYPE & LOCATION: </p><br>
                    <p class="p55">PLOT AREA: </p><br>
                    <p class="p55">SOCIETY:</p><br>
                    <p class="p55">DESCRIPTION: </p><br>
                    <p class="p55">POSTED:</p><br>
                </div>
                <div class="contact">
                <a href="design.php"><img id="mail" src="images/contact/web/Mail_white.png"></a>
                    <a href="design.php" style="text-decoration:none;"><pre class="contactdetails">SEND MAIL                      </pre></a>
                    <a href="design.php"><img id="mail" src="images/contact/web/Call_white.png"></a>
                    <a href="design.php" style="text-decoration:none;"><pre class="contactdetails">PHONE NUMBER                      </pre></a>
                    <a href="design.php"><img id="mail" src="images/contact/web/Fav_white.png"></a>
                    <a href="design.php" style="text-decoration:none;"><pre class="contactdetails">SHORTLIST                      </pre></a>
                    <a href="design.php"><img id="mail" src="images/contact/web/Map_white.png"></a>
                    <a href="design.php" style="text-decoration:none;"><pre class="contactdetails">MAP    </pre>
                </div>
            </li>
        </ul>        
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
        a.setAttribute("class", "select-selected3");
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
        a.setAttribute("class", "select-selected4");
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


