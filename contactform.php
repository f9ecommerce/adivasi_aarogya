<?php ob_start();

if(isset($_POST) && !empty($_POST)) {
 	  $from_email = $_POST["email"]; //sender email
		$recipient_email = 'konnect@3il.in'; //recipient email
		$subject = 'Contact Form'; //subject of email
	
		$message = '<html><body>';
		$message .= '<img src="http://aarushapp.com/images/logo2.png" alt="Aarush" height="50px" width="100px"/>';
		$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
		$message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($_POST['name']) ."</td></tr>";
		$message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['email']) . "</td></tr>";
		
		$message .= "<tr><td><strong>Message:</strong> </td><td>" . htmlentities($_POST['message']) . "</td></tr>";
		$message .= "</table>";
		$message .= "</body></html>";
		
		
		
    
       $user_email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    
   
        $boundary = md5("sanwebe"); 
        //header
        $headers = "MIME-Version: 1.0\r\n"; 
        $headers .= "From:".$from_email."\r\n"; 
        $headers .= "Reply-To: ".$user_email."" . "\r\n";
		
        $headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n"; 
        //plain text 
        $body = "--$boundary\r\n";
        $body .=  "Content-Type: text/html; charset=ISO-8859-1\r\n";  
        $body .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
        $body .= chunk_split(base64_encode($message)); 
     
	
		
 
    $sentMail = @mail($recipient_email, $subject, $body, $headers);
	
	
    if($sentMail) //output success or failure messages
    {       
      echo 1;
    }else{
       echo 0;
    }

	  

       
}

?>

