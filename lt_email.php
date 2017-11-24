<?php
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$visitor_email = $_POST['email'];
	$orgs = $_POST['orgs'];
	$message = $_POST['inquiry'];
	$host_email = 'yael@lifeteaches.org';
	$email_subject = "Inquiry";
    $email_body1 = "You have received a new message from the $name\n $visitor_email\n\nMessage:\n $message";
    $email_body2 = "Thank you for contacting us.\nWe will get back to you as soon as possible.";
	
	$header1 = "From: $host_email \r\n";
	$header1 .= "Reply-To: $host_email \r\n";
	$header2 = "From: $visitor_email \r\n";
	$header2 .= "Reply-To: $visitor_email \r\n";
	if (strlen($orgs)>0) {
		$email_subject = "Donation";
		$email_body1 = "You have received a new message from the $name\n $visitor_email\norganization selected: $orgs\n\nMessage:\n $message";
		$email_body2 = "Thank you for contacting us.\nWe have recieved your message, once your donatation is validated we will forward it to $orgs.";
		mail($host_email,$email_subject,$email_body1,$header2);
		mail($visitor_email,$email_subject,$email_body2,$header1);
		echo "<form action='https://www.paypal.com/cgi-bin/webscr' method='post' id='paypal_form' target='_top'>";
		echo "<input type='hidden' name='cmd' value='_s-xclick'>";
		echo "<input type='hidden' name='hosted_button_id' value='LUQ3M5XCZA7RS'>";
		echo "<input type='submit' name='send' style='background-color:white;font-size:20px;' value='REDIRECTING TO Life Teaches Foundation ON PAYPAL '></form>";
		?>
<script type="text/javascript">
    document.getElementById('paypal_form').submit(); // SUBMIT FORM
</script>
<?php
	}
	else {
		mail($host_email,$email_subject,$email_body1,$header2);
		mail($visitor_email,$email_subject,$email_body2,$header1);
		
		header("Location: http://www.lifeteaches.org/");
		exit();
	}
?>

