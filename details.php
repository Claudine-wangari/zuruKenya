<?php

	require 'connect.php';
    if(isset ($_GET['id']))
    {
        $retain = $_GET['id'];
        $query = "SELECT * FROM train_schedules WHERE train_number = '".$_GET['id']."'";
        $querys = mysqli_query($db, $query);
        $fill = mysqli_fetch_array($querys);

        $trainno = $fill['train_number'];
        $dep = $fill['departure_station'];
        $dest= $fill['destination_station'];
        $dtime = $fill['departure_time'];
        $atime = $fill['arrival_time'];
        $day = $fill['date'];

        $trail  = "SELECT * FROM `tickets` WHERE `id_number` = 0 ";
        $queryss = mysqli_query($db, $trail);
        $fills = mysqli_fetch_array($queryss);
        if($fills>0)
        {

        }
        else
        {
            $profile = "INSERT INTO `tickets`(`id_number`, `ticket_number`, `train_number`, `ticket_type`, `departure_station`, `destination_station`, `departure_time`, `arrival_time`, `date`, `Class`, `adults`, `children`, `number_of_tickets`, `luggage`, `total_price`) VALUES ('','','$trainno','','$dep','$dest','$dtime','$atime','$day','','','','','','')";
            $profiles = mysqli_query($db, $profile);
        }

    }
?>
    <html>

    <head>
        <title>SGR Booking Details</title>
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
                <li><a href="home.php" id="links">Home</a></li>
                <li><a href="book.php" id="links">Book a Ticket</a></li>
                <li><a href="home.php#cancel" id="links">Cancel a booking</a></li>
                <li><a href="home.php#schedules" id="links">Train Schedules</a></li>
                <li><a href="home.php#contact" id="links">Contact Us</a></li>
            </ul>
        </nav>
    </head>

    <body>
        <form onchange="calc()" method="post" action="details.php">
            <div id="details">
                <div id="top">
                    <!--
                    <div id="top1">
                        <div id="label">Ticket Number</div>
                        <div class="col">
                            <input type="text" name="password" class="textbox" placeholder="Name" value = "12345678" disabled>
                            <span class="focus-border">
                                <i></i>
                            </span>
                        </div>
                    </div>
