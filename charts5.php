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
        <h3 style="margin-top:60px;">Comparisons between two years</h3></center>

    <form action="charts5.php" method="post" style="text-align:center;">
        <div style="display: -webkit-box; -webkit-box-orient:horizontal; margin-left:300px;">
            <div style="display: -webkit-box; -webkit-box-orient:vertical;">
                <div id="labels">First Year</div>
                <div class="col">
                    <input type="text" name="year1" class="textbox" placeholder="Year" required>
                    <span class="focus-border">
                            <i></i>
                        </span>
                </div>
            </div>
            <div style="display: -webkit-box; -webkit-box-orient:vertical; margin-left:150px;">
                <div id="labels">Second Year</div>
                <div class="col">
                    <input type="text" name="year2" class="textbox" placeholder="Year" required>
                    <span class="focus-border">
                            <i></i>
                        </span>
                </div>
            </div>
        </div>
        <br>
        <br>
        <input id="button" type="submit" name="refresh" value="Generate" class="btn">
    </form>

    <?php

        include 'connect.php';
        if(!empty($_POST))
        {
            $year1 = $_POST['year1'];
            $year2 = $_POST['year2'];

            //Booked Tickets
            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '01%$year1'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $jan1 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '02%$year1'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $feb1 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '03%$year1'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $mar1 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '04%$year1'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $apr1 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '05%$year1'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $may1 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '06%$year1'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $june1 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '07%$year1'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $july1 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '08%$year1'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $aug1 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '09%$year1'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $sep1 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '10%$year1'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $oct1 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '11%$year1'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $nov1 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '12%$year1'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $dec1 = $row['total'];
            mysqli_free_result($result);

            //Total Amount
            $sql = "SELECT SUM(total_price) AS 'total' FROM tickets WHERE date LIKE '01%$year1'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $jan11 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(total_price) AS 'total' FROM tickets WHERE date LIKE '02%$year1'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $feb11 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(total_price) AS 'total' FROM tickets WHERE date LIKE '03%$year1'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $mar11 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(total_price) AS 'total' FROM tickets WHERE date LIKE '04%$year1'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $apr11 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(total_price) AS 'total' FROM tickets WHERE date LIKE '05%$year1'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $may11 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(total_price) AS 'total' FROM tickets WHERE date LIKE '06%$year1'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $june11 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(total_price) AS 'total' FROM tickets WHERE date LIKE '07%$year1'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $july11 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(total_price) AS 'total' FROM tickets WHERE date LIKE '08%$year1'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $aug11 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(total_price) AS 'total' FROM tickets WHERE date LIKE '09%$year1'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $sep11 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(total_price) AS 'total' FROM tickets WHERE date LIKE '10%$year1'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $oct11 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(total_price) AS 'total' FROM tickets WHERE date LIKE '11%$year1'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $nov11 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(total_price) AS 'total' FROM tickets WHERE date LIKE '12%$year1'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $dec11 = $row['total'];
            mysqli_free_result($result);

            //Statistics for the year
            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '%$year1'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $tot1 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(total_price) AS 'total' FROM tickets WHERE date LIKE '%$year1'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $tot11 = $row['total'];
            mysqli_free_result($result);

            //This is for the second year        
            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '01%$year2'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $jan2 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '02%$year2'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $feb2 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '03%$year2'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $mar2 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '04%$year2'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $apr2 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '05%$year2'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $may2 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '06%$year2'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $june2 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '07%$year2'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $july2 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '08%$year2'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $aug2 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '09%$year2'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $sep2 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '10%$year2'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $oct2 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '11%$year2'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $nov2 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '12%$year2'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $dec2 = $row['total'];
            mysqli_free_result($result);

            //Amount made
            $sql = "SELECT SUM(total_price) AS 'total' FROM tickets WHERE date LIKE '01%$year2'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $jan22 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(total_price) AS 'total' FROM tickets WHERE date LIKE '02%$year2'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $feb22 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(total_price) AS 'total' FROM tickets WHERE date LIKE '03%$year2'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $mar22 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(total_price) AS 'total' FROM tickets WHERE date LIKE '04%$year2'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $apr22 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(total_price) AS 'total' FROM tickets WHERE date LIKE '05%$year2'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $may22 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(total_price) AS 'total' FROM tickets WHERE date LIKE '06%$year2'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $june22 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(total_price) AS 'total' FROM tickets WHERE date LIKE '07%$year2'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $july22 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(total_price) AS 'total' FROM tickets WHERE date LIKE '08%$year2'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $aug22 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(total_price) AS 'total' FROM tickets WHERE date LIKE '09%$year2'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $sep22 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(total_price) AS 'total' FROM tickets WHERE date LIKE '10%$year2'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $oct22 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(total_price) AS 'total' FROM tickets WHERE date LIKE '11%$year2'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $nov22 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(total_price) AS 'total' FROM tickets WHERE date LIKE '12%$year2'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $dec22 = $row['total'];
            mysqli_free_result($result);

            //Statistics for the year
            $sql = "SELECT SUM(number_of_tickets) AS 'total' FROM tickets WHERE date LIKE '%$year2'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $tot2 = $row['total'];
            mysqli_free_result($result);

            $sql = "SELECT SUM(total_price) AS 'total' FROM tickets WHERE date LIKE '%$year2'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $tot22 = $row['total'];
            mysqli_free_result($result);

            ?>
        <center>
            <h2>Total Number of Booked Tickets</h2></center>
        <center>
            <canvas id="o1Chart" width="50" height="15" class="graph"></canvas>
        </center>
        <center>
            <h2>Total Amount Made</h2></center>
        <center>
            <canvas id="o2Chart" width="50" height="15" class="graph"></canvas>
        </center>
        <center>
            <h2>Number of Booked Tickets per Month</h2></center>
        <center>
            <canvas id="b1Chart" width="50" height="15" class="graph"></canvas>
        </center>
        <center>
            <h2>Amount Made per Month</h2></center>
        <center>
            <canvas id="b2Chart" width="50" height="15" class="graph"></canvas>
        </center>
        <?php
        }
        ?>

            <script>
                var ctx2 = document.getElementById("b1Chart").getContext('2d');
                var bookedChart = new Chart(ctx2, {
                    type: 'bar',
                    data: {
                        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                        datasets: [{
                            label: ["<?php echo $year1 ?>"],
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
                                'purple',
                                'purple',
                                'purple',
                                'purple',
                                'purple',
                                'purple',
                                'purple',
                                'purple',
                                'purple',
                                'purple',
                                'purple',
                                'purple'
                            ],
                        }, {
                            label: ["<?php echo $year2 ?>"],
                            data: [
                                <?php echo $jan2 ?>,
                                <?php echo $feb2 ?>,
                                <?php echo $mar2 ?>,
                                <?php echo $apr2 ?>,
                                <?php echo $may2 ?>,
                                <?php echo $june2 ?>,
                                <?php echo $july2 ?>,
                                <?php echo $aug2 ?>,
                                <?php echo $sep2 ?>,
                                <?php echo $oct2 ?>,
                                <?php echo $nov2 ?>,
                                <?php echo $dec2 ?>

                            ],
                            backgroundColor: [
                                'blue',
                                'blue',
                                'blue',
                                'blue',
                                'blue',
                                'blue',
                                'blue',
                                'blue',
                                'blue',
                                'blue',
                                'blue',
                                'blue'
                            ],
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
                var ctx2 = document.getElementById("b2Chart").getContext('2d');
                var bookedChart = new Chart(ctx2, {
                    type: 'bar',
                    data: {
                        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                        datasets: [{
                            label: ["<?php echo $year1 ?>"],
                            data: [
                                <?php echo $jan11 ?>,
                                <?php echo $feb11 ?>,
                                <?php echo $mar11 ?>,
                                <?php echo $apr11 ?>,
                                <?php echo $may11 ?>,
                                <?php echo $june11 ?>,
                                <?php echo $july11 ?>,
                                <?php echo $aug11 ?>,
                                <?php echo $sep11 ?>,
                                <?php echo $oct11 ?>,
                                <?php echo $nov11 ?>,
                                <?php echo $dec11 ?>

                            ],
                            backgroundColor: [
                                'purple',
                                'purple',
                                'purple',
                                'purple',
                                'purple',
                                'purple',
                                'purple',
                                'purple',
                                'purple',
                                'purple',
                                'purple',
                                'purple'
                            ],
                        }, {
                            label: ["<?php echo $year2 ?>"],
                            data: [
                                <?php echo $jan22 ?>,
                                <?php echo $feb22 ?>,
                                <?php echo $mar22 ?>,
                                <?php echo $apr22 ?>,
                                <?php echo $may22 ?>,
                                <?php echo $june22 ?>,
                                <?php echo $july22 ?>,
                                <?php echo $aug22 ?>,
                                <?php echo $sep22 ?>,
                                <?php echo $oct22 ?>,
                                <?php echo $nov22 ?>,
                                <?php echo $dec22 ?>
                            ],
                            backgroundColor: [
                                'blue',
                                'blue',
                                'blue',
                                'blue',
                                'blue',
                                'blue',
                                'blue',
                                'blue',
                                'blue',
                                'blue',
                                'blue',
                                'blue'
                            ],
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

                var ctx1 = document.getElementById("o1Chart").getContext('2d');
                var myChart = new Chart(ctx1, {
                    type: 'pie',
                    data: {
                        labels: ["<?php echo $year1; ?> ", "<?php echo $year2; ?>"],
                        datasets: [{
                            backgroundColor: [
                                "Purple",
                                "Blue"
                            ],
                            data: [
                                <?php echo $tot1; ?>,
                                <?php echo $tot2; ?>
                            ]
                        }]
                    }
                });

                var ctx1 = document.getElementById("o2Chart").getContext('2d');
                var myChart = new Chart(ctx1, {
                    type: 'pie',
                    data: {
                        labels: ["<?php echo $year1; ?>", "<?php echo $year2; ?>"],
                        datasets: [{
                            backgroundColor: [
                                "Purple",
                                "Blue"
                            ],
                            data: [
                                <?php echo $tot11; ?>,
                                <?php echo $tot22; ?>
                            ]
                        }]
                    }
                });
            </script>
</body>

</html>