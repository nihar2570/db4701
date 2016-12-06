<?php
require("login.php");
require("config.php");

$product_name = ($_POST['product_name']);

$result = mysqli_query($con,"SELECT * FROM products where ProductName='$product_name' AND Discontinued=0;");
if(mysqli_num_rows($result)!=0)
{
	while($row = mysqli_fetch_array($result)) {
		printf ("Product Name: ");
		printf ($row['ProductName']);
		printf ("\nProduct blah ");
		printf ($row['ProductName']);
		printf ("Product blah ");
		printf ($row['ProductName']);
		printf ("Product blah ");
		printf ($row['ProductName']);
	}
}else{
	echo " no such product exists";
}
mysqli_free_result($result);
mysqli_close($con);
?>