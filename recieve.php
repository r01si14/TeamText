<?php

    include "smsGateway.php";
    $smsGateway = new SmsGateway('USERNAME', 'PASSWORD'); // Add login details for SMS Gateway here

    $result = $smsGateway->getMessages(1);

    $message = $result['response']['result'][0]['message'];
    $phone_no = ($result['response']['result'][0]['contact']['number']);

?>
