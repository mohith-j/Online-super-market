<?php
session_start();
include "storescripts/connect_to_mysql.php";
$flag=1;
$cartOutput = "";
$cartTotal = "";
$pp_checkout_btn = '';
$product_id_array = '';
$cusname = $_SESSION['reg'];
$sqlcus = mysqli_query($conn, "INSERT INTO orders (cusname) VALUES ('$cusname')");
$sqltable = mysqli_query($conn, "CREATE TABLE $cusname (itemid varchar(255), price int, quantity int, pricetotal int, itemname varchar(255))");
foreach ($_SESSION["cart_array"] as $each_item){
    $item_id = $each_item['item_id'];
    $sql = mysqli_query($conn, "SELECT * FROM products WHERE id='$item_id' LIMIT 1");
		while ($row = mysqli_fetch_array($sql)) {
            $product_name = $row["product_name"];
            echo $product_name;
			$price = $row["price"];
            $details = $row["details"];
            $quant = $each_item['quantity'];
            $pricetotal = $price * $each_item['quantity'];
            $sqlrow = mysqli_query($conn, "INSERT INTO $cusname (itemid,price,quantity,pricetotal,itemname) VALUES ($item_id,$price,$quant,$pricetotal,'$product_name')");
        }
    }
if($flag===1){
   unset($_SESSION["cart_array"]);
   header('location:thankyou.php');
}
?>