<?php
require("config.php");

$my_name = mysql_real_escape_string($_POST['name']);
$title = mysql_real_escape_string($_POST['title']);
$company = mysql_real_escape_string($_POST['company']);
$address = mysql_real_escape_string($_POST['address']);
$city = mysql_real_escape_string($_POST['city']);
$my_code = mysql_real_escape_string($_POST['code']);
$country = mysql_real_escape_string($_POST['country']);
$phone = mysql_real_escape_string($_POST['phone']);
$fax = mysql_real_escape_string($_POST['fax']);

if (!empty($_POST['name']) && !empty($_POST['title']) && !empty($_POST['company']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['code']) && !empty($_POST['phone']) && !empty($_POST['fax'])){



mysqli_query($con,"UPDATE customers SET CompanyName = '$company', ContactName = '$my_name', ContactTitle = '$title', Address = '$address', City = '$city', PostalCode = '$my_code', Country = '$country', Phone = '$phone', Fax = '$fax' WHERE CustomerID = '{$_SESSION['username']}';") or die(mysqli_error($con));


header("Location:dashboard2.php");
exit();
}
else{
	echo "Invalid info. Try again";
}
?>