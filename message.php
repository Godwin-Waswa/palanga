<!DOCTYPE html>
<?php
	// Authorisation details.
    if(isset($_POST['login'])){
	$username = "waswagodwin19@gmail.com";
	$hash = "eb1d89e6d6d5d13badda25bbe523da0d091faba9ed3250296e20be67dc3567c1";

	// Config variables. Consult http://api.txtlocal.com/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
    $name = $_POST['name'];
	$sender = "API Test"; // This is who the message appears to be from.
	$numbers = $_POST['number']; // A single number or a comma-seperated list of numbers
    $otp = mt_rand(10000, 99999);
	$message = "Hello".$name."your otp is".$otp;
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('https://api.txtlocal.com/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
    echo "OTP SENT SUCCESSFULLY";
	curl_close($ch);
}
?>
<html>
    <head>
        <title>SMS OTP</title>
        <style>
            form{
                align-content: center;
            }
            input {
                line-height: 40px;
                align-items: center;
                margin-left: 40%;
                margin-right: 40%;
                margin-top: 2%;
                width: 40%;
            }
        </style>
    </head>
    <body>
        <form action="message.php" method="post">
            <input type="text" name="name" id="name" placeholder="enter your first name"><br>
            <input type="text" name="number" id="number" placeholder="enter your number"><br>
            <input type="textarea" name="message">
            <input type="submit" name="login" value="SEND">
        </form>
    </body>
</html>