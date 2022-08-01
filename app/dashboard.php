<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Bandhaki
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
          <li class="nav-item active">
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
          <li class="nav-item">
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
      <div class="container">
        <div class="navbar sticky-top">
          <div class="navbrand">
            <h3 class="ml-3">Filters</h3>
          </div>
          <form action="dashboard.php" method="POST" class="navbar-form">
            <div class="input-group no-border">
              <input type="date" name="init" class="form-control col-md-3 mr-4 date">
              <input type="date" name="final" class="form-control col-md-3 mr-5 date">
             <select name="status" class="form-control col-md-3 ml-2" id="type">
                <option value="">Type</option>
                <option value="Active">Active</option>
                <option value="Closed">Closed</option>
              </select>
              <input type="text" name="search" class="form-control col-md-3" placeholder="Search...">
              <button type="submit" name="submit" class="btn btn-white btn-round btn-just-icon">
                <i class="material-icons">search</i>
                <div class="ripple-container"></div>
              </button>
            </div>
          </form>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">person</i>
                <p class="d-lg-none d-md-block">
                  Account
                </p>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                <a class="dropdown-item" href="#">Profile</a>
                <a class="dropdown-item" href="#">Settings</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Log out</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class='table col-md-8'>
            <table class='table table-hover'>
              <thead class=' text-primary'>
                <th>
                  ID
                </th>
                <th>
                  Date
                </th>
                <th>
                  Name
                </th>
                <th>
                  Address
                </th>
                <th>
                  Amount
                </th>
              </thead>
              <tbody>

              <?php
              
                if (!isset($_POST['submit'])) {
      
                  $sql = "SELECT * FROM full_details ORDER BY id DESC";
                  $result = mysqli_query($conn, $sql);

                  if(mysqli_num_rows($result) > 0){
                    while ($trans = mysqli_fetch_assoc($result)) {
                      $id = $trans['id'];
                      $date = $trans['date'];
                      $customer_name = $trans['customer_name'];
                      $addr = $trans['addr'];
                      $amount = $trans['loan_amt'];
                      

                      echo "

                          <tr>
                            <td>$id</td>
                            <td>$date</td>
                            <td><a href='profile.php?trans_id=$id'>$customer_name</a></td>
                            <td>$addr</td>
                            <td>Rs-$amount</td>
                          </tr>
                        
                      ";
                  }
                 }
                }
              if (isset($_POST['submit'])) {
                
                $initial = $_POST['init'];
                $final = $_POST['final'];
                
                $instr = "SELECT * FROM full_details WHERE date BETWEEN '$initial' AND '$final' ORDER BY id DESC";
                $query = mysqli_query($conn,$instr);
                if(mysqli_num_rows($query) > 0){
                  while($rows = mysqli_fetch_assoc($query)){
                    echo "<tr><td>$rows[id]</td>
                              <td>$rows[date]</td>
                              <td><a href='profile.php?trans_id=$rows[id]'>$rows[customer_name]</a></td>
                              <td>$rows[addr]</td>
                              <td>$rows[loan_amt]</td>

                          </tr>";
                  }
    
                }
                
              }

              if (!empty($_POST['status'])){
                
                $status = $_POST['status'];  
                $instr = "SELECT * FROM `full_details` WHERE state = '$status' ORDER BY id DESC";
                $query = mysqli_query($conn,$instr);
                if(mysqli_num_rows($query) > 0){
                  while($rows = mysqli_fetch_assoc($query)){
                    echo "<tr>
                      <td>$rows[id]</td>
                      <td>$rows[date]</td>
                      <td><a href='profile.php?trans_id=$rows[id]'>$rows[customer_name]</a></td>
                      <td>$rows[addr]</td>
                      <td>$rows[loan_amt]</td>
                    </tr>";
                  }
    
                }
                
              }

              if (!empty($_POST['search'])){
                
                $name = $_POST['search'];
                $sname = preg_replace("#[^0-9a-z]#i","",$name);
                
                
                $instr = "SELECT * FROM `full_details` WHERE customer_name LIKE '%$sname%' ORDER BY id DESC ";
                $query = mysqli_query($conn,$instr);
                if(mysqli_num_rows($query) > 0){
                  while($rows = mysqli_fetch_assoc($query)){
                    echo "<tr>
                      <td>$rows[id]</td>
                      <td>$rows[date]</td>
                      <td><a href='profile.php?trans_id=$rows[id]'>$rows[customer_name]</a></td>
                      <td>$rows[addr]</td>
                      <td>$rows[loan_amt]</td>
                    </tr>";
                  }
    
                }
                
              }
                
              
              
        ?>
     
          </tbody>
        </table>
       </div>
    </div>
</body>

</html>