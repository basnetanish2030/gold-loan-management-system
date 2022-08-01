<?php
    include 'db_conn.php';
    if(isset($_POST['notify_date'])){
        $notify_date = $_POST['notify_date'];
        $trans_id = $_POST['trans_id'];
        $customer_name = $_POST['customer_name'];

        $sql = "INSERT INTO notify(trans_id, exp_date, customer_name)
        VALUES('$trans_id','$notify_date', '$customer_name')";

        mysqli_query($conn, $sql);

        header("Location: notification.php");

        
    }

?>