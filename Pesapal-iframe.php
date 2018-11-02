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
            
        </ul>
    </nav>
</head>
<div style="margin-top:50px;"></div>
<?php
include_once('OAuth.php');


include 'connect.php';
$sql = "SELECT * FROM `tickets` WHERE `id_number` = '".$_GET['id']."'";
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

//pesapal params
$token = $params = NULL;

/*
PesaPal Sandbox is at http://demo.pesapal.com. Use this to test your developement and 
when you are ready to go live change to https://www.pesapal.com.
*/
$consumer_key = 'tfI2ctWrmMgBRZLjyU1J29U4p6moMAhQ';//Register a merchant account on
                   //demo.pesapal.com and use the merchant key for testing.
                   //When you are ready to go live make sure you change the key to the live account
                   //registered on www.pesapal.com!
$consumer_secret = '1s4Y/q5PO5QHZbLSBKeXW0NL9q0=';// Use the secret from your test
                   //account on demo.pesapal.com. When you are ready to go live make sure you 
                   //change the secret to the live account registered on www.pesapal.com!
$signature_method = new OAuthSignatureMethod_HMAC_SHA1(); 
$iframelink = 'http://demo.pesapal.com/api/PostPesapalDirectOrderV4';//change to      
                   //https://www.pesapal.com/API/PostPesapalDirectOrderV4 when you are ready to go live!

//get form details
$amount = $sql_hold['total_price'];
$amount = number_format($amount, 2);//format amount to 2 decimal places

$desc = "Ticket";
$type = "Merchant"; //default value = MERCHANT
$reference = $sql_hold['ticket_number'];//unique order id of the transaction, generated by merchant
$name = $sql_hold1['name'];
$email = $sql_hold1['email'];
$phonenumber = $sql_hold1['phone_number'];;//ONE of email or phonenumber is required

$callback_url = 'http://localhost/sgr/ticket.php'; //redirect url, the page that will handle the response from pesapal.


$_SESSION['tid'] = $id;

$post_xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?><PesapalDirectOrderInfo xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" Amount=\"".$amount."\" Description=\"".$desc."\" Type=\"".$type."\" Reference=\"".$reference."\" FirstName=\"".$name."\" Email=\"".$email."\" PhoneNumber=\"".$phonenumber."\" xmlns=\"http://www.pesapal.com\" />";
$post_xml = htmlentities($post_xml);

$consumer = new OAuthConsumer($consumer_key, $consumer_secret);

//post transaction to pesapal
$iframe_src = OAuthRequest::from_consumer_and_token($consumer, $token, "GET", $iframelink, $params);
$iframe_src->set_parameter("oauth_callback", $callback_url);
$iframe_src->set_parameter("pesapal_request_data", $post_xml);
$iframe_src->sign_request($signature_method, $consumer, $token);

//display pesapal - iframe and pass iframe_src
?>
<form method="post" action="cancel_payment.php">
    <input id="button" type="submit" name="cancel" value="Cancel Payment" class="btn" style="width:200px;text-align:center;margin-left:1100px;" onclick="return confirm('Are you sure you want to cancel payment?')">
</form>

<iframe src="<?php echo $iframe_src;?>" width="100%" height="700px"  scrolling="no" frameBorder="0">
	<p>Browser unable to load iFrame</p>
</iframe>
