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
    <form method="post" action="book.php">
        <div id="bookpage">
            <header id="bookpageheader" style="margin-top:50px;">Find a Train</header>
            <br>
            <div id="location">
                <div id="label">Departure Location</div>
                <div class="col">
                    <select name="dep" class="textbox">
                        <option style="display:none;" selected>Unakotoka</option>
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
                <br>
                <br>
                <div id="label">Destination</div>
                <div class="col">
                    <select name="dest" class="textbox">
                        <option style="display:none;" selected>Unakoenda</option>
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
                <div class="col" id="butn">
                    <input id="button" type="submit" name="submit" value="Find a train" class="btn">
                    <span class="focus-border">
                <i></i>
                </span>
                </div>
            </div>
            <div id="date">Date
                <br>
                <div class="col">
                    <input type="text" name="day" class="textbox" placeholder="Tarehe" id="datepicker">
                    <span class="focus-border">
                <i></i>
                </span>
                </div>
            </div>
            <br>
        </div>

    </form>
</body>

</html>
<?php
             if(!empty($_POST))
            {

                 include 'connect.php';
                $dep = $_POST['dep'];
                $dest = $_POST['dest'];
                $day = $_POST['day'];

                $profile = "SELECT * FROM train_schedules WHERE departure_station = '$dep' && destination_station = '$dest' && date = '$day'";
                $query = mysqli_query($db, $profile);
                $train=mysqli_fetch_array($query);

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

                $left = $train['seats_available'];
                $status = $train['status'];
                //var_dump($left); 

                if ($dep == $dest)
                {
                    echo " <h1 style='margin-top:50px; text-align:center;'>Departure location cannot be the same as Destination location</h1>";
                }
                 else
                 {
                 if($left == 0 && $date <> NULL)
                 {
                     echo " <h1 style='margin-top:50px;'>Train Fully Booked</h1>";
                 }
                 else
                 {
                    if($status != NULL && $date <> NULL)
                    {
                        echo " <h1 style='margin-top:50px;'>The Train has already left</h1>";
                    }
                 else
                 {
                     if($current_year > $int_year && $date <> NULL)
                     {
                         echo " <h1 style='margin-top:50px;'>The Train has already left</h1>";
                     }
                     else
                     {
                         if($current_month > $int_month && $current_year > $int_year && $date <> NULL)
                         {
                             echo " <h1 style='margin-top:50px;'>The Train has already left3</h1>";
                         }
                         else
                         {
                             if($current_day >= $int_day && $current_year > $int_year && $date <> NULL)
                             {
                                  echo " <h1 style='margin-top:50px;'>The Train has already left4</h1>";  
                             }
                         }
                     }

            ?>
    <?php 
                if (empty($train))
                {
                    echo " <h1 style='margin-top:50px;'>No Trains have been scheduled</h1>";
                }

                else
                { 
            ?>
        <div>
            <h3 style="text-align: center;"> Train Schedules </h3>
            <table border=1; width=100%; class="data-table">
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
                            <td><a href="details.php?id=<?php echo ($trains['train_number']); ?>" style="color:red;">Book</a></td>
                        </tr>
                        <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php }
                 }}}
             }

?>