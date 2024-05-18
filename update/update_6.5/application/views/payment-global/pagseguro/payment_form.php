<?php
//start common code of all payment gateway
if($payment_details['is_instructor_payout_user_id'] > 0){
    $instructor_details = $this->user_model->get_all_user($payment_details['is_instructor_payout_user_id'])->row_array();
    $keys = json_decode($instructor_details['payment_keys'], true);
    $keys = $keys[$payment_gateway['identifier']];
}else{
    $keys = json_decode($payment_gateway['keys'], true);
}
$test_mode = $payment_gateway['enabled_test_mode'];
//ended common code of all payment gateway

if ($test_mode == 1) {

    $psPayUrl = "https://api.sandbox.international.pagseguro.com";
} else {

    $psPayUrl = "https://billing.boacompra.com/payment.php";
}
?>

<form method="POST" name="billing" action="<?php echo $psPayUrl; ?>" >
    <input type="hidden" name="store_id" id="store_id" value="10">
    <input type="hidden" name="return" value="<?php echo $payment_details["success_url"];?>">
    <input type="hidden" name="notify_url" value="<?php echo $payment_details["success_url"];?>">
    <input type="hidden" name="currency_code" id="currency_code" value="BRL">
    <input type="hidden" name="order_id" id="order_id" value="16598">
    <input type="hidden" name="order_description" value="Premium Account 3 months ">
    <input type="hidden" name="amount" id="amount" value="100.00">
    <input type="hidden" name="hash_key" id="hash_key" value="ac87ffee901a1af2b24a6d05f617f152">
    <button class="payment-button float-end gateway <?php echo $payment_gateway['identifier']; ?>-gateway" id="skrill-button1"><?php echo get_phrase('pay_by_pageSeGuro'); ?></button>
</form>