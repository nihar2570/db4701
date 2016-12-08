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

	function randLetter()
{
    $int = rand(0,25);
    $a_z = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $rand_letter = $a_z[$int];
    return $rand_letter;
}

$rand = randLetter();
$my_rand = $rand;
$rand = randLetter();
$my_rand = $my_rand . $rand;
$rand = randLetter();
$my_rand = $my_rand . $rand;
$rand = randLetter();
$my_rand = $my_rand . $rand;
$rand = randLetter();
$my_rand = $my_rand . $rand;



mysqli_query($con,"INSERT INTO customers (CustomerID, CompanyName, ContactName, ContactTitle, Address, City, PostalCode, Country, Phone, Fax) values ('$my_rand', '$company', '$my_name', '$title', '$address', '$city', '$my_code', '$country', '$phone', '$fax')") or die(mysqli_error($con));


header("Location:login.html");
exit();
}
else{
	echo "Invalid info. Try again";
}
?>