<html>

<head>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {

            $("#datepicker").datepicker();

        });
    </script>

    <title>SGR Home</title>
    <link rel="icon" type="image/jpg" href="logo2.jpg">
    <link rel="stylesheet" href="design.css">

    <div id="titlebar">
        <img id="logo" src="logomain.png" alt='' />
        <h1>Zuru Kenya SGR Tickets</h1>

        <?php
                    session_start();
                    if(!empty($_SESSION))
                    {
                        if($_SESSION['Name'] <> NULL)
                        {
                            echo  '<nav1 style="color:white; margin-left:400px; font: 19px Times New Roman; ">'  .$_SESSION['Name'].  '</nav1> ';
                ?>
            <form action="logout.php">
                <br>
                <nav1 id="login">
                    <a href="logout.php" style="font: 19px Times New Roman;">
                        <br>Logout</a>
                </nav1>
                <a href="admin.php#booked" style="font: 19px Times New Roman;">
                    <br>Admin page</a>
            </form>

            <?php
                        }
                        else
                        {
                ?>
                <a href="login.php" id="login" style="margin-left:500px; font: 19px Times New Roman;">Corporate Login</a>
                <?php
                        }
                    }
                    else
                    {
                ?>
                    <a href="login.php" id="login" style="margin-left:500px; font: 19px Times New Roman;">Corporate Login</a>

                    <?php
                    }
                ?>

    </div>
    <nav id="nav">
        <ul>
            <li><a href="#home" id="links">Home</a></li>
            <li><a href="book.php" id="links">Book a Ticket</a></li>
            <li><a href="#cancel" id="links">Personal booking</a></li>
            <li><a href="#schedules" id="links">Train Schedules</a></li>
            <li><a href="#contact" id="links">Contact Us</a></li>
        </ul>
    </nav>

</head>

