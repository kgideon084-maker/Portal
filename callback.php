<?php
$data = json_decode(file_get_contents('php://input'), true);
$log_entry = date('Y-m-d H:i:s') . " => " . json_encode($data) . "\n";
file_put_contents('payments.log', $log_entry, FILE_APPEND);
if(isset($data['status']) && $data['status'] == 'Success'){
    $amount = $data['amount'];
    $phone = $data['phone_number'];
    $reference = $data['external_reference'];
    $success_message = "✅ PAYMENT RECEIVED: Ksh".$amount." from ".$phone." Ref: ".$reference."\n";
    file_put_contents('payments.log', $success_message, FILE_APPEND);
}
http_response_code(200);
echo "OK";
?>
