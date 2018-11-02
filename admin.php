<html>

<head>
    <!--        document.location.reload(true)-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {

            $("#datepicker").datepicker();

        });
    </script>

    <title>Administrative Staff</title>
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
                <nav1 id="login">
                    <a href="charts2.php" style="font: 19px Times New Roman;">
                        <br>Reports</a>
                </nav1>
            </form>

            <?php
                        }
                        
                    
                    
                ?>

    </div>
    <nav id="nav">
        <ul>
            <li><a href="home.php #home" id="links">Customer's Home</a></li>
            <li><a href="#booked" id="links">Booked Tickets</a></li>
            <li><a href="#train" id="links">Add a Train</a></li>
            <li><a href="#account" id="links">Add an account</a></li>
            <li><a href="#left" id="links">Update Train Status</a></li>
        </ul>
    </nav>
</head>

<script type="text/javascript">
    $(window).scroll(function() {
        sessionStorage.scrollTop = $(this).scrollTop();
    });

    $(document).ready(function() {
        if (sessionStorage.scrollTop != "undefined") {
            $(window).scrollTop(sessionStorage.scrollTop);
        }
    });
</script>

<body>
    <span class="anchor" id="booked"></span>
    <div id="bookeds" style="border-top:2px solid black; min-height:370px;">
        <?php
                include 'connect.php';
                $query = "SELECT * FROM tickets";
                $book = mysqli_query($db, $query);
                $train=mysqli_fetch_array($book);
            if (empty($train))
                {
                    echo " <h1 style='margin-top:50px;'>No record of booked tickets exists</h1>";
                }

                else
                { 
            ?>
            <div>
                <h3 style="text-align: center;margin-top:60px;"> Booked Tickets </h3>
                <table border=1; width=100%; class="data-table">
                    <thead>
                        <tr>
                            <th>ID Number</th>
                            <th>Ticket Number</th>
                            <th>Train Number</th>
                            <th>Ticket Type</th>
                            <th>Departure Station</th>
                            <th>Destination Station</th>
                            <th>Time of Departure</th>
                            <th>Time of Arrival</th>
                            <th>Date</th>
                            <th>Class</th>
                            <th>Number of tickets</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody style="text-align:center;">
                        <?php foreach ($book as $trains): ?>
                            <tr>
                                <td>
                                    <?php echo $trains['id_number']; ?>
                                </td>
                                <td>
                                    <?php echo $trains['ticket_number']; ?>
                                </td>
                                <td>
                                    <?php echo $trains['train_number']; ?>
                                </td>
                                <td>
                                    <?php echo $trains['ticket_type']; ?>
                                </td>
                                <td>
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
                                <td>
                                    <?php echo $trains['Class']; ?>
                                </td>
                                <td>
                                    <?php echo $trains['number_of_tickets']; ?>
                                </td>
                                <td>
                                    <?php echo $trains['total_price']; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php }?>
    </div>

    <span class="anchor" id="train"></span>
    <div id="trains" style="border-top:2px solid black; margin-top:50px; min-height:430px;">
        <form method="post" action="admin.php#train">
            <h2 style="text-align:center;">Update Schedules for the trains</h2>
            <div id="wrap">
                <div id="topwrap">
                    <div id="labels">Train Number</div>
                    <div class="col">
                        <input type="text" name="tno" class="textbox" placeholder="Train Number" required>
                        <span class="focus-border">
                                <i></i>
                            </span>
                    </div>
                    <div id="labels">Number of Seats</div>
                    <div class="col">
                        <input type="text" name="seats" class="textbox" placeholder="Number of Seats" required>
                        <span class="focus-border">
                                <i></i>
                            </span>
                    </div>
                    <div id="labels">Seats Available</div>
                    <div class="col">
                        <input type="text" name="seatsavailable" class="textbox" placeholder="Seats Available" required>
                        <span class="focus-border">
                                <i></i>
                            </span>
                    </div>
                </div>
                <div id="middlewrap">
                    <div id="middlewrap1">
                        <div id="label">Departure Station</div>
                        <div class="col">
                            <select name="dep" class="textbox">
                                <option style="display:none;" selected>Departure Station</option>
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
                        <div id="label">Arrival Station</div>
                        <div class="col">
                            <select name="dest" class="textbox">
                                <option style="display:none;" selected>Arrival Station/Unakotoka</option>
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
                    </div>
                    <div id="middlewrap2">
                        <div id="label">Departure Time</div>
                        <div class="col">
                            <input type="datetime" name="dtime" class="textbox" placeholder="Departure Time" required>
                            <span class="focus-border">
                                    <i></i>
                                </span>
                        </div>
                        <br>
                        <br>
                        <div id="label">Arrival Time</div>
                        <div class="col">
                            <input type="text" name="atime" class="textbox" placeholder="Arrival Time" required>
                            <span class="focus-border">
                                    <i></i>
                                </span>
                        </div>
                    </div>
                    <div style="margin-left:50px;">
                        <div id="label">Date</div>
                        <div class="col">
                            <input type="text" name="day" class="textbox" placeholder="Date/Tarehe" id="datepicker">
                            <span class="focus-border">
                            <i></i>
                        </span>
                        </div>

                    </div>
                </div>
                <script>
                    $(document).ready(train() {
                        $("#buttons").click(train() {
                            $("#train").load("admin.php");
                        });
                    });
                </script>

            </div>
            <div class="col" id="butn" style="margin-left:400px; margin-top:20px;">
                <input id="buttons" type="submit" name="train" value="Update" class="btn">
                <span class="focus-border">
                        <i></i>
                    </span>
            </div>

        </form>
    </div>

    <span class="anchor" id="account"></span>
    <h2 style="text-align:center; border-top:2px solid black; margin-top:50px; "></h2>
    <form method="post" action="admin.php#account">
        <h2 style="text-align:center; margin-top:20px;">Create a new administrator's account</h2>
        <div id="accounts" style="margin-top:0px;  padding-bottom:0px; min-height:390px;">
            <div id="topwrapper" style="margin-left:50px;">
                <div id="middlewrapper1">
                    <div id="label">Staff ID</div>
                    <div class="col">
                        <input type="text" name="id" class="textbox" placeholder="Staff ID">
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
                    <div id="label">Email</div>
                    <div class="col">
                        <input type="email" name="email" class="textbox" placeholder="Email">
                        <span class="focus-border">
                                <i></i>
                            </span>
                    </div>
                    <div id="label">Postal Address</div>
                    <div class="col">
                        <input type="text" name="add" class="textbox" placeholder="Postal Address">
                        <span class="focus-border">
                                <i></i>
                            </span>
                    </div>
                </div>
                <div id="middlewrapper2">
                    <div id="label">Phone Number</div>
                    <div class="col">
                        <input type="text" name="no" class="textbox" placeholder="Phone Number">
                        <span class="focus-border">
                                <i></i>
                            </span>
                    </div>
                    <div id="label">Password</div>
                    <div class="col">
                        <input type="password" name="pass" class="textbox" placeholder="Password">
                        <span class="focus-border">
                                <i></i>
                            </span>
                    </div>
                    <div id="label">Confirm Password</div>
                    <div class="col">
                        <input type="password" name="cpass" class="textbox" placeholder="Confirm Password">
                        <span class="focus-border">
                                <i></i>
                            </span>
                    </div>

                </div>

                <div class="col" id="butn" style="margin-left:0px; margin-top:50px;">
                    <input id="button" type="submit" name="account" value="Create" class="btn">
                    <span class="focus-border">
                            <i></i>
                        </span>
                </div>
            </div>
            <script>
                $(document).ready(account() {
                    $("#button").click(account() {
                        $("#train").load("admin.php");
                    });
                });
            </script>
        </div>
    </form>

    <span class="anchor" id="left"></span>
    <form style="text-align:center;min-height:470px;border-top:2px solid black;" method="post" action="admin.php#left">
        <h2 style="text-align:center;">Update the status of trains that have left the station</h2>
        <div id="labels" style="margin-top:80px">Train Number</div>
        <div class="col">
            <input type="text" name="tid" class="textbox" placeholder="Train Number" required>
            <span class="focus-border">
                        <i></i>
                </span>
        </div>
        <br>
        <br>
        <input id="btn" type="submit" name="leave" value="Update Status" class="btn" onclick="return confirm('Are you sure you want to change the status of the train?')">
    </form>
    <!--
        <script>
            $(document).ready(account(){
                     $("#btn").click(leave(){
                      $("#leave").load("admin.php");
                     });
                    });
        </script>
