<?php
require("config.php");

$username = ($_POST['name']);
$password = ($_POST['pass']);

$result = mysqli_query($con,"SELECT * FROM Customers WHERE CustomerID='$username'");
//$result = mysqli_query($con,"SELECT * FROM customers WHERE ContactName='$username' AND password='$password'");
//$result = mysqli_query($con,"SELECT * FROM users WHERE name='$username' AND password='$password'");
if(mysqli_num_rows($result)!=0)
{
	//sets some equivalent to global variiables
	$_SESSION['username'] = $username;

	//go to dashboard
	header("Location:dashboard2.php");
    exit();

	}
else{
	echo " no such user exists";
}
mysqli_free_result($result);
mysqli_close($con);
?>