<?php
	
include "smsGateway.php";

parseMessage();

function parseText($incomingPhoneNo, $text){

		$conn = new mysqli('localhost', '', '', ''); // MySQL connection details
		
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 



    $sql = "SELECT * FROM texts WHERE telephone = '$incomingPhoneNo' LIMIT 1";
    
		$result = $conn->query($sql);

    
		
    
    if ($result->num_rows > 0) {
    //There is a conversation already started
        //1 - Location Update
        //2 - Service Required Update
        
        $row = $result->fetch_assoc();

        if ($row["ConversationPoint"] == "1") {
//             echo('Conversation Point 1.');
            
            $sql = "UPDATE texts SET location = '$text', ConversationPoint = '2' WHERE telephone = $incomingPhoneNo";
            
            if ($conn->query($sql) === TRUE) {
//              echo "New record created successfully";
            } else {
                //Error inserting row
            }
            
            replyToNumber($incomingPhoneNo, "What are you looking for help with?");
            
        } elseif ($row["ConversationPoint"] == "2") {
            $sql = "UPDATE texts SET category = '$text', ConversationPoint = '3' WHERE telephone = $incomingPhoneNo";
            
            if ($conn->query($sql) === TRUE) {
             //New record created successfully";
            } else {
//                 echo "Error inserting row";
            }
            
            $sql2 = "SELECT * FROM texts WHERE telephone = $incomingPhoneNo";
            
            $result2 = $conn->query($sql2);
            
            
            if ($result2->num_rows == 0) {
                   die("Missing location in the database!  Something has gone wrong.");
            }
            
            $row2 = $result2->fetch_assoc();    
            
            //Here should be the function to return the data from alice:
//             getResults($row2["location"],$text);
            replyToNumber($incomingPhoneNo, "Here are your results...");
            
            replyToNumber($incomingPhoneNo, $row2["category"] . " results in " . $row2["location"] . " will be here");
        }
       
    } else {
    		//Need to start a new conversation
    		$sql = "INSERT INTO texts (telephone, ConversationPoint) VALUES ('$incomingPhoneNo', '1')";
        replyToNumber($incomingPhoneNo, "Hello.  Where are you?");
		    
		    if ($conn->query($sql) === TRUE) {
            //New record created successfully
        } else {
            //Error inserting row
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

}


function replyToNumber($number, $replyText){    
    $smsGateway = new SmsGateway('USERNAME', 'PASSWORD'); // Add login details for SMS Gateway here
	
	  $deviceID = DEVICEID; // put the ID of the device here from SMS Gateway
	  $number = $number;
	  $message = $replyText;
	
	  $options = [
	  'send_at' => strtotime('0 minutes'), // Send the message, insert delay in here
	  'expires_at' => strtotime('+1 hour') // Cancel the message in 1 hour if the message is not yet sent
	  ];
	
	  //$result = $smsGateway->sendMessageToNumber($number, $message, $deviceID, $options);
	  
	  echo($message);
    
}

function getResults($location, $catagory){
    
    
    
    $resultsAsString = "This is where the data is returned from Aliss based on lacaton and catagory";
     
    return $resultsAsString;
}



function parseMessage() {
  $smsGateway = new SmsGateway('USERNAME', 'PASSWORD'); // Add login details for SMS Gateway here

  $result = $smsGateway->getMessages(1);

  $message = $result['response']['result'][0]['message'];
  $phone_no = ($result['response']['result'][0]['contact']['number']);
  
  parseText($phone_no,$message);
}
   



?>