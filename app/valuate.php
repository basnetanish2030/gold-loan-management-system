<?php

    if(isset($_POST['valuate'])){
        $productwt = $_POST['productwt'];
        $rate = $_POST['rate'];
        $deduct = $_POST['deduct'];

        $ratepergm = $rate/11.664;
        $actualvalue = round($productwt * $ratepergm);
        $deductamt = round(($deduct/100) * $actualvalue);
        $valuation = $actualvalue - $deductamt;

        echo "
            <form id='calculation' method='POST'>
                <label class='text-dark' for=''>Valuation Amount</label>
                <div class='input-group'>
                    <input type='number' class='form-control mb-3 col-md-3' id='valuation' value='$valuation' required>
                    <input type='number' id='percentage' placeholder='%' class='form-control mb-3 col-md-1' required> 
                </div>  
                <input type='number' class='form-control mb-3 col-md-3' id='test' value='$productwt' hidden>
                <input type='number' class='form-control mb-3 col-md-3' id='testrate' value='$rate' hidden>
                <input type='number' class='form-control mb-3 col-md-3' id='deduct' value='$deduct' hidden>      
                <label class='text-dark' for=''>Interest Rate</label>
                <input type='number' class='form-control mb-3 col-md-4' id='interest' required>
                <label class='text-dark' for=''>Time</label>
                <input type='date' class='form-control mb-3 col-md-4' id='date' required>
                <button class='btn btn-primary' href='emicalculator.php'>Clear</button>
                <button class='btn btn-primary' id='calculate' type='submit'>Calculate</button>
                
            </form>
        ";
    }
    
?>
<script type="text/javascript" src="jquery.min.js"></script>
<script src="emicalculator.js"></script>