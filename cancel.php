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
            <li><a href="home.php#home" id="links">Back to Home</a></li>
        </ul>
    </nav>
</head>

<body>
    <div style="margin-top:55px;"></div>
    <form>
        <h1 style="color:black;font:25px Times New Roman">You must agree to the Terms and Conditions so as to proceed with the cancellation</h1>
        <fieldset style="margin:0px;">
            <Legend>
                <h2>Terms and Conditions</h2></Legend>
            1. A ticket cancelled within 7 days of travel will call for no refunds
            <br> 2. A ticket cancelled between 7 and 14 days before date of travel will call for a 50% penalty on the initial payment
            <br> 3. A ticket cancelled between 14 and 21 days before date of travel will call for a 25% penalty on the initial payment
            <br> 4. A ticket cancelled after 21 days before date of travel will call for a 10% penalty on the initial payment
            <br>
            <br>

            <input type="radio" name="Type" value="agree" onclick="enableTerms()">I accept
            <input type="radio" name="Type" value="disagree" onclick="disableTerms()">I do not accept
            <br>
        </fieldset>
    </form>

    <?php
        require 'connect.php';

        $query = "SELECT * FROM tickets WHERE id_number = '".$_GET['id']."'";
        $querys = mysqli_query($db, $query);
        $fill = mysqli_fetch_array($querys);

        $date = $fill['date'];
        $amount = $fill['total_price'];
        $id = $fill['id_number'];
        $seats = $fill['number_of_tickets'];
        $train_id = $fill['train_number'];

        //Get the Original Seats available from db
        $original = "SELECT * FROM `train_schedules` WHERE `train_number` = '$train_id'";
        $original_run = mysqli_query($db, $original);
        $hold = mysqli_fetch_array($original_run);
        $original_seats = $hold['seats_available'];

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

        //Calculate the differences
        $month_diff = $int_month - $current_month;
        //$day_diff = $int_day - $current_day;

        if($current_year == $int_year)
        {
            if($month_diff >= 2)
            {
                $refund = $amount * 9/10;
                echo "<h1>Amount refundable is 90% of initial payment: ".$refund." Kshs</h1>";
                ?>

        <form method="post" style="text-align:center;display:none;" id="reasons">
            <div style="text-align:center;display:none;" id="reasons">
                <input type="submit" name="submit" value="Process Request" class="btn" onclick="return confirm('Amount refundable is 90% of initial payment. Proceed?')" />
            </div>
        </form>
        <?php
                $day_diff = -1;
            }
            else
            {
                $month_diff = $int_month - $current_month;
                if($month_diff == 1)
                {
                    switch ($current_month)
                    {
                        case 01:
                            $day_diff = $int_day + (31 - $current_day);
                                break;
                        case 02:
                            $leap_year = $current_year % 4;
                            if($leap_year = 0)
                            {
                                $day_diff = $int_day + (29 - $current_day);
                            }
                            else
                            {
                                $day_diff = $int_day + (28 - $current_day);
                            }
                                break;
                        case 03:
                            $day_diff = $int_day + (31 - $current_day);
                                break;
                        case 04:
                            $day_diff = $int_day + (30 - $current_day);
                                break;
                        case 05:
                            $day_diff = $int_day + (31 - $current_day);
                                break;
                        case 06:
                            $day_diff = $int_day + (30 - $current_day);
                                break;
                        case 07:
                            $day_diff = $int_day + (31 - $current_day);
                                break;
                        case 8:
                            $day_diff = $int_day + (31 - $current_day);
                                break;
                        case 9:
                            $day_diff = $int_day + (30 - $current_day);
                                break;
                        case 10:
                            $day_diff = $int_day + (31 - $current_day);
                                break;
                        case 11:
                            $day_diff = $int_day + (30 - $current_day);
                                break;
                        case 12:
                            $day_diff = $int_day + (31 - $current_day);
                                break;
                    }
                }
                else
                {
                    $day_diff = $int_day - $current_day;
                }
            }
        }
        else
        {
            $int_month += 12;
            $month_diff = $int_month - $current_month;

            if($month_diff >= 2)
            {
                $refund = $amount * 9/10;
                echo "<h1>Amount refundable is 90% of initial payment: ".$refund." Kshs</h1>";
                ?>
            <form method="post" style="text-align:center;">
                <div style="text-align:center;display:none;" id="reasons">
                    <input type="submit" name="submit" value="Process Request" class="btn" onclick="return confirm('Amount refundable is 90% of initial payment. Proceed?')" />
                </div>
            </form>
            <?php
                $day_diff = -1;
            }
            else
            {
                switch ($current_month)
                {
                    case 01:
                        $day_diff = $int_day + (31 - $current_day);
                            break;
                    case 02:
                        $leap_year = $current_year % 4;
                        if($leap_year = 0)
                        {
                            $day_diff = $int_day + (29 - $current_day);
                        }
                        else
                        {
                            $day_diff = $int_day + (28 - $current_day);
                        }
                            break;
                    case 03:
                        $day_diff = $int_day + (31 - $current_day);
                            break;
                    case 04:
                        $day_diff = $int_day + (30 - $current_day);
                            break;
                    case 05:
                        $day_diff = $int_day + (31 - $current_day);
                            break;
                    case 06:
                        $day_diff = $int_day + (30 - $current_day);
                            break;
                    case 07:
                        $day_diff = $int_day + (31 - $current_day);
                            break;
                    case 8:
                        $day_diff = $int_day + (31 - $current_day);
                            break;
                    case 9:
                        $day_diff = $int_day + (30 - $current_day);
                            break;
                    case 10:
                        $day_diff = $int_day + (31 - $current_day);
                            break;
                    case 11:
                        $day_diff = $int_day + (30 - $current_day);
                            break;
                    case 12:
                        $day_diff = $int_day + (31 - $current_day);
                            break;
                }

            }
        }

        if($day_diff > 31)
        {
            $refund = $amount * 9/10;
            echo "<h1>Amount refundable is 90% of initial payment: ".$refund." Kshs</h1>";
            //echo("<script>confirm('Amount refundable is 75% of initial payment')</script>");
            ?>
                <form method="post" style="text-align:center;">
                    <div style="text-align:center;display:none;" id="reasons">
                        <input type="submit" name="submit" value="Process Request" class="btn" onclick="return confirm('Amount refundable is 90% of initial payment. Proceed?')" />
                    </div>
                </form>
                <?php
        }
        else    
        if($day_diff >= 21 && $day_diff < 31)
        {
            $refund = $amount * 3/4;
            echo "<h1>Amount refundable is 75% of initial payment: ".$refund." Kshs</h1>";
            //echo("<script>confirm('Amount refundable is 75% of initial payment')</script>");
            ?>
                    <form method="post" style="text-align:center;">
                        <div style="text-align:center;display:none;" id="reasons">
                            <input type="submit" name="submit" value="Process Request" class="btn" onclick="return confirm('Amount refundable is 75% of initial payment. Proceed?')" />
                        </div>
                    </form>
                    <?php
        }
        else
        if($day_diff >= 14)
        {
            $refund = $amount * 1/2;
            echo "<h1>Amount refundable is 50% of initial payment: ".$refund." Kshs</h1>";
            //echo("<script>confirm('Amount refundable is 50% of initial payment')</script>");
            ?>
                        <form method="post" style="text-align:center;">
                            <div style="text-align:center;display:none;" id="reasons">
                                <input type="submit" name="submit" value="Process Request" class="btn" onclick="return confirm('Amount refundable is 50% of initial payment. Proceed?')" />
                            </div>
                        </form>
                        <?php
        }
        else
        if($day_diff < 14 && $day_diff >= 0)
        {
            $refund = $amount;
            echo "<h1>You will not be refunded intial payment: ".$refund." Kshs</h1>"; 
            //echo("<script>confirm('You will not be refunded intial payment')</script>");
            ?>
                            <form method="post" style="text-align:center;">
                                <div style="text-align:center;display:none;" id="reasons">
                                    <input type="submit" name="submit" value="Process Request" class="btn" onclick="return confirm('You will not be refunded intial payment. Proceed?')" />
                                </div>
                            </form>
                            <?php
        }

        if(!empty($_POST['submit'])) 
        {
            
            $curr_date = date("m/d/y");
            
            $sql_statement = "INSERT INTO `cancelled_tickets`(`train_number`, `date_of_travel`, `date_cancelled`, `number_of_tickets`, `amount_made`) VALUES  ('$train_id','$date','$curr_date','$seats','$refund')";
            $query_statement = mysqli_query($db, $sql_statement);

            

            $new = $original_seats + $seats;
            $update_sql = "UPDATE `train_schedules` SET `seats_available`='$new' WHERE `train_number` = '$train_id'";
            $update_query = mysqli_query($db, $update_sql);

            $sql = "DELETE FROM tickets WHERE id_number = '$id'";
            $query = mysqli_query($db, $sql);

            $sql2 = "DELETE FROM customers WHERE id_number = '$id'";
            $query2 = mysqli_query($db, $sql2);

            echo("<script>alert('Booking Cancelled Successfully')</script>");
            echo("<script>window.location = 'home.php#cancel';</script>");
        }

        ?>
</body>

</html>
<script>
    var reasons = document.getElementById('reasons');

    function disableTerms() {
        reasons.style.display = 'none';
    }

    function enableTerms() {
        reasons.style.display = 'block';
    }
</script>