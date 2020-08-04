<?php
	
if(isset($_POST['submit1'])){


	$regno=$_POST['regno1'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$pass=$_POST['password1'];
	$phno=$_POST['phno'];
	$blockname=$_POST['blockname'];
	$roomno=$_POST['roomno'];
	$conn=mysqli_connect("localhost","root","");
	mysqli_select_db($conn, "almart");
		
	$result=mysqli_query($conn, "INSERT INTO customer(regno, name, email_id,pass,phno,hostel_block,room_no) VALUES ('$regno','$name','$email','$pass',$phno,'$blockname','$roomno')")
			or die("Registration not Successful");
	if($result==true){
		
		header("Location: login.php");

	}
	else{
		
		header("Location: register.php");
	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Almart-Register</title>
</head>
<body>
<div class="showcase">
<div class="showcase-top"><h1>REGISTER</h1></div><br><br>

	<div id="inputRegister">
	<form method="post" action="register.php">
		Registration No.: <input type="text" name="regno1" placeholder="REGISTER NO." required><br><br>
		Name: <input type="text" name="name" placeholder="FULL NAME" required><br><br>
		Email-id: <input type="email" name="email" placeholder="Email-id" required><br><br>
		Password: <input type="password" name="password1" placeholder="Password" required><br><br>
		Mobile No.: <input type="text" name="phno" placeholder="Mobile-No" required><br><br>
		Hostel Block: <input type="text" name="blockname" placeholder="Hostel Block" required><br><br>
		Room No: <input type="text" name="roomno" placeholder="Only room number" required><br><br>
		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input class="btn btn-lg" type="submit" name="submit1" value="Register"><br><br>
	</form>
	</div>
</div>
</body>
</html>