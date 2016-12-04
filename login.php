<?php
require("config.php");

$username = ($_POST['name']);
$password = ($_POST['pass']);

$result = mysqli_query($con,"SELECT * FROM users WHERE name='$username' AND password='$password'");
if(mysqli_num_rows($result)!=0)
{
	echo "yes Email: ";
	while($row = mysqli_fetch_array($result)) {
	echo $row['email'];
	}
}else{
	echo "no such user exists";
}
mysqli_free_result($result);
mysqli_close($con);
?>
