<?php
  
if($_POST) {
    $first_name = "";
    $last_name = "";
    $email_add = "";
    $phone_num = "";
    $message = "";
    $recipient = "sam.medriano@outlook.com";
    $email_body = "<div>";
      
    if(isset($_POST['first_name'])) {
        $first_name = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>First Name:</b></label>&nbsp;<span>".$first_name."</span>
                        </div>";
    }

    if(isset($_POST['last_name'])) {
        $last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Last Name:</b></label>&nbsp;<span>".$last_name."</span>
                        </div>";
    }
 
    if(isset($_POST['email_add'])) {
        $email_add = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email_add']);
        $email_add = filter_var($email_add, FILTER_VALIDATE_EMAIL);
        $email_body .= "<div>
                           <label><b>Email Address:</b></label>&nbsp;<span>".$email_add."</span>
                        </div>";
    }
      
    if(isset($_POST['message'])) {
        $message = htmlspecialchars($_POST['message']);
        $email_body .= "<div>
                           <label><b>Visitor Message:</b></label>
                           <div>".$message."</div>
                        </div>";
    }
      
    $email_body .= "</div>";
 
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";
      
    if(mail($recipient, $email_title, $email_body, $headers)) {
        echo "<p>Thank you for contacting us, $visitor_name. You will get a reply within 24 hours.</p>";
    } else {
        echo '<p>We are sorry but the email did not go through.</p>';
    }
      
} else {
    echo '<p>Something went wrong</p>';
}
?>