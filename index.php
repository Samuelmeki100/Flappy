<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>index</title>

<?php 
session_start();

?>
<style>

#maincontent {
	width:96%;
	padding: 1.9%;
	border: 1px solid #0CF;
	float: left;
	margin: 1%;
}

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

#note {font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	color:#0CF;
	text-align:center;
	float:left;
}

fieldset #log,#reg {float:right;
	width:100;
	height:160;
	padding-top:1;
	background-color:#F4F8E9;
	}
	
#log {width:20%;
	float:right;
	background-color:#F4F8E9;
	}	

#reg {width:20%;
	margin-top:0.1%;
	margin-left:68%;
		
	}


</style>
<script>

function validateForm() {
    var x = document.forms["login"]["insertemail"].value;
    if (x == null || x == "") {
        alert("Please enter your email");
        return false;
    }
}

</script>

</head>
<body>

<div id="heading">
<h2>GLOBAL STYLING</h2>
</div>

<div id="note"><h3>WELCOME TO GLOBAL STYLING SALON SITE</h3></div>

<br/>
<br/>
<br/>
<br/>



<div id="maincontent">
<form action="" name="login" onsubmit="return validateForm()" method="post">

<fieldset id="log">

<label for="email">Email</label>
<input name="insertemail" type="text" size="30" maxlength="40" />
<br/>
<label for="password">Password</label>
<input name="setpass" type="password" size="30" maxlength="10" />

<div id="submi"><input name="Submit" type="submit" value="Login" /></div>

</fieldset>
</form>


<form action="" method="post" name="register">

<fieldset id="reg">

<div id="para"><p>New to our site? Sign up below...</p></div>

<label for="fistname">First Name</label>
<input name="insertfname" type="text" size="30" maxlength="30" />

<br/>
<label for="lastname">Last Name</label>
<input name="insertlname" type="text" size="30" maxlength="30" />

<br/>
<label for="email">Email Address</label>
<input name="insertemailaddress" type="text" size="30" maxlength="30" />

<br/>
<label for="gender">Gender</label>
<input name="sex" type="radio" value="Male" />Male
<input name="sex" type="radio" value="Female" />Female

<br/>
<br/>
<label for="date">Date of birth</label>
<input name="insertdate" type="text" size="30" maxlength="30" placeholder="yr/m/dy" />

<br/>
<label for="password1">password</label>
<input name="insertpassword1" type="password" size="30" maxlength="30" />

<div id="submi1"><input name="submit" type="submit" value="Register" /></div>

</fieldset>
</form>

</div>

</body>
</html>

<?php
// customer register code
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "globalstylingdb";

if(isset($_POST["submit"])){
	$firstname=$_POST["insertfname"];
	$lastname=$_POST["insertlname"];
	$emailaddress=$_POST["insertemailaddress"];
	$gender=$_POST["sex"];
	$date=$_POST["insertdate"];
	$password=$_POST["insertpassword1"];
	
	$conn=new mysqli("localhost","root","","globalstylingdb");
	
	$result="SELECT Email FROM users WHERE Email='$emailaddress' ";

if ($conn->query($result)==!TRUE){
    
		echo "We already have an other User with the same email address";
		 	
	 }
		else{
     
	
	
	$resut=("INSERT INTO
	users
	(FirstName,LastName,Email,Gender,DateOfBirth,Password)
	VALUES 
	('".$firstname."','".$lastname."','".$emailaddress."','".$gender."','".$date."','".$password."')");
	
	if($conn->query($resut)==true){
		echo "<h3>you have been registered</h3>";
	}else{
		echo "<h3>Could not Register</h3>";
	}
}
}
//customer login code
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "globalstylingdb";

if(!empty($_POST["Submit"])){
	$email=$_POST["insertemail"];
	$password=$_POST["setpass"];

		
	
// Create connection
$conn =mysqli_connect("localhost","root","","globalstylingdb");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}


$result=mysqli_query($conn,"SELECT 	users_ID,Email, Password from users");

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		
	
		if($row['Email']==$email && $row['Password']==$password ){
			
		
			$_SESSION["users_ID"] = $row['	users_ID'];
			$_SESSION["Email"] = $row['Email'];
			 
		     header("location:customer.php");
	 
		 break;
	        }
		 }
}
     else {
		 $_SESSION["count"]=+1;
		 if($_SESSION["count"]>3){
			 echo "You have had too many trys <strong>Please Try Again later";
			 header("location:Blank.html");
		 }
		 
		 
    echo "Invaride username, Password";
		}
	}


	
?>