<body>
    <span class="anchors" id="home"></span>
    <section id="homes" style="border-top:2px solid black;">
        <center>
            <div id="slide">
                <div class="slideshow-container">
                    <div class="mySlides fade">
                        <img src="t1.jpg" style="width:100%; max-height:460px; min-height:460px;">
                        <div class="text">SGR Crew</div>
                    </div>
                    <div class="mySlides fade">
                        <img src="t2.jpg" style="width:100%; max-height:460px; min-height:460px;">
                        <div class="text">Mombasa Terminus</div>
                    </div>
                    <div class="mySlides fade">
                        <img src="t3.jpg" style="width:100%; max-height:460px; min-height:460px;">
                        <div class="text">The SGR Train at Mtito Andei Train Station</div>
                    </div>
                    <div class="mySlides fade">
                        <img src="t4.jpg" style="width:100%; max-height:460px; min-height:460px;">
                        <div class="text">Nairobi Terminus at Night</div>
                    </div>
                    <div class="mySlides fade">
                        <img src="t5.jpg" style="width:100%; max-height:460px; min-height:460px;">
                        <div class="text">The SGR Train at Nairobi Train Station</div>
                    </div>
                    <div class="mySlides fade">
                        <img src="t6.jpg" style="width:100%; max-height:460px; min-height:460px;">
                        <div class="text">Passengers in the SGR Train</div>
                    </div>
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a> <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>

                <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                    <span class="dot" onclick="currentSlide(4)"></span>
                    <span class="dot" onclick="currentSlide(5)"></span>
                    <span class="dot" onclick="currentSlide(6)"></span>
                </div>
            </div>
        </center>
        <style>
            #slide {
                width: 100%;
            }
            
            * {
                box-sizing: border-box;
            }
            
            .mySlides {
                display: none;
            }
            
            .slideshow-container {
                width: 100%;
                margin: 0px;
                margin-left: 0px;
            }
            /* Next & previous buttons */
            
            .prev,
            .next {
                cursor: pointer;
                position: absolute;
                top: 50%;
                width: auto;
                padding: 16px;
                margin-top: -22px;
                color: white;
                font-weight: bold;
                font-size: 18px;
                transition: 0.6s ease;
                border-radius: 0 3px 3px 0;
            }
            /* Position the "next button" to the right */
            
            .next {
                right: 0;
                border-radius: 3px 0 0 3px;
            }
            
            .prev {
                left: 0;
                border-radius: 3px 0 0 3px;
            }
            /* On hover, add a black background color with a little bit see-through */
            
            .prev:hover,
            .next:hover {
                background-color: rgba(0, 0, 0, 0.8);
            }
            /* Caption text */
            
            .text {
                color: #f2f2f2;
                font-size: 15px;
                padding: 8px 12px;
                position: absolute;
                bottom: 8px;
                width: 100%;
                text-align: center;
            }
            /* The dots/bullets/indicators */
            
            .dot {
                cursor: pointer;
                height: 13px;
                width: 13px;
                margin: 0 2px;
                background-color: #bbb;
                border-radius: 50%;
                display: inline-block;
                transition: background-color 0.6s ease;
            }
            
            .active,
            .dot:hover {
                background-color: #717171;
            }
            /* Fading animation */
            
            .fade {
                -webkit-animation-name: fade;
                -webkit-animation-duration: 2s;
                animation-name: fade;
                animation-duration: 2s;
            }
            
            @-webkit-keyframes fade {
                from {
                    opacity: .4
                }
                to {
                    opacity: 1
                }
            }
            
            @keyframes fade {
                from {
                    opacity: .4
                }
                to {
                    opacity: 1
                }
            }
            /* On smaller screens, decrease text size */
            
            @media only screen and (max-width: 300px) {
                .text {
                    font-size: 11px
                }
            }
        </style>

        <script>
            var slideIndex = 0;
            showSlides();
            var slides, dots;

            function showSlides() {
                var i;
                slides = document.getElementsByClassName("mySlides");
                dots = document.getElementsByClassName("dot");
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                slideIndex++;
                if (slideIndex > slides.length) {
                    slideIndex = 1
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " active";
                setTimeout(showSlides, 5000); // Change image every 8 seconds
            }

            function plusSlides(position) {
                slideIndex += position;
                if (slideIndex > slides.length) {
                    slideIndex = 1
                } else if (slideIndex < 1) {
                    slideIndex = slides.length
                }
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                    slides[slideIndex - 1].style.display = "block";
                    dots[slideIndex - 1].className += " active";
                }
            }

            function currentSlide(index) {
                if (index > slides.length) {
                    index = 1
                } else if (index < 1) {
                    index = slides.length
                }
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                    slides[index - 1].style.display = "block";
                    dots[index - 1].className += " active";
                }
            }
        </script>
    </section>

    <span class="anchors" id="cancel"></span>
    <section id="bookeds" style="border-top:2px solid black; text-align:center; padding-bottom:20px;min-height:480px;">
        <h2>Search for your ticket using your ID Number</h2>
        <form method="post" action="home.php#cancel">
            <div class="col">
                <input type="text" name="search" class="textbox" placeholder="ID Number">
                <span class="focus-border">
                    <i></i>
                </span>
            </div>
            <input id="button" type="submit" name="find" value="Find Ticket" class="btn">
        </form>
        <?php

                                if(isset($_POST['find']))
                                {
                                    personalbooking();
                                }

            ?>

    </section>

    <span class="anchors" id="schedules"></span>
    <section id="schedulesss" style="border-top:2px solid black; min-height:480px;">
        <h2 style="text-align:center;">Search for a train</h2>
        <div>
            <form id="search" action="home.php#schedules" method="post">
                <div class="col">
                    <select name="dep" class="textbox">
                        <option style="display:none;" selected>Departure Station/Unakotoka</option>
                        <option value="Mombasa">Mombasa</option>
                        <option value="Miasenyi"> Miasenyi</option>
                        <option value="Mtito Andei"> Mtito Andei</option>
                        <option value="Voi"> Voi</option>
                        <option value="Mariakani"> Mariakani</option>
                        <option value="Kibwezi"> Kibwezi</option>
                        <option value="Emali">Emali</option>
                        <option value="Nairobi"> Nairobi</option>
                        <option value="Athi river"> Athi river</option>
                    </select>
                    <span class="focus-border">
                        <i></i>
                        </span>
                </div>
                <div class="col">
                    <select name="dest" class="textbox">
                        <option style="display:none;" selected>Destination/Unakoenda</option>
                        <option value="Mombasa">Mombasa</option>
                        <option value="Miasenyi"> Miasenyi</option>
                        <option value="Mtito Andei"> Mtito Andei</option>
                        <option value="Voi"> Voi</option>
                        <option value="Mariakani"> Mariakani</option>
                        <option value="Kibwezi"> Kibwezi</option>
                        <option value="Emali">Emali</option>
                        <option value="Nairobi"> Nairobi</option>
                        <option value="Athi river"> Athi river</option>
                    </select>
                    <span class="focus-border">
                        <i></i>
                        </span>
                </div>
                <div class="col">
                    <input type="text" name="day" class="textbox" placeholder="Date/Tarehe" id="datepicker">
                    <span class="focus-border">
                            <i></i>
                        </span>
                </div>
                <input id="button" type="submit" name="search" value="Search for a train" class="btn">
            </form>
        </div>
        <?php
                                if(isset($_POST['search']))
                                {
                                    trainsearch();
                                }

            ?>

    </section>

    <span class="anchors" id="contact"></span>
    <section id="contacts" style="border-top:2px solid black; ">
        <h2 style="color:black;font:20px Comic Sans MS; text-align:center;">Reach us using any of the platforms shown below</h2>
        <main style="display:-webkit-box;-webkit-box-orient:horizontal; text-align:center;">

            <div style="font:20px Comic Sans MS;color:black;text-align:left;margin:0px;margin 0px -60px;">
                Business Name:
                <br>
                <input type="text" class="css-input" value="Zuru Kenya" disabled style="background-color:firebrick;">
                <br>
                <br> Contact Number:
                <br>
                <input type="text" class="css-input" value="0715 944 071" disabled style="background-color:firebrick;">
                <br>
                <br> Contact Number:
                <br>
                <input type="text" class="css-input" value="0790 549 955" disabled style="background-color:firebrick;">
                <br>
                <br> Our email:
                <br>
                <input type="text" class="css-input" value="zurukenya@gmail.com" disabled style="background-color:firebrick;">
                <br>
                <br>
            </div>
            <div style="margin:0px 86px;font:20px Comic Sans MS;color:black;">
                Offices:
                <br>
                <input type="text" class="css-input" value="Mama Ngina Street" disabled style="background-color:firebrick;">
                <br>
                <br> Building:
                <br>
                <input type="text" class="css-input" value="Ushuhuda Plaza" disabled style="background-color:firebrick;">
                <br>
                <br> Floor:
                <br>
                <input type="text" class="css-input" value="1st Floor" disabled style="background-color:firebrick;">
                <br>
                <br>
            </div>
            <div style="margin:0px 40px;font:20px Comic Sans MS;color:black;">
                Twitter:
                <br>
                <input type="text" class="css-input" value="@zurukenya" disabled style="background-color:firebrick;">
                <br>
                <br> Facebook:
                <br>
                <input type="text" class="css-input" value="Zuru Kenya Inc" disabled style="background-color:firebrick;">
                <br>
                <br> Instagram:
                <br>
                <input type="text" class="css-input" value="Zuru_Kenya" disabled style="background-color:firebrick;">
                <br>
                <br>
            </div>
        </main>
    </section>