-->

</body>

</html>

<?php

if(isset($_POST['train']))
{
    train();
}
 elseif(isset($_POST['account']))
{
    account();
}
elseif(isset($_POST['leave']))
{
    leave();
}


                    }
        else
        {
            ?>
            <script>window.location = 'login.php';</script>
            <?php
        }
function train()
{
    if(!empty($_POST))
    {       
        include 'connect.php';
        $tno = $_POST['tno'];
        $seats = $_POST['seats'];
        $seatsavailable = $_POST['seatsavailable'];
        $dep = $_POST['dep'];
        $dest= $_POST['dest'];
        $dtime = $_POST['dtime'];
        $atime = $_POST['atime'];
        $date = $_POST['day'];

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

//        $arrival = (int)$atime;
//        $departure = (int)$dtime;

         if($current_year > $int_year || $current_month > $int_month || $current_day > $int_day)
         {
            echo("<script>alert('The date entered has passed')</script>");
         }
         else
         {
             if($current_day == $int_day)
             {
                  echo("<script>alert('Trains have to be scheduled more than a day in advance')</script>");
             }
             else
             {
                 if ($dtime == $atime)
                    {
                        echo("<script>alert('Departure time cannot be the same as Arrival time')</script>");
                    }
                    else
                    {
                        if ($dep == $dest)
                        {
                            echo("<script>alert('Departure location cannot be the same as Destination location')</script>");
                        }
                        else
                        {
                            if ($tno == "" || $seats == "" || $seatsavailable == "" || $dep == "" || $dest == "" || $dtime == "" || $atime == "" || $date == "")
                            {
                                echo("<script>alert('You cannot have empty fields')</script>");
                                echo("<script>window.location = 'admin.php';</script>");
                            }
                            else
                            {
                                $users = mysqli_query($db,"INSERT INTO `train_schedules`(`train_number`, `number_of_seats`, `seats_available`, `departure_station`, `destination_station`, `departure_time`, `arrival_time`, `date`) VALUES('$tno','$seats','$seatsavailable','$dep','$dest','$dtime','$atime','$date')");
                                //var_dump($users);

                                echo("<script>alert('Successfuly train details')</script>");
                                echo("<script>window.location = 'admin.php';</script>");
                            }
                        }
                    }
             }
         }

    }
}

