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
            <li><a href="home.php#home" id="links">Back to Home</a></li>
        </ul>
    </nav>
</head>

<body>
    <?php
        include 'connect.php';
        //session_start();
        $sql = "SELECT * FROM `tickets` WHERE `id_number` = '".$_SESSION['tid']."'";
        $sql_run = mysqli_query($db, $sql);
        $sql_hold = mysqli_fetch_array($sql_run);

        $id = $sql_hold['id_number'];
        $train_number = $sql_hold['train_number'];
        $tickets_count = $sql_hold['number_of_tickets'];

        $sql2 = "SELECT * FROM `train_schedules` WHERE `train_number` = '$train_number'";
        $sql_run2 = mysqli_query($db, $sql2);
        $sql_hold2 = mysqli_fetch_array($sql_run2);

        $old_seats = $sql_hold2['seats_available'];

        $sql1 = "SELECT * FROM `customers` WHERE `id_number` = '$id'";
        $sql_run1 = mysqli_query($db, $sql1);
        $sql_hold1 = mysqli_fetch_array($sql_run1);

        function cancelpayment()
        {
            if(!empty($_POST))
            {
                include 'connect.php';

                $sql = "SELECT * FROM `tickets` WHERE `id_number` = '".$_SESSION['tid']."'";
                $sql_run = mysqli_query($db, $sql);
                $sql_hold = mysqli_fetch_array($sql_run);

                $id = $sql_hold['id_number'];
                $train_number = $sql_hold['train_number'];
                $tickets_count = $sql_hold['number_of_tickets'];

                $sql2 = "SELECT * FROM `train_schedules` WHERE `train_number` = '$train_number'";
                $sql_run2 = mysqli_query($db, $sql2);
                $sql_hold2 = mysqli_fetch_array($sql_run2);

                $old_seats = $sql_hold2['seats_available'];

                $seats = $old_seats + $tickets_count;
                $sql_update_schedules = "UPDATE `train_schedules` SET `seats_available`='$seats' WHERE `train_number` = '$train_number'";
                $sql_run_update = mysqli_query($db, $sql_update_schedules);
                $sql_run_update_hold = mysqli_fetch_array($sql_run_update);

                $sql_delete_tickets = mysqli_query($db,"DELETE FROM `tickets` WHERE `id_number` = '$id'");
                $sql_delete_tickets_hold = mysqli_fetch_array($sql_delete_tickets);

                $sql_delete_customers = mysqli_query($db, "DELETE FROM `customers` WHERE `id_number` = '$id'");
                $sql_delete_customers_hold = mysqli_fetch_array($sql_delete_customers);

                if ($db->query($sql_update_schedules) === TRUE) 
                {
                    echo("<script>alert('Details Cancelled')</script>");
                    echo  ("<script>window.location.href = 'home.php#cancel'</script>"); 

                } 
                else 
                {
                    echo("<script>alert('Failed to book booked')</script>") . $db->error;
                }

            }
        }

        //var_dump($sql1);
        ?>
        <!--
        <div style="margin-top:60px;text-align:center;">
            <h2>Pay below</h2>
            <div class="col">
                Amount To be paid<br>
                <input type="text" class="textbox" disabled value="<?php echo $sql_hold['total_price']; ?>">
                <span class="focus-border">
                    <i></i>
                </span>
            </div>
            <div class="col">
                Phone Number<br>
                <input type="text" class="textbox" disabled value="<?php echo $sql_hold1['phone_number']; ?>">
                <span class="focus-border">
                    <i></i>
                </span>
            </div><br><br>
            Enter Pre-Shared Key<br>
            <div class="col">
                <input type="text" class="textbox" required>
                <span class="focus-border">
                    <i></i>
                </span>
            </div><br><br><br>

            <form method="post" action="ticket.php?id=<?php echo $id ?>"> 
                <input id="button" type="submit" name="cancel" value="Cancel Payment" class="btn" style="width:200px;text-align:center;">
            </form>

            <input id="button" type="submit" value="Preview" class="btn" style="width:200px;text-align:center;" onclick="document.getElementById('hidden').style.display = 'block'">
        </div>
