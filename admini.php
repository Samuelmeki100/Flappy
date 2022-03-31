<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>administrator</title>
</head>
<head>
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

ul li {
	list-style:none;
	float:left;
	padding:15;
	margin:15;
	position: relative;
}

#manag,#mp {float:left;}

#mp {padding-left:15%;
	padding-right:15%}
 
#ma,#mu {float:right;}

#ma {float:left;
	padding-right:15%;
	padding-left:5%;
	}
#mu {float:left;
	padding-left:5%;
	}
	
#fd {width:15%;
	margin-left:17%;
	}
		
#add {width:10%;
	}
	
#up {width:11%;
	}	
	
#dp {width:17%;
	}
	
legend {font-size:12px;
	}
		

</style>
</head>
<body>

<div id="heading"><h2>GLOBAL STYLING</h2></div>


<div id="manag"><h4>Home</h4></div>
<div id="mp"><h4>Manage Products</h4></div>
<div id="ma"><h4>Manage Appointments</h4></div>
<div id="mu"><h4>manage users</h4></div>


<form action="" method="post" name="manage products">

<fieldset id="fd">

<fieldset id="add">
<legend>Add Product</legend>
<label  for="add product">Product</label>
<input name="addproduct" type="text" size="15" maxlength="30" /><br/>

<label  for="cost">Cost</label>
<input name="cost" type="text" size="15" maxlength="30" />
<input name="add" type="submit" value="Add" />
</fieldset>

<fieldset id="up">
<legend>Update product</legend>
<label  for="updateproduct">Product</label>
<input name="product ID" type="text" size="15" maxlength="30" /><br/>
<label  for="pcost">cost</label>
<input name="pcost" type="text" size="15" maxlength="30" />
<input name="update" type="button" value="Update" />
</fieldset>

<fieldset id="dp">
<legend>Delete Product</legend>
<label for="products">Product:</label>
<select id="product">
<option value="lotion">lotion</option>
<option value="shampoo">shampoo(all sorts)</option>
<option value="weave">weave</option>
<option value="freeze">Freeze</option>
<option value="gritters">glitters</option>
<option value="cutex">cutex</option>
</select>
<input name="remove" type="button" value="Delete" />
</fieldset>

</fieldset>
</form>

<?php


// adding product code
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "globalstylingdb";

if(isset($_POST["add"])){
	$name=$_POST["addproduct"];
	$pcost=$_POST["cost"];
	
	$conn =mysqli_connect("localhost","root","","globalstylingdb");
	$result=mysqli_query($conn,"INSERT INTO products(Name,Cost) VALUES ('".$name."','".$pcost."')");
	
	if($result==true){
		echo "<h3>product has been added</h3>";
	}
}







?>
</body>
</html>