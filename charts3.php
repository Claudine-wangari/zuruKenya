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
        <h3 style="margin-top:60px;">Number of Travellers per Month</h3></center>

    <form action="charts3.php" method="post" style="text-align:center;">
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
        if(!empty($_POST))
        {
            $year = $_POST['year'];

            include 'connect.php';

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '01%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $jan = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '02%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $feb = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '03%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $mar = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '04%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $apr = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '05%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $may = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '06%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $june = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '07%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $july = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '08%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $aug = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '09%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $sep = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '10%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $oct = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '11%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $nov = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '12%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $dec = $row['total'];
            mysqli_free_result($result);

            //Statistics for the year
            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '%$year'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $tot = $row['total'];
            mysqli_free_result($result);
            ?>
        <center>
            <div style="text-align:center; background-color:black; max-width:300px;">
                <div id="labels" style="color:red;">Total Number of Booked Tickets in the Year</div>
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
            <canvas id="bChart" width="50" height="15" class="graph"></canvas>
        </center>
        <?php
        }
        //var_dump($sql);
        ?>

            <script>
                var ctx2 = document.getElementById("bChart").getContext('2d');
                var bookedChart = new Chart(ctx2, {
                    type: 'bar',
                    data: {
                        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                        datasets: [{
                            label: 'Number of Booked Tickets',
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
                                'aqua',
                                'orange',
                                'green',
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
            </script>
</body>

</html>