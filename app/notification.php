<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Bandhaki System
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->

  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <link rel="stylesheet" href="out.css">
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a class="simple-text logo-normal">
      <?php
            session_start();
            if(isset($_SESSION['username'])){
              include 'db_conn.php';
              $username = $_SESSION['username'];
              $org_name = $_SESSION['org_name'];
              
              echo "$org_name";
            }
            else{
              echo "Unauthorized Access";
              header("Location: index.html");
              exit;
            }
          ?>
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="./dashboard.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./emicalculator.php">
              <i class="material-icons">person</i>
              <p>EMI Calculator</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./form.php">
              <i class="material-icons">content_paste</i>
              <p>Form</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="./notification.php">
              <i class="material-icons">content_paste</i>
              <p>Notifications</p>
            </a>
          </li>
          <li class="nav-item active-pro ">
            <a class="nav-link" href="./logout.php">
              <i class="material-icons">unarchive</i>
              <p>Log Out</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      
      <div class='table col-md-8'>
            <table class='table table-hover'>
              <thead class=' text-primary'>
                <th>
                  ID
                </th>
                <th>
                  Submission Date
                </th>
                <th>
                  Name
                </th>
                <th>
                  Days left
                </th>
              </thead>
              <tbody>
      <?php
        

        $sql = "SELECT * FROM notify";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
          while ($trans = mysqli_fetch_assoc($result)) {
                $trans_id = $trans['trans_id'];
                $exp_date = $trans['exp_date'];
                $customer_name = $trans['customer_name'];

                $date1 = date('d-m-Y');
                $date2 = date('d-m-Y', strtotime($exp_date));
        
                $interval = strtotime($date2) - strtotime($date1);
                $days = abs(round($interval/86400));

                echo "
                    <tr>
                        <td>$trans_id</td>
                        <td>$exp_date</td>
                        <td><a href='profile.php?trans_id=$trans_id'>$customer_name</a></td>
                        <td>$days days left</td>
                    </tr>    
                ";
           }
        }
        

      ?>
          </tbody>
        </table>
       </div>
    </div>
</body>

</html>