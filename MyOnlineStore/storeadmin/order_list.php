<?php 
session_start();
if (!isset($_SESSION["manager"])) {
    header("location: admin_login.php"); 
    exit();
}
// Be sure to check that this manager SESSION value is in fact in the database
$managerID = preg_replace('#[^0-9]#i', '', $_SESSION["id"]); // filter everything but numbers and letters
$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["manager"]); // filter everything but numbers and letters
$password = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["password"]); // filter everything but numbers and letters
// Run mySQL query to be sure that this person is an admin and that their password session var equals the database information
// Connect to the MySQL database  
include "../storescripts/connect_to_mysql.php"; 
//$sql = mysqli_query($conn, "SELECT * from products /*WHERE id='$managerID' AND username='$manager' AND password='$password' LIMIT 1*/"); // query the person
$sql="SELECT * from admin";
$result=mysqli_query($conn, $sql);
// ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
$existCount = mysqli_num_rows($result); // count the row nums
if ($existCount == 0) { // evaluate the count
	 echo "Your login session data is not on record in the database.";
     exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Store Admin Area</title>
<link rel="stylesheet" href="../style/style1.css" type="text/css" media="screen" />
</head>

<body>
<div align="center" id="mainWrapper">
  <?php include_once("template_header.php");?>
  <div id="pageContent"><br />
    <div align="left" style="margin-left:24px;">
      <h2>Order List</h2>
      <table style="padding: 20px">
      <thead>
      <td style="width: 200px"><strong>Customer ID</strong></td>
      <td style="width: 200px"><strong>Order No</strong></td>
      </thead>
      <tbody>
      <?php
      $q = mysqli_query($conn, "SELECT * FROM orders");
      while ($row = mysqli_fetch_array($q)) {
        echo "<tr><td>".$row["cusname"]."</td><td>".$row["orderno"]."</td><td><form action='revorder.php' method='post'>
        <input name='order' type='submit' value='Review-Order No:".$row["orderno"]."'/>
        <input name='oname' type='hidden' value=".$row['cusname'].">
        <input name='ono' type='hidden' value=".$row['orderno']."></form></td></tr>";      
     }
     ?>
      </tbody>
      </table>
    </div>
    <br />
  <br />
  <br />
  </div>
</div>
</body>
</html>