<?php
require("config.php");

$username = ($_POST['name']);
$password = ($_POST['pass']);

$result = mysqli_query($con,"SELECT * FROM Customers WHERE CustomerID='$username'");
//$result = mysqli_query($con,"SELECT * FROM customers WHERE ContactName='$username' AND password='$password'");
//$result = mysqli_query($con,"SELECT * FROM users WHERE name='$username' AND password='$password'");
if(!empty($result))
{
	//sets some equivalent to global variiables
	$_SESSION["username"] = $username;

	//go to dashboard
	header("Location:dashboard.html");
    exit();

	}
else{
	echo "No such user exists";
}
if(!empty($result)){
mysqli_free_result($result);
}
mysqli_close($con);
?>