-->
                    <div id="top2">
                        <div id="label">Train Number</div>
                        <div class="col">
                            <input type="text" name="tnumber" class="textbox" placeholder="Name" value="<?php echo $fill['train_number']; ?>" disabled>
                            <span class="focus-border">
                                <i></i>
                            </span>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div id="top">
                    <div id="first">
                        <div id="label">Departure Station</div>
                        <div class="col">
                            <input type="text" name="dep" class="textbox" placeholder="Name" value="<?php echo $fill['departure_station']; ?>" disabled>
                            <span class="focus-border">
                                <i></i>
                            </span>
                        </div>
                        <br>
                        <br>
                        <div id="label">Destination Station</div>
                        <div class="col">
                            <input type="text" name="dest" class="textbox" placeholder="Name" value="<?php echo $fill['destination_station']; ?>" disabled>
                            <span class="focus-border">
                                <i></i>
                            </span>
                        </div>
                    </div>
                    <div id="second">
                        <div id="label">Departure Time</div>
                        <div class="col">
                            <input type="text" name="dtime" class="textbox" placeholder="Name" value="<?php echo $fill['departure_time']; ?>" disabled>
                            <span class="focus-border">
                                <i></i>
                            </span>
                        </div>
                        <br>
                        <br>
                        <div id="label">Arrival Time</div>
                        <div class="col">
                            <input type="text" name="atime" class="textbox" placeholder="Name" value="<?php echo $fill['arrival_time']; ?>" disabled>
                            <span class="focus-border">
                                <i></i>
                            </span>
                        </div>
                    </div>
                    <div id="third">
                        <div id="label">Date</div>
                        <div class="col">
                            <input type="text" name="day" class="textbox" placeholder="Name" value="<?php echo $fill['date']; ?>" disabled>
                            <span class="focus-border">
                                <i></i>
                            </span>
                        </div>
                        <div id="label">Seats Available</div>
                        <div class="col">
                            <input type="text" name="day" class="textbox" placeholder="Name" value="<?php echo $fill['seats_available']; ?>" disabled>
                            <span class="focus-border">
                                <i></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div id="top">
                    <div id="personal">
                        <fieldset>
                            <legend>Personal Details</legend>
                            <div id="label">ID Number</div>
                            <div class="col">
                                <input type="text" name="ids" class="textbox" placeholder="ID Number">
                                <span class="focus-border">
                                    <i></i>
                                </span>
                            </div>
                            <div id="label">Name</div>
                            <div class="col">
                                <input type="text" name="name" class="textbox" placeholder="Name">
                                <span class="focus-border">
                                    <i></i>
                                </span>
                            </div>
                            <div id="label">Age</div>
                            <div class="col">
                                <input type="text" name="age" class="textbox" placeholder="Age">
                                <span class="focus-border">
                                    <i></i>
                                </span>
                            </div>
                            <div id="label">Email</div>
                            <div class="col">
                                <input type="text" name="email" class="textbox" placeholder="Email">
                                <span class="focus-border">
                                    <i></i>
                                </span>
                            </div>
                            <div id="label">Phone Number</div>
                            <div class="col">
                                <input type="text" name="no" class="textbox" placeholder="Phone Number">
                                <span class="focus-border">
                                    <i></i>
                                </span>
                            </div>
                        </fieldset>
                    </div>
                    <div id="train" style="margin-top:50px;">
                        <fieldset>
                            <legend>Travel Details</legend>
                            <div id="label">Class</div>
                            <div class="col">
                                <select name="class" class="textbox" onchange="pricing(this)" id="classchosen">
                                    <option style="display:none;" selected>Class</option>
                                    <option value="Economy"> Economy</option>
                                    <option value="Business">Business</option>
                                </select>
                                <span class="focus-border">
                                <i></i>
                                </span>
                            </div>
                            <div id="label">Ticket Type</div>
                            <div class="col">
                                <select name="ttype" class="textbox" onchange="trip(this)">
                                    <option style="display:none;" selected>Type</option>
                                    <option value="oneway">One-Way</option>
                                    <option value="roundtrip"> Roundtrip</option>
                                </select>
                                <span class="focus-border">
                                <i></i>
                                </span>
                            </div>
                            <div id="label">Adults (12 years and above)</div>
                            <div class="col">
                                <input type="number" name="adult" class="textbox" placeholder="Number" id="adults" onkeydown="calc()" value="0">
                                <span class="focus-border">
                                    <i></i>
                                </span>
                            </div>
                            <div id="label">Children (3-11years)</div>
                            <div class="col">
                                <input type="number" name="child" class="textbox" placeholder="Number" id="children" onkeydown="calc()" value="0">
                                <span class="focus-border">
                                    <i></i>
                                </span>
                            </div>
                            <div id="label">Number of tickets</div>
                            <div class="col">
                                <input type="number" name="nots" class="textbox" placeholder="Number of tickets" id="notickets" disabled>
                                <span class="focus-border">
                                    <i></i>
                                </span>
                            </div>
                            <div id="label">Luggage (Kgs)</div>
                            <div class="col">
                                <input type="number" name="lugg" class="textbox" placeholder="Weight in Kgs" id="luggage" onkeydown="calc()" value="0">
                                <span class="focus-border">
                                    <i></i>
                                </span>
                            </div>
                        </fieldset>
                    </div>
                    <div id="train" style="margin-top:50px;">
                        <fieldset>
                            <legend>Pricing details</legend>
                            <div id="label">Price per ticket (Kshs)</div>
                            <div class="col">
                                <input type="number" name="ppt" class="textbox" placeholder="Price" id="price" disabled>
                                <span class="focus-border">
                                    <i></i>
                                </span>
                            </div>
                            <div id="label">Price of tickets (Kshs)</div>
                            <div class="col">
                                <input type="number" name="pot" class="textbox" placeholder="Amount" disabled id="ttotal">
                                <span class="focus-border">
                                    <i></i>
                                </span>
                            </div>
                            <div id="label">Additional Costs (Kshs)</div>
                            <div class="col">
                                <input type="number" name="addcost" class="textbox" placeholder="Amount" disabled id="acosts">
                                <span class="focus-border">
                                    <i></i>
                                </span>
                            </div>
                            <div id="label">Total (Kshs)</div>
                            <div class="col">
                                <input type="number" name="total" class="textbox" placeholder="Amount" disabled id="totals">
                                <span class="focus-border">
                                    <i></i>
                                </span>

                            </div>

                        </fieldset>
                        <div class="col" id="butn">
                            <input id="button" type="submit" name="submit" value="Pay" class="btn" style="width:100px;" onclick="return confirm('Would you like to proceed to payment?')">
                            <span class="focus-border">
                            <i></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </body>

    </html>
    <?php

        ?>

        <script>
            function pricing(t) {
                var priceperticket = document.getElementById("price");
                if (t.value === "Economy") {
                    priceperticket.valueAsNumber = 700
                } else {
                    priceperticket.valueAsNumber = 3000
                }
            }

            function trip(a) {
                var priceperticket = document.getElementById("price");
                if (a.value === "roundtrip") {
                    var types = document.getElementById("classchosen");
                    if (priceperticket.valueAsNumber = 700 && types.value === "Economy") {
                        priceperticket.valueAsNumber = 1250
                    } else
                    if (priceperticket.valueAsNumber = 3000 || types.value === "Business") {
                        priceperticket.valueAsNumber = 5250
                    }
                } else if (a.value === "oneway") {
                    var types = document.getElementById("classchosen");
                    if (types.value === "Economy") {
                        priceperticket.valueAsNumber = 700
                    } else
                    if (types.value === "Business") {
                        priceperticket.valueAsNumber = 3000
                    }
                }
            }

            function calc() {
                var ticketstotal = document.getElementById("ttotal");
                var addcost = document.getElementById("acosts");
                var total = document.getElementById("totals");
                var adults = document.getElementById("adults");
                var child = document.getElementById("children");
                var no = document.getElementById("notickets");
                var priceperticket = document.getElementById("price");
                var lugg = document.getElementById("luggage");

                no.valueAsNumber = adults.valueAsNumber + child.valueAsNumber
                ticketstotal.valueAsNumber = (adults.valueAsNumber * priceperticket.valueAsNumber) + (child.valueAsNumber * (priceperticket.valueAsNumber / 2))
                if (lugg.valueAsNumber <= 50) {
                    addcost.valueAsNumber = 0
                    total.value = ticketstotal.valueAsNumber + addcost.valueAsNumber
                } else {
                    addcost.valueAsNumber = (lugg.valueAsNumber - 50) * 200
                    total.valueAsNumber = ticketstotal.valueAsNumber + addcost.valueAsNumber
                }

            }

            document.cookie = "myJavascriptVar = " + no.valueAsNumber
            document.cookie = "myJavascriptVarr = " + total.valueAsNumber
        </script>

        <?php

