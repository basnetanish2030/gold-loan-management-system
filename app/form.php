<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
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
          <li class="nav-item active">
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
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Customer Profile</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                <?php
                    
                    if(isset($_POST['full_detail'])){
                      $months = mysqli_real_escape_string($conn, $_POST['months']);
                      $date = mysqli_real_escape_string($conn, $_POST['date']);
                      $payable = mysqli_real_escape_string($conn, $_POST['payable']);
                      $productwt = mysqli_real_escape_string($conn, $_POST['productwt']);
                      $rate = mysqli_real_escape_string($conn, $_POST['rate']);
                      $deduct = mysqli_real_escape_string($conn, $_POST['deduct']);
                      $valuated_amt = mysqli_real_escape_string($conn, $_POST['valuated_amt']);
                      $percentage = mysqli_real_escape_string($conn, $_POST['percentage']);
                      $interestrate = mysqli_real_escape_string($conn, $_POST['interestrate']);
                      
                    }

                ?>
                  <form action="submission.php" method="POST">
                    <input type='number' class='form-control mb-3 col-md-3' name='months' value='<?php echo $months;?>' hidden>
                    <input type="text" name="date" value="<?php echo $date;?>" hidden>
                    <input type="number" name="productwt" value="<?php echo $productwt;?>" hidden>
                    <input type="number" name="rate" value="<?php echo $rate;?>" hidden>
                    <input type="number" name="deduct" value="<?php echo $deduct;?>" hidden>
                    <input type="number" name="valuated_amt" value="<?php echo $valuated_amt;?>" hidden>
                    <input type="number" name="interest_rate" value="<?php echo $interestrate;?>" hidden>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Loan Amount</label>
                          <div class="input-group">
                          <input type="number" class="form-control col-md-9" name="loan_amt" value="<?php echo $payable; ?>" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Metal Type</label>
                          <div class="input-group">
                            <select type="text" class="form-control" name="metal_type">
                              <option value="Gold">Gold</option>
                              <option value="Silver">Silver</option>
                            </select>
                            
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Full Name</label>
                          <div class="input-group">
                            <select type="text" class="form-control col-md-2 ml-2 gen" name="gender">
                              <option value="Ms.">Ms.</option>
                              <option value="Mr.">Mr.</option>
                            </select>
                            <input type="text" class="form-control col-md-9" name="fullname" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input type="text" class="form-control" name="address" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Contact</label>
                          <input type="text" class="form-control" name="contact" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Product Quantity</label>
                          <input type="text" class="form-control" name="product_qt" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Description</label>
                          <textarea type="text" class="form-control" name="description">
                          </textarea>
                        </div>
                      </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>

</html>