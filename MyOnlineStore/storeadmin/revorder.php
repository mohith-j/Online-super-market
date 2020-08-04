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
    <table style="padding: 20px">
      <thead>
      <td style="width: 200px"><strong>Item ID</strong></td>
      <td style="width: 200px"><strong>Price</strong></td>
      <td style="width: 200px"><strong>Quantity</strong></td>
      <td style="width: 200px"><strong>Total</strong></td>
      </thead>
      <tbody>
    <?php
    $orderno = $_POST['ono'];
    $ordername = $_POST['oname'];
    $totalcost = 0;
    echo '<h2>ORDER NO: '.$orderno.' by '.$ordername.'</h2>';
    $q = mysqli_query($conn, "SELECT * FROM $ordername");
      while ($row = mysqli_fetch_array($q)) {
        echo "<tr><td>".$row["itemname"]."</td><td>".$row["price"]."</td><td>".$row["quantity"]."</td><td>".$row["pricetotal"]."</td></tr>";      
        $totalcost = $totalcost + $row["pricetotal"];
    }
     ?>
      </tbody>
      </table>
    <h2>Total Cost: <?php echo $totalcost;?></h2>
    <form action="order_list.php">
    <?php 
    $sql = mysqli_query($conn, "DROP TABLE $ordername");
    $s = mysqli_query($conn, "DELETE FROM orders where cusname='$ordername'");
    ?>
    <input type="submit" value="Cancel Order"/>
    <input type="submit" value="Approve Order"/>
    </form>
    </div>
    <br />
  <br />
  <br />
  </div>
</div>
</body>
</html>