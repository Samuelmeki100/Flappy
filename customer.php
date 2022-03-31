<?php
session_start();

echo $passpace=$_SESSION["Email"];
	$ID=$_SESSION["users_ID"];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>customer</title>
</head>
<style>

#heading {font-family:Tahoma, Geneva, sans-serif;
	font-size:24px;
	text-align:center;
	color:#0CF;
	padding-bottom:0;
	padding-top:0;
	height: 10%;
	background:#FFF;
	padding:0%;
	clear: left;
	width:96%;
}

#heading {border-bottom-style:outset;
	border-top-style:solid;
	border-bottom-right-radius:80%;
	border-top-left-radius:80%;
}
table {border-style:solid;
		border: 5px solid #CCCCCC ;}
		
#appointment {width:45%;}


</style>

<body>

<div id="maincontent">

<div id="heading"><h2>GLOBAL STYLING</h2></div>



<?php

$tritement=$_POST['insertp'];
$pt=$_POST['insertHS'];
$sex=$_POST['sex'];
$date=$_POST['insertdate'];
$time=$_POST['inserttime'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "globalstylingdb";

// Create connection
$conn =mysqli_connect("localhost","root","","globalstylingdb");


$sql1="INSERT INTO `appointment`( `TimeOfAppointment`, `DateOfAppointment`, `AppointmentProductID`, `CustomerID`, `AppointmentPlace`)
 VALUES ('$time','$date','$tritement','$ID','$ID',)";

 if($conn->query($sql1)==true){
	 Email($date,$time,$tritement,$passpace);
 }


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT Name, Cost FROM products";
 $result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Product_Name</th><th>Product_Cost</th></tr>";         
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Name"]."</td><td>".$row["Cost"]."</td></tr>";
		
    }
    echo "</table>";
}
	 else {
	 echo "0 results"; 
	 }
	 
/*---------------------------------------------------------------------------------*/
     

$sqlget = "SELECT Treatments_Name,Deitails,	Price FROM treatments";
 $result = $conn->query($sqlget);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Trieatment_Name</th><th>Trieatment_Cost</th></tr>";         
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Name"]."</td><td>".$row["Cost"]."</td></tr>";
		
    }
    echo "</table>";
}
	 else {
	 echo "0 results"; 
	 }
	 
	 
	 

function Email($data,$time,$tritement,$passpace){
	
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                              

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = ' smtp.gmail.com';            // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'fnyirenda500@gmail.com';                 // SMTP username
$mail->Password = 'chizamsoka';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('($passpace)', 'Customer');
$mail->addAddress('nyirenda500@gmail.com', 'Francisco');     // Add a recipient
$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('info@example.com', 'Information');
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');

$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Appoint Booking';
$mail->Body    = $data.'</br>'.$time .'<strong>'.$tritement.'</strong>';

$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo."<br>Please try agin later";
} else {
    echo 'Message has been sent</br>';
	
} 
	
	
}


/*--
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "globalstylingdb";

// Create connection
$conn =mysqli_connect("localhost","root","","globalstylingdb");

	$sql =" SELECT * FROM `products`";
	
	$result=$conn->query($sql);
	if($result->num_rows>0)
	{
		echo "<table>";
		echo "<tr>
		<td><label for='products'>Products:</label>
		<select name=\"style\">";
		while($row=$result->fetch_assoc())
		{
					$Style=$row["Name"];
			echo"	
				<option>$Style </option>
				";
		
		}
		echo "</select></td>";
		
		echo "</table>";
		
	}
--*/

$conn->close();
?>



<form action="" name="booking" onsubmit="return validateForm()" method="post">

<fieldset id="appointment">
<table>
<tr>
<td><label for="Product">Product</label></td>
<td><input name="insertp" type="text" size="15" maxlength="30" /></td>
</tr>

<tr>
<td><label for="Style">Hair Style</label></td>
<td><input name="insertHS" type="text" size="15" maxlength="40" /></td>
</tr>

<tr>
<td><label for="gender9">Salon</label></td>
<td><input name="sex" type="radio" value="paris" />Paris</td>
<td><input name="sex" type="radio" value="london" />London</td>
<td><input name="sex" type="radio" value="new York" />New York</td>
</tr>

<tr>
<td><label for="DT">Date</label></td>
<td><input name="insertdate" type="date" size="15" maxlength="40" /></td>
</tr>

<tr>
<td><label for="DT">Time</label></td>
<td><input name="inserttime" type="Time" size="15" maxlength="40" /></td>
</tr>





<tr>
<td><input name="submit" type="submit" value="Book Appointment" /></td>
</tr>



</table>

</fieldset>

</div>
</body>
</html>                                         