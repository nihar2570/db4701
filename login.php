<?php
require("config.php");

$username = ($_POST['name']);
$password = ($_POST['pass']);

$result = mysqli_query($con,"SELECT * FROM users WHERE name='$username' AND password='$password'");
if(mysqli_num_rows($result)!=0)
{
	echo "yes Email: ";
	while($row = mysqli_fetch_array($result)) {
    // print email
	echo $row['email'];
	//sets some equivalent to global variiables
	$_SESSION["globalusername"] = $username;

	//go to dashboard
	header("Location:dashboard.html");
    exit();

	}
}else{
	echo "no such user exists";
}
mysqli_free_result($result);
mysqli_close($con);
?>
