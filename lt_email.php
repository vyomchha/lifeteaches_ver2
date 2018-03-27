<?php
	session_start(); 
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$visitor_email = $_POST['email'];
	$orgs = $_POST['orgs'];
	$message = $_POST['inquiry'];
	$host_email = 'contact@lifeteaches.org';
	$email_subject = "Inquiry";
    $email_body1 = "You have received a new message from the $name\n $visitor_email\n\nMessage:\n $message";
    $email_body2 = "Thank you for contacting us.\nWe will get back to you as soon as possible.";
	
	$header1 = "From: $host_email \r\n";
	$header1 .= "Reply-To: $host_email \r\n";
	$header2 = "From: $visitor_email \r\n";
	$header2 .= "Reply-To: $visitor_email \r\n";
	
	mail($host_email,$email_subject,$email_body1,$header2);
	mail($visitor_email,$email_subject,$email_body2,$header1);
	
	header("Location: http://lifeteaches.org");
	exit();
?>

