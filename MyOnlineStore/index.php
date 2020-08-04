<?php 
// This file is www.developphp.com curriculum material
// Written by Adam Khoury January 01, 2011
// http://www.youtube.com/view_play_list?p=442E340A42191003
// Script Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php 
// Run a select query to get my letest 6 items
// Connect to the MySQL database  
include "storescripts/connect_to_mysql.php"; 
$dynamicList = "";
$sql = mysqli_query($conn,"SELECT * FROM products ORDER BY date_added DESC LIMIT 6");
$productCount = mysqli_num_rows($sql); // count the output amount
if ($productCount > 0) {
	while($row = mysqli_fetch_array($sql)){ 
             $id = $row["id"];
			 $product_name = $row["product_name"];
			 $price = $row["price"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
			 $dynamicList .= '<table width="100%" border="0" cellspacing="0" cellpadding="6">
        <tr>
          <td width="17%" valign="top"><a href="product.php?id=' . $id . '"><img style="border:#666 1px solid;" src="inventory_images/' . $id . '.jpg" alt="' . $product_name . '" width="77" height="102" border="1" /></a></td>
          <td width="83%" valign="top">' . $product_name . '<br />
            $' . $price . '<br />
            <a href="product.php?id=' . $id . '">View Product Details</a></td>
        </tr>
      </table>';
    }
} else {
	$dynamicList = "We have no products listed in our store yet";
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head><link rel="stylesheet" type="text/css" href="style/style1.css"></head>
<body>
	<div>
		<?php
			include('navbar.php');
		?>
	</div>
<!-- <header class="shopm"><br><br><br><br><br>
	<div class="shopping-cart">
  	
  		<div class="title">
    		Featured Products
  		</div>
 
  	
  		<div class="item">
    		<div class="buttons">
      			<span class="delete-btn"></span>
      			<span class="like-btn"></span>
    		</div>
 
    		<div class="image">
      			<img src="item-1.png" alt="" />
    		</div>
 
    		<div class="description">
      			<span>Common Projects</span>
      			<span>Bball High</span>
      			<span>White</span>
    		</div>
 
    		<div class="quantity">
      			<button class="plus-btn" type="button" name="button">
        			<img src="plus.svg" alt="" />
      			</button>
      			<input type="text" name="name" value="1">
      			<button class="minus-btn" type="button" name="button">
        			<img src="minus.svg" alt="" />
      			</button>
    		</div>
 
    		<div class="total-price">$549</div>
    		<div class="buttons">
      			<?php
      				/*echo '<a href="product.php?id=' . $id . '">View Product Details</a>';*/
      			?>
    		</div>
  		</div>

	</div>

</header> -->

<div class="entire"></div>
<div class="box-container-c">
<?php
include "storescripts/connect_to_mysql.php";
$sql1 = mysqli_query($conn, "SELECT * FROM products");
$productCount1 = mysqli_num_rows($sql1); // count the output amount
if ($productCount1 > 0) {
	while($row1 = mysqli_fetch_array($sql1)){ 
		$id = $row1["id"];
		$product_name = $row1["product_name"];
		$price = $row1["price"];
		$date_added = strftime("%b %d, %Y", strtotime($row1["date_added"]));
		echo '
		
<div class="box-container">
	<div id="img1">';
		
		echo '<img style="border:#666 1px solid;" src="inventory_images/' . $id . '.jpg" alt="' . $product_name . '" width="77" height="102" border="1" />';
		echo '
	</div>
	<div>
		<p>';
		echo $product_name;
		echo '</p>
	</div>
	<div>
		<p>';
		echo $price;
		echo '</p>
	</div>
	<div>';
		echo '<div class="btn"><a href="product.php?id=' . $id . '">View Details</a></div>';
      	echo '
	</div>
</div>
';
}
}else
{
	echo "No products avalilabe";
}

?>
</div>
</body>
</html>