</body>

</html>

<?php
function personalbooking()
{
     if(!empty($_POST))
    {
        include 'connect.php';
        $search = $_POST['search'];

         $searchquery = "SELECT * FROM tickets WHERE id_number = '$search'";
         $queryresult = mysqli_query($db, $searchquery);
         $booking=mysqli_fetch_array($queryresult);
         ?>
    <?php 
         if (empty($booking))
         {
            echo " <h1 style='margin-top:50px;'>You have no active bookings</h1>";
         }
        else
        { 
            ?>
        <div>
            <h3 style="text-align: center;"> Train Schedules </h3>
            <table border=1; width=100%; class="data-table" style="padding-top:0px;">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>ID Number</th>
                        <th>Ticket Number</th>
                        <th>Train Number</th>
                        <th>Ticket type</th>
                        <th>Station of Departure</th>
                        <th>Station of Arrival</th>
                        <th>Time of Departure</th>
                        <th>Time of Arrival</th>
                        <th>Date(MM/DD/YYYY)</th>
                        <th>Class</th>
                        <th>Adults</th>
                        <th>Children</th>
                        <th>Number of tickets</th>
                        <th>Luggage</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody style="text-align:center;">
                    <?php foreach ($queryresult as $bookings): ?>
                        <tr>
                            <td><a href="update code.php?id=<?php echo ($bookings['id_number']); ?>" style="color:Red;">Update details</a></td>
                            <td><a href="cancel.php?id=<?php echo ($bookings['id_number']); ?>" style="color:Red;">Cancel Booking</a></td>
                            <td><a href="ticketonly.php?id=<?php echo ($bookings['id_number']); ?>" style="color:Red;">View Ticket</a></td>
                            <td>
                                <?php echo $bookings['id_number']; ?>
                            </td>
                            <td>
                                <?php echo $bookings['ticket_number']; ?>
                            </td>
                            <td>
                                <?php echo $bookings['train_number']; ?>
                            </td>
                            <td>
                                <?php echo $bookings['ticket_type']; ?>
                            </td>
                            <td>
                                <?php echo $bookings['departure_station']; ?>
                            </td>
                            <td>
                                <?php echo $bookings['destination_station']; ?>
                            </td>
                            <td>
                                <?php echo $bookings['departure_time']; ?>
                            </td>
                            <td>
                                <?php echo $bookings['arrival_time']; ?>
                            </td>
                            <td>
                                <?php echo $bookings['date']; ?>
                            </td>
                            <td>
                                <?php echo $bookings['Class']; ?>
                            </td>
                            <td>
                                <?php echo $bookings['adults']; ?>
                            </td>
                            <td>
                                <?php echo $bookings['children']; ?>
                            </td>
                            <td>
                                <?php echo $bookings['number_of_tickets']; ?>
                            </td>
                            <td>
                                <?php echo $bookings['luggage']; ?>
                            </td>
                            <td>
                                <?php echo $bookings['total_price']; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                </tbody>
            </table>

        </div>
        <?php 
        }
     }
}

