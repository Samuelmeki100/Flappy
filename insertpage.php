<?php

$conn=new mysqli("localhost","root","","globalstylingdb");

	$firstname=$_POST["Firstname"];
	$lastname=$_POST["Lastname"];
	$username=$_POST["Username"];
	$password=$_POST["Password"];
	
	$result=" INSERT INTO
	administrator
	(Username,Password,FirstName,LastName)
	VALUES 
	('$username','$password','$firstname','$lastname')";
	
	if($conn->query($result)==true){
	
	}else{
		echo $conn->error;
	}


	$inser=("INSERT INTO `products` (`products_ID`, `Name`, `Cost`, `Location`) 
	VALUES
    (18, 'Buda', 7565, 'LNP'),
    (29, 'zingongo', 7565, 'LNP'),
    (30, 'one one', 7565, 'LNP'),
    (31, 'con rows', 7565, 'LN')");
	
if($conn->query($inser)==true){
		echo "<h3>admini registered</h3>";
	}else{
		echo $conn->error;
		
	}







?>

