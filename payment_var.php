<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
     border: 1px solid black;
}
</style>
</head>
<body>

<?php
require("config.php");

if (!empty($_POST['andriod_pay'])){
$andriod_pay = mysql_real_escape_string($_POST['andriod_pay']);

$andriod_result = mysqli_query($con,"SELECT * FROM payment");




mysqli_free_result($andriod_pay_result);
}










mysqli_close($con);
?>

</body>
</html>