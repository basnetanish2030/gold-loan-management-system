<?php
    $conn = mysqli_connect("localhost","root","","bandhaki");

    if(isset($_POST['check'])){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password =  mysqli_real_escape_string($conn, $_POST['password']);

        $sql = "SELECT * FROM client_info WHERE username='$username' AND password='$password' ";
        $exe = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($exe) > 0){
            session_start();
            $_SESSION['username'] = $username;

            $instr = "SELECT * FROM client_info WHERE username = '$username' ";
            $query = mysqli_query($conn,$instr);
            if(mysqli_num_rows($query) > 0){
            while($rows = mysqli_fetch_assoc($query)){
                $org_name = $rows['org_name'];
                }

            } 
            $_SESSION['org_name'] = $org_name;   
            header("Location:dashboard.php");
        }
        else{
            echo "<p class='failed'>Incorrect username or password.<p>";
        }
    }

?>