function trainsearch()
{
    if(!empty($_POST))
    {
        include 'connect.php';
        $dep = $_POST['dep'];
        $dest = $_POST['dest'];
        $day = $_POST['day'];

        $profile = "SELECT * FROM train_schedules WHERE departure_station = '$dep' && destination_station = '$dest' && date = '$day'";
        $query = mysqli_query($db, $profile);
        $train=mysqli_fetch_array($query);
        //var_dump($train);
        ?>
            <?php

        $date = $train['date'];

        //Obtain the different parts of the booked ticket's date
        $day = substr($date, 3, 2);
        $month = substr($date, 0, 2);
        $year = substr($date, -2);

        //Convert the different parts obtained above into integers for the purpose of calculations
        $int_day = (int)$day;
        $int_month = (int)$month;
        $int_year = (int)$year;

        //Obtain the current day, month and year
        $current_day =  (int)date("d");
        $current_month = (int)date("m");
        $current_year = (int)date("y");

        if ($dep == $dest)
        {
            echo " <h1 style='margin-top:50px; text-align:center;'>Departure location cannot be the same as Destination location</h1>";
        }
        else
        {

        if($date != NULL)
        {
            if($current_year > $int_year || $current_month > $int_month && $current_year == $int_year || $current_day > $int_day && $current_year == $int_year && $current_month == $int_month)
             {
                 echo " <h1 style='margin-top:50px; text-align:center;'>The date entered has passed</h1>";
             }
             else
             {
                 if($current_day == $int_day)
                 {
                      echo " <h1 style='margin-top:50px; text-align:center;'>You cannot book a ticket on the same day of departure</h1>";
                 }
                 else
                 {
                    if (empty($train))
                    {
                        echo " <h1 style='margin-top:0px; text-align:center;'>No Trains have been scheduled</h1>";
                    }
                    else
                    { 
                        ?>
                <div>
                    <h3 style="text-align: center;"> Train Schedules </h3>
                    <table border=1; width=100%; class="data-table" style="margin-top:0px;">
                        <thead>
                            <tr>
                                <th>Train Number</th>
                                <th>Number of seats</th>
                                <th>Seats Available</th>
                                <th>Station of Departure</th>
                                <th>Station of Arrival</th>
                                <th>Time of Departure</th>
                                <th>Time of Arrival</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody style="text-align:center;">
                            <?php foreach ($query as $trains): ?>
                                <tr>
                                    <td>
                                        <?php echo $trains['train_number']; ?>
                                    </td>
                                    <td>
                                        <?php echo $trains['number_of_seats']; ?>
                                    </td>
                                    <td>
                                        <?php echo $trains['seats_available']; ?>
                                    </td>
                                    <td style="text-align:center;">
                                        <?php echo $trains['departure_station']; ?>
                                    </td>
                                    <td>
                                        <?php echo $trains['destination_station']; ?>
                                    </td>
                                    <td>
                                        <?php echo $trains['departure_time']; ?>
                                    </td>
                                    <td>
                                        <?php echo $trains['arrival_time']; ?>
                                    </td>
                                    <td>
                                        <?php echo $trains['date']; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php 
                        }
                }
             }
         }

        else
        {
            echo " <h1 style='margin-top:0px; text-align:center;'>No Trains have been scheduled</h1>";
        }
    }
}
}

?>