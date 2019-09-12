<?php
// Change the 4 variables below
$yourName = '';
$yourEmail = '';

$form = "";
$yourSubject = '[Form Contact Form]: ';
$referringPage = '';
// No need to edit below unless you really want to. It's using a simple php mail() function. Use your own if you want
function cleanPosUrl ($str) {
return stripslashes($str);
}

if((isset($_POST['your_email'])&& $_POST['your_email'] !=''))
{
$to = $yourEmail;
$subject = $yourSubject.'';
$message = "Contact Form ";

$message .= '<html><body>';
$message .= "<h1>".cleanPosUrl($_POST['comments'])."</h1>";

$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';


$enquiry_type = htmlentities($_POST['enquiry_type']);
if (($enquiry_type) != '') {
    $message .= "<tr><td>Enquiry_type</td><td>" . $enquiry_type . "</td></tr>";
}

$username = htmlentities($_POST['username']);
if (($username) != '') {
    $message .= "<tr><td>Username</td><td>" . $username . "</td></tr>";
}

$organisation = htmlentities($_POST['organisation']);
if (($username) != '') {
    $message .= "<tr><td>organisation</td><td>" . $organisation . "</td></tr>";
}

$your_email = htmlentities($_POST['your_email']);
if (($your_email) != '') {
    $message .= "<tr><td>E Mail</td><td>" . $your_email . "</td></tr>";
}

$comments = htmlentities($_POST['comments']);
if (($comments) != '') {
    $message .= "<tr><td>Comments</td><td>" . $comments . "</td></tr>";
}

$street = htmlentities($_POST['street']);
if (($street) != '') {
    $message .= "<tr><td>Street</td><td>" . $street . "</td></tr>";
}

$city = htmlentities($_POST['city']);
if (($city) != '') {
    $message .= "<tr><td>City</td><td>" . $city . "</td></tr>";
}

$state = htmlentities($_POST['state']);
if (($state) != '') {
    $message .= "<tr><td>State</td><td>" . $state . "</td></tr>";
}

$zipcode = htmlentities($_POST['zipcode']);
if (($zipcode) != '') {
    $message .= "<tr><td>Zipcode</td><td>" . $zipcode . "</td></tr>";
}

$country = htmlentities($_POST['country']);
if (($country) != '') {
    $message .= "<tr><td>Country</td><td>" . $country . "</td></tr>";
}

$phone = htmlentities($_POST['phone']);
if (($phone) != '') {
    $message .= "<tr><td>Phone</td><td>" . $phone . "</td></tr>";
}

$message .= "</table>";
$message .= '</body></html>';

$headers = "From: ".cleanPosUrl($_POST['your_email'])." <".$_POST['your_email'].">\r\n";
$headers .= 'To: '.$yourName.' <'.$yourEmail.'>'."\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$mailit = mail($to,$subject,$message,$headers);
if ( @$mailit ) {
	echo "Thanks for your enquiry, we'll be in touch shortly.";
}
else {
	echo "Problem in Sending Mail.";
}
}
else
{
echo "Please fill Email Address";
}
?>
