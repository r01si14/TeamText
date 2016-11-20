<?php

    function send_message() {
        include "smsGateway.php";
        $smsGateway = new SmsGateway('USERNAME', 'PASSWORD'); // Add login details for SMS Gateway here

        $deviceID = DEVICEID;
        $number = 'NUMBER';
        $message = 'This was sent from Team Text for the second time';

        $options = [
        'send_at' => strtotime('0 minutes'), // Send the message, insert delay in here
        'expires_at' => strtotime('+1 hour') // Cancel the message in 1 hour if the message is not yet sent
        ];

        $result = $smsGateway->sendMessageToNumber($number, $message, $deviceID, $options);
    }
    
?>