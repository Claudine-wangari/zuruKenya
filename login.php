<html>

<head>
    <title>Corporate Login</title>
    <link rel="icon" type="image/jpg" href="logo2.jpg">
    <link rel="stylesheet" href="design.css">

    <div id="titlebar">
        <img id="logo" src="logomain.png" alt='' />
        <h1>Zuru Kenya SGR Tickets</h1>

    </div>
    <nav id="nav">
        <ul>
            <li><a href="home.php#home" id="links">Back to Home</a></li>
        </ul>
    </nav>
</head>

<body>

    <form method="post" style="text-align:center;padding-top:60px;">
        <h2>Welcome<br>Kindly Login.</h2>
        <div id="label">Staff ID:</div>
        <div class="col">
            <input type="text" name="id" class="textbox" placeholder="Staff ID" required>
            <span class="focus-border">
                    <i></i>
                </span>
        </div>
        <div id="label">Password:</div>
        <div class="col">
            <input type="password" name="password" class="textbox" placeholder="Password" required>
            <span class="focus-border">
                    <i></i>
                </span>
        </div>
        <br>
        <br>
        <div class="col" id="butn">
            <input id="button" type="submit" name="submit" value="Login" class="btn">
            <span class="focus-border">
                    <i></i>
                </span>
        </div>
    </form>
</body>

</html>

<?php
include 'connect.php';
if(!empty($_POST))
{
    $id= $_POST['id'];
    $pass= sha1($_POST['password']);

    $query = "SELECT * FROM administrative_staff WHERE staff_id='$id' AND Password ='$pass'";
    $result= mysqli_query($db,$query);
    $row = mysqli_fetch_assoc($result);

    if($row>0)
    {
        session_start();
        $_SESSION['id'] = $row['staff_id'];
        $_SESSION['Name']=$row['name'];
        echo("<script>alert('Login successful')</script>");
        echo("<script>window.location = 'admin.php#booked';</script>");
    }
    else
    {
        echo("<script>alert('Ensure your credentials are correct')</script>");
        echo("<script>window.location = 'login.php';</script>");

    }
}

?>