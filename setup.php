<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "globalstylingdb";


 
$conn= new mysqli("Localhost","root","");

$creaDB=("CREATE DATABASE IF NOT EXISTS globalstylingdb");

if($conn->query($creaDB)==true){
	echo "DateBase created</br>";
	
	
}else{
	echo "<fieldset><font color='red'>Error creating database:" . $conn->error."</font></br></fieldset>"; 

}


$conn->select_db("globalstylingdb");





$createT1=("CREATE TABLE IF NOT EXISTS
 `administrator`
 (`Username` tinytext NOT NULL,
 `Password` tinytext NOT NULL,
 `FirstName` tinytext NOT NULL,
 `LastName` tinytext NOT NULL)");
 
 if($conn->query($createT1)==true){
	echo "administrator Table<br/>";
	
	
}else{
	echo "<fieldset><font color='red'>Error creating administrator:" . $conn->error."</font></br></fieldset>"; 

}
 




$createT3=("CREATE TABLE IF NOT EXISTS
 salon 
 (salon_ID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
 Name tinytext NOT NULL,Location mediumtext NOT NULL,
 Currency tinytext NOT NULL)");

   if($conn->query($createT3)==true){
	echo "salon Table<br/>";
	}else{
	echo "<fieldset><font color='red'>Error creating salon:" . $conn->error."</font></br></fieldset>"; 

}

   
   
   
   
$createT4=("CREATE TABLE IF NOT EXISTS
 users 
 (users_ID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  FirstName tinytext NOT NULL,
 `LastName` tinytext NOT NULL,
 `Email` varchar(255) NOT NULL UNIQUE KEY,
 `Gender` tinytext NOT NULL,`DateOfBirth` date NOT NULL,
 `Password` tinytext NOT NULL)
 ");

 
 
   if($conn->query($createT4)==true){
	echo "Users Table<br/>";
	}else{
	echo "<fieldset><font color='red'>Error creating user:" . $conn->error."</font></br></fieldset>"; 

}
 
 

 
 
 
 $createT6=("CREATE TABLE IF NOT EXISTS
 `appointment` 
 (appointment_ID int NOT NULL AUTO_INCREMENT,
 `TimeOfAppointment` time NOT NULL,
 `DateOfAppointment` date NOT NULL,
 `AppointmentProductID` int NOT NULL,
 `CustomerID` int NOT NULL,
 `AppointmentPlace` tinytext NOT NULL,
  PRIMARY KEY (appointment_ID))
 ");

   if($conn->query($createT6)==true){
	echo "appointment Table<br/>";
	}else{
	echo "<fieldset><font color='red'>Error creating appointment" . $conn->error."</font></br></fieldset>"; 

}


$createT2=("CREATE TABLE IF NOT EXISTS
 products
(Products_ID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
 Name tinytext NOT NULL,
 Cost int NOT NULL,
 Location tinytext NOT NULL)")
 ;
 
 if($conn->query($createT2)==true){
	echo "Produscts Table<br/>";
	
	
}else{
	echo "<fieldset><font color='red'>Error creating products:" . $conn->error."</font></br></fieldset>"; 

}



$createT5=("CREATE TABLE IF NOT EXISTS
 appointmentproducts 
 (appointment_ID int,
  Products_ID int,
  FOREIGN KEY (appointment_ID)  REFERENCES   appointment(appointment_ID),
  FOREIGN KEY (Products_ID)  REFERENCES   products(Products_ID))");

 
   if($conn->query($createT5)==true){
	echo "appointmentproducts Table<br/>";
	}else{
	echo "<fieldset><font color='red'>Error creating appointmentproducts " . $conn->error."</font></br></fieldset>"; 

	} 
	
	
	$sqlTreat="CREATE TABLE Treatments(
	Treatments_No INT(8) NOT NULL,
	Treatments_Name VARCHAR(40),
	Deitails VARCHAR(100),
	Price DOUBLE,
	PRIMARY KEY(Treatments_Name)
	)";


	//check if Treatmentstable created
	if($conn->query($sqlTreat)==TRUE){
	echo" Treatments table Created";
	}else{
	echo"<font color='red'>Error Creating Treatments :".$conn->error."</font></br>";
		} 
	


 
?>


<html>

<head>

<style>

fieldset {float:right;
height:160;
padding-top:1;
background-color:#999;}

label{font-size:18px;
font-family:Arial, Helvetica, sans-serif;
font-style:normal;}

</style>

</head>

<body>

<form action="insertpage.php" method="POST" name="Admin"> 	

<fieldset>


<table>

<br/>

<tr>
<td><label for="firstname">First Name:</label></td>
<td><input name="Firstname" type="text" maxlength="30" /></td>
</tr>

<tr>
<td><label for="lastname">Last Name:</label></td>
<td><input name="Lastname" type="text" maxlength="30" /></td>
</tr>

<tr>
<td><label for="username">Username:</label></td>
<td><input name="Username" type="text" maxlength="30" /></td>
</tr>

<tr>
<td><label for="password">Password:</label></td>
<td><input name="Password" type="Password" maxlength="20" /></td>
</tr>

<tr>
<td> <input name="Submit" type="submit" value="Send" /> </td>

</table>


</fieldset>

</form>


</body>
</html>