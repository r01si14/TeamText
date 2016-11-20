<?php
    include "smsGateway.php";
    $smsGateway = new SmsGateway('USERNAME', 'PASSWORD'); // Add login details for SMS Gateway here

    $page = 1;

    $result = $smsGateway->getMessages($page);

    echo json_encode($result);
?>