function account()
{
    if(!empty($_POST))
    {       
        include 'connect.php';
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $no = $_POST['no'];
        $pass= $_POST['pass'];
        $cpass = $_POST['cpass'];
        $add = $_POST['add'];
        
        $num_length = strlen((string)$pass);

        if ($id == "" || $name == "" || $email == "" || $no == "" || $pass == "" || $cpass == "" || $add == "")
        {
            echo("<script>alert('You cannot have empty fields')</script>");
            echo("<script>window.location = 'admin.php';</script>");
        }
        else
        {
            if($num_length < 7)
            {
                echo("<script>alert('Password must be atleast 8 characters long')</script>");
            }
            else
            {
                if($pass <> $cpass)
                {
                    echo("<script>alert('Password Mismatch')</script>");
                }
                else
                {
                    $pass= sha1($pass);
                    $users = mysqli_query($db,"INSERT INTO `administrative_staff`(`staff_id`, `name`, `email`, `phone_number`, `password`, `postal_address`) VALUES('$id','$name','$email','$no','$pass','$add')");
                    //var_dump($users);

                    echo("<script>alert('Account successfully created')</script>");
                    echo("<script>window.location = 'admin.php';</script>");
                }
            }
            
        }
      }
}

function leave()
{
    if(!empty($_POST))
    {
        include 'connect.php';

        $train_id = $_POST['tid'];
        $sql = "SELECT * FROM `train_schedules` WHERE `train_number` = '$train_id'";
        $sql_execute = mysqli_query($db, $sql);
        $train = mysqli_fetch_array($sql_execute);
        $sql_train_id = $train['train_number'];

        //var_dump($sql_train_id);

        if ($sql_train_id != NULL)
        {
            $update_query = "UPDATE `train_schedules` SET `status`= 'Train Left' WHERE `train_number` = '$train_id'";
            $update_query_exe = mysqli_query($db, $update_query);
            //$train_update = mysqli_fetch_array($update_query_exe);

            //$sql_train_status = $train['status'];

            if ($update_query_exe != FALSE)
            {
                echo("<script>alert('Train Status updated successfully')</script>");
                echo("<script>window.location = 'admin.php#left';</script>");
            }
            else
            {
                echo("<script>alert('Error in Update')</script>") . $db->error;
                echo("<script>window.location = 'admin.php#left';</script>");
            }
        }
        else
        {
            echo("<script>alert('That train does not exist')</script>");
            echo("<script>window.location = 'admin.php#left';</script>");
        }
    }
}
?>