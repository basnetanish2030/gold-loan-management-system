$(function(){

    $("#calculator").submit(function(event){
        event.preventDefault();
        var productwt = $('#productwt').val();
        var rate = $('#rate').val();
        var deduct = $('#deduct').val();
        var valuate = $('#valuate').val();

        $(".valuation").load("valuate.php",{
            productwt: productwt,
            rate: rate,
            deduct: deduct,
            valuate: valuate
        });

    });

    $('#calculation').submit(function(event){
        event.preventDefault();
        var test = $('#test').val();
        var testrate = $('#testrate').val();
        var deduct = $('#deduct').val();
        var valuated_amt = $('#valuation').val();
        var percentage = $('#percentage').val();
        var interest = $('#interest').val();
        var date2 = $("#date").val();
        var calculate = $('#calculate').val();

        $("#showcase").load("full_detail.php",{
            deduct: deduct,
            testrate: testrate,
            test: test,
            valuated_amt: valuated_amt,
            percentage: percentage,
            interest: interest,
            date2: date2,
            calculate: calculate
        })
    })

});