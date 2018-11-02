<html>

<head>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.js"></script>

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
                <a href="admin.php" style="font: 19px Times New Roman;">
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
            <!--                    <li><a href="charts1.php" id="links">Booked Tickets/Month</a></li>-->
            <li><a href="charts2.php" id="links">Amount Made/Month</a></li>
            <li><a href="charts3.php" id="links">Number of Travellers/Month</a></li>
            <li><a href="charts4.php" id="links">Cancelled tickets</a></li>
            <li><a href="charts5.php" id="links">Compare</a></li>
        </ul>
    </nav>

</head>

<body>
    <!--        Chart 1: Boooked Tickets-->
    <center>
        <h3 style="margin-top:60px;">Number of Cancelled Tickets</h3></center>

    <form action="charts4.php" method="post" style="text-align:center;">
        <div id="labels">Year</div>
        <div class="col">
            <input type="text" name="year" class="textbox" placeholder="Year" required>
            <span class="focus-border">
                    <i></i>
                </span>
        </div>
        <br>
        <br>
        <input id="button" type="submit" name="refresh" value="Generate" class="btn">
    </form>

    <?php

        include 'connect.php';
        if(!empty($_POST))
        {
            $year = $_POST['year'];

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM cancelled_tickets WHERE date_of_travel LIKE '01%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $jan = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM cancelled_tickets WHERE date_of_travel LIKE '02%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $feb = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM cancelled_tickets WHERE date_of_travel LIKE '03%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $mar = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM cancelled_tickets WHERE date_of_travel LIKE '04%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $apr = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM cancelled_tickets WHERE date_of_travel LIKE '05%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $may = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM cancelled_tickets WHERE date_of_travel LIKE '06%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $june = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM cancelled_tickets WHERE date_of_travel LIKE '07%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $july = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM cancelled_tickets WHERE date_of_travel LIKE '08%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $aug = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM cancelled_tickets WHERE date_of_travel LIKE '09%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $sep = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM cancelled_tickets WHERE date_of_travel LIKE '10%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $oct = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM cancelled_tickets WHERE date_of_travel LIKE '11%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $nov = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM cancelled_tickets WHERE date_of_travel LIKE '12%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $dec = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(amount_made) AS 'total' FROM cancelled_tickets WHERE date_of_travel LIKE '01%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $jan1 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(amount_made) AS 'total' FROM cancelled_tickets WHERE date_of_travel LIKE '02%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $feb1 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(amount_made) AS 'total' FROM cancelled_tickets WHERE date_of_travel LIKE '03%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $mar1 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(amount_made) AS 'total' FROM cancelled_tickets WHERE date_of_travel LIKE '04%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $apr1 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(amount_made) AS 'total' FROM cancelled_tickets WHERE date_of_travel LIKE '05%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $may1 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(amount_made) AS 'total' FROM cancelled_tickets WHERE date_of_travel LIKE '06%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $june1 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(amount_made) AS 'total' FROM cancelled_tickets WHERE date_of_travel LIKE '07%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $july1 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(amount_made) AS 'total' FROM cancelled_tickets WHERE date_of_travel LIKE '08%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $aug1 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(amount_made) AS 'total' FROM cancelled_tickets WHERE date_of_travel LIKE '09%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $sep1 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(amount_made) AS 'total' FROM cancelled_tickets WHERE date_of_travel LIKE '10%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $oct1 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(amount_made) AS 'total' FROM cancelled_tickets WHERE date_of_travel LIKE '11%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $nov1 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(amount_made) AS 'total' FROM cancelled_tickets WHERE date_of_travel LIKE '12%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $dec1 = $row['total'];
            mysqli_free_result($result);

            //Statistics for the year
            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM cancelled_tickets WHERE date_of_travel LIKE '%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $tot = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(amount_made) AS 'total' FROM cancelled_tickets WHERE date_of_travel LIKE '%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $tot1 = $row['total'];
            mysqli_free_result($result);

            ?>
        <center>
            <div style="text-align:center; background-color:black; max-width:300px;">
                <div id="labels" style="color:red;">Total Number of Cancelled Tickets in the Year</div>
                <div class="col">
                    <input type="text" name="year" class="textbox" placeholder="Year" value="<?php echo $tot; ?>" disabled style="text-align:center;color:red">
                    <span class="focus-border">
                            <i></i>
                        </span>
                </div>
                <br>
                <br>
            </div>
        </center>
        <center>
            <div style="text-align:center; background-color:black; max-width:300px;">
                <div id="labels" style="color:red;">Total Amount made in the Year</div>
                <div class="col">
                    <input type="text" name="year" class="textbox" placeholder="Year" value="<?php echo $tot1; ?>" disabled style="text-align:center;color:red">
                    <span class="focus-border">
                            <i></i>
                        </span>
                </div>
                <br>
                <br>
            </div>
        </center>
        <center>
            <canvas id="bChart" width="50" height="15" class="graph"></canvas>
        </center>
        <br>
        <br>
        <center>
            <canvas id="b1Chart" width="50" height="15" class="graph"></canvas>
        </center>
        <?php

        }
        ?>

            <script>
                var ctx2 = document.getElementById("bChart").getContext('2d');
                var bookedChart = new Chart(ctx2, {
                    type: 'bar',
                    data: {
                        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                        datasets: [{
                            label: 'Number of Cancelled Tickets',
                            data: [
                                <?php echo $jan ?>,
                                <?php echo $feb ?>,
                                <?php echo $mar ?>,
                                <?php echo $apr ?>,
                                <?php echo $may ?>,
                                <?php echo $june ?>,
                                <?php echo $july ?>,
                                <?php echo $aug ?>,
                                <?php echo $sep ?>,
                                <?php echo $oct ?>,
                                <?php echo $nov ?>,
                                <?php echo $dec ?>

                            ],
                            backgroundColor: [
                                'hotpink',
                                'grey',
                                'purple',
                                'brown',
                                'yellow',
                                'lightgreen',
                                'red',
                                'blue',
                                'green',
                                'orange',
                                'aqua',
                                'black'
                            ],
                            borderColor: [
                                'black',
                                'black',
                                'black',
                                'black',
                                'black',
                                'black',
                                'black',
                                'black'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });

                var ctx2 = document.getElementById("b1Chart").getContext('2d');
                var bookedChart = new Chart(ctx2, {
                    type: 'bar',
                    data: {
                        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                        datasets: [{
                            label: 'Amount Made from Cancelled Tickets',
                            data: [
                                <?php echo $jan1 ?>,
                                <?php echo $feb1 ?>,
                                <?php echo $mar1 ?>,
                                <?php echo $apr1 ?>,
                                <?php echo $may1 ?>,
                                <?php echo $june1 ?>,
                                <?php echo $july1 ?>,
                                <?php echo $aug1 ?>,
                                <?php echo $sep1 ?>,
                                <?php echo $oct1 ?>,
                                <?php echo $nov1 ?>,
                                <?php echo $dec1 ?>

                            ],
                            backgroundColor: [
                                'red',
                                'yellow',
                                'aqua',
                                'orange',
                                'grey',
                                'lightgreen',
                                'hotpink',
                                'black',
                                'green',
                                'brown',
                                'purple',
                                'blue'
                            ],
                            borderColor: [
                                'black',
                                'black',
                                'black',
                                'black',
                                'black',
                                'black',
                                'black',
                                'black'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            </script>
</body>

</html>