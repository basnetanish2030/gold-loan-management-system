<?php
    include 'db_conn.php';
    if(isset($_POST['sub_paid'])){
        $trans_id = $_POST['trans_id'];
        $paid_type = $_POST['paid_type'];
        $paid_amt = $_POST['paid'];

        $sql = "INSERT INTO paid(trans_id, paid_amt, paid_type)
        VALUES('$trans_id','$paid_amt','$paid_type')";

        mysqli_query($conn, $sql);

        header("Location: profile.php?trans_id=$trans_id");

        
    }

?>