if(!empty($_POST))
{

    include 'connect.php';

    $id = $_POST['ids'];
    $name = $_POST['name'];
    $age  = $_POST['age'];
    $email = $_POST['email'];
    $no = $_POST['no'];
    $ticketno = rand(1,10000000);
    $ttype = $_POST['ttype'];
    $class = $_POST['class'];
    $adults = $_POST['adult'];
    $child = $_POST['child'];
    $not = $adults + $child;
    $lugg = $_POST['lugg'];
    $search = 0;

    if($lugg >= 51)
    {
        $addcost = ($lugg - 50)*200;
    }
    else
    {
        $addcost = 0;
    }

    if ($class == "Economy")
    {
        if($ttype == "oneway")
        {
            $ppt = 700;
        }
        else
        {
            $ppt = 1250;
        }
        $pot = ($adults*$ppt)+($child*($ppt/2));
    }
    else
    {
        if($ttype == "oneway")
        {
            $ppt = 3000;
        }
        else
        {
            $ppt = 5250;
        }
        $pot = ($adults*$ppt)+($child*($ppt/2));
    }

    $total = $pot + $addcost;

    $ticket = "SELECT * FROM `tickets` WHERE `id_number` = 0";
    $tickets = mysqli_query($db, $ticket);
    $hold = mysqli_fetch_array($tickets);
    $identifier = $hold['train_number'];//Holds the ID of the train

    $trainticket = "SELECT * FROM `train_schedules` WHERE `train_number` = '$identifier'";
    $traintickets = mysqli_query($db, $trainticket);
    $holding = mysqli_fetch_array($traintickets);

    $current = $holding['seats_available'];//Picks the numberseats available from the train being booked

    if ($id == "" || $ticketno == "" || $ttype == "" || $class == "" || $adults == "" || $child == "" || $lugg == "" )
    {
        //echo("<script>alert('You cannot have empty fields')</script>");
        //echo("<script>window.location = 'details.php';</script>");
    }
    else
    {
        $new = $current - $not;//Calculates the new number of seats available

        if($new < 0)
        {
            echo("<script>alert('You cannot exceed number of seats available')</script>");
            echo("<script>window.location = 'book.php';</script>");

            $delete = mysqli_query($db,"DELETE FROM `tickets` WHERE `id_number` = 0");

        }
        else
        {
            $trial = "UPDATE `tickets` SET `id_number`='$id',`ticket_number`='$ticketno',`ticket_type`='$ttype',`Class`='$class',`adults`='$adults',`children`='$child',`number_of_tickets`='$not',`luggage`='$lugg',`total_price`='$total' WHERE `id_number` = '$search' ";

            $cust = "INSERT INTO `customers`(`id_number`, `name`, `age`, `email`, `phone_number`) VALUES ('$id','$name','$age','$email','$no') ";
            $custquery = mysqli_query($db, $cust);
            $booking = mysqli_fetch_array($custquery);

            $trainticketupdate = "UPDATE `train_schedules` SET `seats_available`= '$new' WHERE `train_number` = '$identifier' ";
            $trainticketupdates = mysqli_query($db, $trainticketupdate); 

            //var_dump($new);

            if ($db->query($trial) === TRUE) 
            {
                //echo("<script>alert('Update worked')</script>");
                //echo("<script>window.location = 'home.php #home';</script>");
            } 
            else 
            {
                //echo("<script>alert('Not yet')</script>") . $db->error;
                //echo("<script>window.location = 'details.php';</script>");
            }
        }        
    }

    if ($db->query($trial) === TRUE) 
    {
        //echo("<script>alert('Successfuly booked')</script>");
        echo  ("<script>window.location.href = 'Pesapal-iframe.php?id=$id'</script>"); 

    } 
    else 
    {
        echo("<script>alert('Failed to book booked')</script>") . $db->error;
        echo("<script>window.location = 'details.php';</script>");
    }
}

?>