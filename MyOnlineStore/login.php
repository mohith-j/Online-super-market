<?php
	
	
	session_start();
	if(isset($_POST['submit'])){

		$regno=$_POST['regno'];
		$pass=$_POST['password'];
		mysql_connect("localhost","root","");
		mysql_select_db("almart");
		$_SESSION['reg'] = $regno;
	
		$sql="SELECT * FROM customer WHERE regno='$regno' AND pass='$pass'";
		$result=mysql_query($sql);
		$count=mysql_num_rows($result);

		if($count==1){
			$row=mysql_fetch_array($result);
			/*$_SESSION['uregno']=$row['regno'];
			$_SESSION['upass']=$row['regno'];*/
			header("Location: index.php");
		}
		else{
			header("Location: login.php");

		}
	}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>
		Almart-login

	</title>
	
</head>
<body>
	<header class="showcase">
		<div class="showcase-top">
			<img src="images/logo.png" alt="Netflix">
			<a href="register.php" class="btn btn-rounded">Sign Up</a>
		</div>
		<div id="showcase-content">
			<form method="post" action="login.php">
				REGISTER NUMBER: <input type="text" name="regno" placeholder="REGNO" required><br><br>
				PASSWORD: <input type="password" name="password" placeholder="PASSWORD" required><br><br>
				<div id="scs"><input type="submit" name="submit" value="Login" class="btn btn-xl"></div>
			</form>
		</div>	
	</header>

</body>
</html>