
<?php
    if(isset($_POST['calculate'])){
        $productwt = $_POST['test'];
        $rate = $_POST['testrate'];
        $deduct = $_POST['deduct'];
        $valuated_amt = $_POST['valuated_amt'];
        $percentage = $_POST['percentage'];
        $interestrate = $_POST['interest'];
        $date1 = date('d-m-Y');
        $date = $_POST['date2'];
        $date2 = date('d-m-Y', strtotime($date));

        $interval = strtotime($date2) - strtotime($date1);
        $days = abs(round($interval/86400));
        $months = abs(round($days/30));

        $payable = round(($valuated_amt * $percentage)/100);
        $yearly_int = round(($payable * $interestrate)/100);
        $halfyearly_int = round($yearly_int/2);
        $quarterly_int = round($yearly_int/4);
        $monthly_int = round($yearly_int/12);
        $daily_int = round($monthly_int/30);
        $monthly_emi = round(($payable + ($monthly_int * $months))/$months);

        echo "
            
            <div class='card-body'>
                <h4 class='font-weight-bold'>Interest</h4>
                <div class='table-responsive'>
                  <table class='table table-hover'>
                    <thead class=' text-primary'>
                      <th>
                        Period
                      </th>
                      <th>
                        Amount
                      </th>
                      
                    </thead>
                    <tbody>
                      <tr>
                        
                        <td>
                          Yearly
                        </td>
                        
                        <td class='text-primary'>
                          Rs- $yearly_int
                        </td>
                      </tr>
                      <tr>
                        
                        <td>
                          Half-Yearly
                        </td>
                        
                        <td class='text-primary'>
                          Rs- $halfyearly_int
                        </td>
                      </tr>
                      <tr>
                        
                        <td>
                          Quarterly
                        </td>
                        
                        <td class='text-primary'>
                          Rs- $quarterly_int
                        </td>
                      </tr>
                      <tr>
                        
                        <td>
                          Monthly
                        </td>
                        
                        <td class='text-primary'>
                          Rs- $monthly_int
                        </td>
                      </tr>
                      <tr>
                        
                        <td>
                          Daily
                        </td>
                        
                        <td class='text-primary'>
                          Rs- $daily_int
                        </td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
                <h4 class='font-weight-bold'>EMI</h4>
                <div class='table-responsive'>
                  <table class='table table-hover'>
                    <thead class=' text-primary'>
                      <th>
                        Period
                      </th>
                      <th>
                        Amount
                      </th>
                      
                    </thead>
                    <tbody>
                      <tr>  
                        <td>
                          Monthly-EMI
                        </td>
                        
                        <td class='text-primary'>
                          Rs- $monthly_emi
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                
              <form id='pass_details' action='form.php' method='POST'>
                  <h3 class='font-weight-bold mt-5 pt-4'>
                    Payable Amount: Rs.$payable
                  </h3>
                  <input type='number' class='form-control mb-3 col-md-3' name='months' value='$months' hidden>
                  <input type='text' class='form-control mb-3 col-md-3' name='date' value='$date' hidden>
                  <input type='number' class='form-control mb-3 col-md-3' name='payable' value='$payable' hidden>
                  <input type='number' class='form-control mb-3 col-md-3' name='productwt' value='$productwt' hidden>
                  <input type='number' class='form-control mb-3 col-md-3' name='rate' value='$rate' hidden>
                  <input type='number' class='form-control mb-3 col-md-3' name='deduct' value='$deduct' hidden>
                  <input type='number' class='form-control mb-3 col-md-3' name='valuated_amt' value='$valuated_amt' hidden>
                  <input type='number' class='form-control mb-3 col-md-3' name='percentage' value='$percentage' hidden>
                  <input type='number' class='form-control mb-3 col-md-3' name='interestrate' value='$interestrate' hidden>
                  <button class='btn btn-primary col-md-12' name='full_detail' type='submit'>Apply Now</button>
              </form>
              </div>
            </div>
            </div>
          </div>
         
              
        ";
    }
?>