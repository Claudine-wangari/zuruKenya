<?php
if(!empty($_POST))
{
    include 'connect.php';
    session_start();
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
    ///$sql_run_update_hold = mysqli_fetch_array($sql_run_update);

    $sql_delete_tickets = mysqli_query($db,"DELETE FROM `tickets` WHERE `id_number` = '$id'");
    //$sql_delete_tickets_hold = mysqli_fetch_array($sql_delete_tickets);

    $sql_delete_customers = mysqli_query($db, "DELETE FROM `customers` WHERE `id_number` = '$id'");
    //$sql_delete_customers_hold = mysqli_fetch_array($sql_delete_customers);

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

?>