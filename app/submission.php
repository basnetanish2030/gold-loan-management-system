<?php
    include 'db_conn.php';

    $months = mysqli_real_escape_string($conn, $_POST['months']);
    $set_date = mysqli_real_escape_string($conn, $_POST['date']);
    $productwt = mysqli_real_escape_string($conn, $_POST['productwt']);
    $rate = mysqli_real_escape_string($conn, $_POST['rate']);
    $deduct = mysqli_real_escape_string($conn, $_POST['deduct']);
    $valuated_amt = mysqli_real_escape_string($conn, $_POST['valuated_amt']);
    $interest_rate = mysqli_real_escape_string($conn, $_POST['interest_rate']);
    $loan_amt = mysqli_real_escape_string($conn, $_POST['loan_amt']);
    $metal = mysqli_real_escape_string($conn, $_POST['metal_type']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $product_qt = mysqli_real_escape_string($conn, $_POST['product_qt']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $customer_name = $gender ." ". $fullname;
    $state = "Active";
    

    
    $yearly_int = round(($loan_amt * $interest_rate)/100);
    $monthly_int = round($yearly_int/12);

    $monthly_emi = ($loan_amt + ($monthly_int * $months))/$months;


    $sql = "INSERT INTO full_details(set_date, customer_name, productwt, rate, deduct, valuated_amt, loan_amt, interest_rate, metal, contact, product_qt, descript, addr, months, monthly_int, monthly_emi, state) 
    VALUES('$set_date', '$customer_name', '$productwt', '$rate', '$deduct', '$valuated_amt', '$loan_amt', '$interest_rate', '$metal', '$contact', '$product_qt', '$description', '$address', '$months', '$monthly_int', '$monthly_emi', '$state')";

    mysqli_query($conn, $sql);

    header("Location: dashboard.php");
?>