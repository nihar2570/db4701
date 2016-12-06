<?php
require("config.php");

$username = ($_POST['name']);
$password = ($_POST['pass']);

$result = mysqli_query($con,"SELECT * FROM Customers WHERE ContactName='$username'");
//$result = mysqli_query($con,"SELECT * FROM customers WHERE ContactName='$username' AND password='$password'");
//$result = mysqli_query($con,"SELECT * FROM users WHERE name='$username' AND password='$password'");
if(mysqli_num_rows($result)!=0)
{
	/*echo " --Company: ";
	while($row = mysqli_fetch_array($result)) {
	echo $row['CompanyName'];
	}*/
	$_SESSION["username"] = $username;
	header("Location: http://localhost/login/db4701/dashboard.html");
	exit();
}else{
	echo " no such user exists";
}
mysqli_free_result($result);
mysqli_close($con);
?>