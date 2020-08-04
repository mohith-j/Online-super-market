<!DOCTYPE html>
<html>
<head>
  <?php
    session_start();
    $reg = $_SESSION['reg'];
  ?>
<style>
body {margin:0;z-index: 2; position: relative;}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  position: fixed;
  top: 0;
  width: 100%;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #4CAF50;
}
li img{
  display:block;
  width: 170px;
  height: 50px;
  /*position: absolute;*/
}
#logout{
  float:right;
  padding: 2px;
  margin : 0px 15px;
  border-radius: 4px;
  background-color: #e50914;
}
</style>
</head>
<body>

         
<ul>
  <li><img src="images/logo.png"></li>
  <li><a href="#">Stationary</a></li>
  <li><a href="#">Beauty and Grooming</a></li>
  <li><a href="#">Electronics</a></li>
  <li><a href="#">Food</a></li>
  <li><a href="#">About us</a></li>
  <li style="color: white; float:right;padding: 2px; margin : 0px 15px;border-radius: 4px;background-color: #e50914; padding: 14px 16px;"><?php echo "$reg"?></li>
  <li id="logout"><a href="logout.php">Logout</a></li>
  <li id="logout"><a href="index.php">Home</a></li>
</ul>

</body>
</html>