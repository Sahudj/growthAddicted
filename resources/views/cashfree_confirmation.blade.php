<!DOCTYPE html>
<html>
<head>
    <title>Cashfree - Signature Generator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
   <?php
   $CASH_FREE_MODE = env('CASH_FREE_MODE');
   ?>
   @if($CASH_FREE_MODE == 'PRODUCTION')
       <script src="https://sdk.cashfree.com/js/ui/2.0.0/cashfree.prod.js"></script>
    @else
        <script src="https://sdk.cashfree.com/js/ui/2.0.0/cashfree.sandbox.js"></script>
    @endif

</head>
<script>
    function redirectToCashFree(){
        const paymentSessionId = "<?php echo isset($payment_session_id) ? $payment_session_id : '' ;?>";
        const cf = new Cashfree(paymentSessionId);
        cf.redirect();
    }

      document.addEventListener("DOMContentLoaded", function() {
        redirectToCashFree();
    });
</script>
</html>
