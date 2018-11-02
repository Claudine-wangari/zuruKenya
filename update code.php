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

    <title>SGR Booking</title>
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
                <a href="login.php" id="login" style="margin-left:400px; font: 19px Times New Roman;">Corporate Login</a>
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
            <li><a href="home.php#cancel" id="links">Back to Home</a></li>
        </ul>
    </nav>
</head>

<body>
    <div style="margin-top:55px;"></div>
    <?php
    require 'connect.php';
    //if(isset ($_GET['id']))
    //{
        $query = "SELECT * FROM tickets WHERE id_number = '".$_GET['id']."'";
        $querys = mysqli_query($db, $query);
        $fill = mysqli_fetch_array($querys);

        $train = $fill['train_number'];
        $newid = $fill['id_number'];
        $oldnot = $fill['number_of_tickets'];

        $customerdetails = mysqli_query($db, "SELECT * FROM `customers` WHERE id_number = '".$_GET['id']."'");
        $customerhold = mysqli_fetch_array($customerdetails); 

        //var_dump($customerhold);

    ?>
        <form onchange="calc()" method="post" id="updateform">
            <center>
                <h1>Make your adjustments here</h1></center>
            <div id="details" style="margin-top:-30px;">
                <div id="top">
                    <div id="personal" style="margin-top:0px;">
                        <fieldset>
                            <legend>Personal Details</legend>
                            <div id="label">ID Number</div>
                            <div class="col">
                                <input type="text" name="ids" class="textbox" placeholder="ID Number" value="<?php echo $customerhold['id_number'];?>" disabled>
                                <span class="focus-border">
                                    <i></i>
                                </span>
                            </div>
                            <div id="label">Name</div>
                            <div class="col">
                                <input type="text" name="name" class="textbox" placeholder="Name" value="<?php echo $customerhold['name'];?>">
                                <span class="focus-border">
                                    <i></i>
                                </span>
                            </div>
                            <div id="label">Age</div>
                            <div class="col">
                                <input type="text" name="age" class="textbox" placeholder="Age" value="<?php echo $customerhold['age'];?>">
                                <span class="focus-border">
                                    <i></i>
                                </span>
                            </div>
                            <div id="label">Email</div>
                            <div class="col">
                                <input type="text" name="email" class="textbox" placeholder="Email" value="<?php echo $customerhold['email'];?>">
                                <span class="focus-border">
                                    <i></i>
                                </span>
                            </div>
                            <div id="label">Phone Number</div>
                            <div class="col">
                                <input type="text" name="no" class="textbox" placeholder="Phone Number" value="<?php echo $customerhold['phone_number'];?>">
                                <span class="focus-border">
                                    <i></i>
                                </span>
                            </div>
                        </fieldset>
                    </div>
                    <div id="train" style="margin-top:0px;">
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
                    <div id="train" style="margin-top:0px;">
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
                            <input id="button" type="submit" name="now" value="Update" class="btn" style="width:100px;">
                            <span class="focus-border">
                            <i></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <?php
  if(isset($_POST['now']))
  {
    include 'connect.php';

    $name = $_POST['name'];
    $age  = $_POST['age'];
    $email = $_POST['email'];
    $no = $_POST['no'];
    $ttype = $_POST['ttype'];
    $class = $_POST['class'];
    $adults = $_POST['adult'];
    $child = $_POST['child'];
    $not = $adults + $child;
    $lugg = $_POST['lugg'];

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

    $details = mysqli_query($db, "SELECT * FROM `train_schedules` WHERE `train_number` = '$train'");
    $dhold = mysqli_fetch_array($details); 
    $oldticket = $dhold['seats_available'];

    $change = ($oldticket + $oldnot) -$not;
    if($change<0)
    {
        echo("<script>alert('You cannot book more tickets than there are available seats')</script>");
        echo("<script>window.location = 'home.php#cancel';</script>");
    }
    else
    {
        $sql = "UPDATE `tickets` SET `id_number`='$newid',`ticket_type`='$ttype',`Class`='$class',`adults`='$adults',`children`='$child',`number_of_tickets`='$not',`luggage`='$lugg',`total_price`='$total' WHERE `id_number` = '$newid'";
        $updatetrainquery = mysqli_query($db,$sql);

        $updatecustomers = mysqli_query($db,"UPDATE `customers` SET `id_number`='$newid',`name`='$name',`age`='$age',`email`='$email',`phone_number`='$no' WHERE `id_number` = '$newid'");

        $ticketcountupdate = mysqli_query($db,"UPDATE `train_schedules` SET `seats_available`='$change' WHERE `train_number`='$train'");  

    }
      if ($db->query($sql) === TRUE && $db->query($sql) === TRUE && $db->query($sql) === TRUE) 
    {
        echo("<script>alert('Details Updated Successfully')</script>");
        echo("<script>window.location = 'home.php#cancel';</script>");
    } 
    else 
    {
        echo("<script>alert('Error in Update. Kidnly input your details correctly')</script>") . $db->error;
        echo("<script>window.location = 'update code.php';</script>");
    }

}
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
        </form>

        <?php

//}
?>
</body>

</html>