-->
        <h2 style="text-align:center;margin-top:70px;">Print Your Ticket Below</h2>
        <input id="button" type="submit" value="Print Ticket" class="btn" style="width:150px;text-align:center;margin-left:600px;" onclick="javascript:printDiv('ticket')">
        <div id="hidden" style="display:block">
            <div id="ticket" style="margin-top:20px;">
                <fieldset>
                    <legend>Ticket</legend>
                    <div id="topdetails">
                        <div class="col" id="ticketnumber">
                            Ticket Number
                            <br>
                            <input type="text" class="textbox" disabled value="<?php echo $sql_hold['ticket_number']; ?>">
                            <span class="focus-border">
                                    <i></i>
                                </span>
                        </div>
                        <div class="col" id="amount">
                            Amount
                            <br>
                            <input type="text" class="textbox" disabled value="<?php echo $sql_hold['total_price']; ?>">
                            <span class="focus-border">
                                    <i></i>
                                </span>
                        </div>
                    </div>
                    <div id="middetails">
                        <div class="col" id="dept">
                            Departure Station
                            <br>
                            <input type="text" class="textbox" disabled value="<?php echo $sql_hold['departure_station']; ?>" style="color:red;font:40px Times New Roman">
                            <span class="focus-border">
                                    <i></i>
                                </span>
                        </div>
                        <div class="col" id="tickettype">
                            Ticket Type
                            <br>
                            <input type="text" class="textbox" disabled value="<?php echo $sql_hold['ticket_type']; ?>" style="color:blue;">
                            <span class="focus-border">
                                    <i></i>
                                </span>
                        </div>
                        <div class="col" id="dest">
                            Destination Station
                            <br>
                            <input type="text" class="textbox" disabled value="<?php echo $sql_hold['destination_station']; ?>" style="color:red;font:50px Times New Roman">
                            <span class="focus-border">
                                    <i></i>
                                </span>
                        </div>
                    </div>
                    <div id="lastdetails">
                        <div id="mid1">
                            <div class="col" id="depttime">
                                Departure Time
                                <br>
                                <input type="text" class="textbox" disabled value="<?php echo $sql_hold['departure_time']; ?>" style="color:green;font:20px Times New Roman">
                                <span class="focus-border">
                                        <i></i>
                                    </span>
                            </div>
                            <div class="col" id="date">
                                Date
                                <br>
                                <input type="text" class="textbox" disabled value="<?php echo $sql_hold['date']; ?>" style="color:green;font:20px Times New Roman">
                                <span class="focus-border">
                                        <i></i>
                                    </span>
                            </div>
                        </div>
                        <div id="mid2">
                            <div class="col" id="class">
                                Class
                                <br>
                                <input type="text" class="textbox" disabled value="<?php echo $sql_hold['Class']; ?>" style="color:green;font:20px Times New Roman">
                                <span class="focus-border">
                                        <i></i>
                                    </span>
                            </div>
                            <div class="col" id="seats">
                                Seats Booked
                                <br>
                                <input type="text" class="textbox" disabled value="<?php echo $sql_hold['number_of_tickets']; ?>" style="color:green;font:20px Times New Roman">
                                <span class="focus-border">
                                        <i></i>
                                    </span>
                            </div>
                        </div>
                        <div class="col" id="name">
                            Name
                            <br>
                            <input type="text" class="textbox" disabled value="<?php echo $sql_hold1['name']; ?>">
                            <span class="focus-border">
                                    <i></i>
                                </span>
                        </div>
                        <div class="col" id="id">
                            ID Number
                            <br>
                            <input type="text" class="textbox" disabled value="<?php echo $sql_hold['id_number']; ?>">
                            <span class="focus-border">
                                    <i></i>
                                </span>
                        </div>
                    </div>
                </fieldset>
            </div>

        </div>

        <?php
        if(isset($_POST['cancel']))
        {
            cancelpayment();

        }
        ?>
            <script language="javascript" type="text/javascript">
                function printDiv(divID) {
                    //Get the HTML of div
                    var divElements = document.getElementById(divID).innerHTML;

                    //Get the HTML of whole page
                    var oldPage = document.body.innerHTML;

                    //Reset the page's HTML with div's HTML only
                    document.body.innerHTML = divElements;

                    //Print Page
                    window.print();

                    //Restore orignal HTML
                    document.body.innerHTML = oldPage;
                }
            </script>
</body>

</html>

<?php

?>