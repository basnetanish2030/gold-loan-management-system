<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    EMI Calculator
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link href="out.css" rel="stylesheet" />
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
          <li class="nav-item  ">
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
          <li class="nav-item">
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
    <?php
        $trans_id = $_GET['trans_id'];
        $sql = "SELECT * FROM full_details WHERE id = '$trans_id' ";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
          while ($trans = mysqli_fetch_assoc($result)) {
            $id = $trans['id'];
            $set_date = $trans['set_date'];
            $date = $trans['date'];
            $customer_name = $trans['customer_name'];
            $addr = $trans['addr'];
            $amount = $trans['loan_amt'];
            $productwt = $trans['productwt'];
            $rate = $trans['rate'];
            $deduct = $trans['deduct'];
            $valuated_amt = $trans['valuated_amt'];
            $interest_rate = $trans['interest_rate'];
            $metal = $trans['metal'];
            $contact = $trans['contact'];
            $product_qt = $trans['product_qt'];
            $description = $trans['descript'];
            $months = $trans['months'];
            $monthly_int = $trans['monthly_int'];
            $monthly_emi = $trans['monthly_emi'];
          }
        }

        $daily_int = round($monthly_int/30);

        $date2 = date('d-m-Y');
        $date1 = date('d-m-Y', strtotime($date));

        $interval = strtotime($date2) - strtotime($date1);
        $days = abs(round($interval/86400));

        $running_int = round($daily_int * $days);
        
        

      ?>
    <div class="main-panel">
        <div class="container-fluid">
            
                <div class="col-md-12">
                    
                        <div class="card card-profile">
                            <div class="row">
                                <div class="card-body col-md-4">
                                    <h6 class="card-category text-gray">Customer</h6>
                                    <h4 class="card-title"><?php echo $customer_name; ?></h4>
                                    <p class="card-description">
                                    <?php echo $addr; ?>
                                    </p>
                                    <p class="card-description">
                                      <?php echo $contact; ?>
                                    </p>
                                    <p class="card-description">
                                      <form action="notify.php" method="POST">
                                          <div class="input-group ml-5">
                                            <input type="date" name="notify_date" class='form-control col-md-6' required>
                                            <input type="int" name="trans_id" value="<?php echo $id; ?>" hidden>
                                            <input type="int" name="customer_name" value="<?php echo $customer_name; ?>" hidden>
                                            <button class="btn btn-primary btn-sm" type="submit" name="notify">Notify</button>
                                          </div>
                                      </form>
                                    </p>
                              
                                </div>

                                <div class="card-body col-md-4">
                                    <h6 class="card-category text-gray">PRODUCT DETAILS</h6>
                                    <h4 class="card-title">Valuated Amount: Rs-<?php echo $valuated_amt; ?></h4>
                                    <h4 class="card-title"><?php echo $metal; ?></h4>
                                    <p class="card-description">
                                        Total Product Quantity:<?php echo $productwt; ?> <br>
                                        No. of Products: <?php echo $product_qt; ?>
                                    </p>
                                    <p class="card-description">
                                      <?php echo $description; ?>
                                    </p>
                                
                                </div>

                                <div class="card-body col-md-4">
                                    <h6 class="card-category text-gray">TRANSACTION DETAILS</h6>
                                    <h4 class="card-title">Date: <?php echo $date; ?></h4>
                                    <h4 class="card-title">Final Date: <?php echo $set_date; ?></h4>
                                    <h4 class="card-title">Deduction: <?php echo $deduct; ?>%</h4>
                                    
                                    <h4 class="card-title">Loan Amount: Rs.<?php echo $amount; ?></h4>
                                    <h4 class="card-title">Interest Rate: <?php echo $interest_rate; ?>%</h4>
                                    <form action="profile.php?trans_id=<?php echo $id; ?>" method="post">
                                      <button type="submit" name="closed" value="Closed" class="btn btn-primary btn-sm">Close Settlement</button>
                                    </form>
                                   <?php
                                      include 'db_conn.php';
                                      if(isset($_POST['closed'])){
                                        $state = $_POST['closed'];
                                        $query = "UPDATE full_details SET state = '$state' WHERE id='$id' ";
                                        mysqli_query($conn, $query);
                                      }
                                      
                                   ?>
                                    
      
                                
                                  
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6 table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <th>Period</th>
                                    <th>EMI</th>
                                    <th>Interest</th>
                                  </thead>
                                  <tbody>
                                   <tr>
                                      <td>Monthly</td>
                                      <td class="text-primary">Rs-<?php echo $monthly_emi; ?></td>
                                      <td class="text-primary">Rs-<?php echo $monthly_int; ?></td>
                                    </tr>
                                    <tr>
                                      <th>Running</th>
                                      <th>Days: <?php echo $days; ?></th>
                                      <th>Rs.<?php echo $running_int; ?></th>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>

                              
                              <div class="col-md-6 table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    
                                    <th width="100px">Date</th>
                                    <th width="100px">Type</th>
                                    <th>Amount Paid</th>
                                  </thead>
                                  <tbody>
                                  <?php
                                    

                                    $sql = "SELECT * FROM paid WHERE trans_id = $trans_id";
                                    $result = mysqli_query($conn, $sql);

                                    if(mysqli_num_rows($result) > 0){
                                      while ($trans = mysqli_fetch_assoc($result)) {
                        
                                            $paid_date = $trans['paid_date'];
                                            $paid_amt = $trans['paid_amt'];
                                            $paid_type = $trans['paid_type'];

                                            echo "
                                                <tr>
                                                    
                                                    <td class='text-primary'>$paid_date</td>
                                                    <td class='text-primary'>$paid_type</td>
                                                    <td class='text-primary'>Rs-$paid_amt</td>
                                                </tr>    
                                            ";
                                      }
                                    }
                                    

                                  ?>
                                    <tr>
                                      <th></th>
                                      <th>Paid Amount</th>
                                      <th class="text-primary">
                                        <form action="paid.php" method="post">
                                          <div class="input-group">
                                            <input type="int" name="trans_id" value="<?php echo $id; ?>" hidden>
                                            <input type="number" name="paid" class="form-control col-md-4 mr-3" required>
                                            <select name="paid_type" class="form-control col-md-3 mr-3" id="paid_type">
                                              <option value="Interest">Interest</option>
                                              <option value="EMI">EMI</option>
                                              <option value="Principal">Principal</option>
                                              <option value="Full Settlement">Full Settlement</option>
                                            </select>
                                            <button type="submit" name="sub_paid" class="btn btn-primary btn-sm">SUBMIT</button>
                                          </div>
                                        
                                        </form>
                                      </th>
                                    </tr>
                                  </tbody>
                                </table>

                                
                              </div>
                            </div>
                        </div>
                      
                       
                    </div>
                </div>

                
            </div>
          </div>
        </div>
     
    </div>
</body>

</html>
