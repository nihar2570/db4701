<!DOCTYPE html>
<html>
<head>
<a href="dashboard2.php"><button type="submit" class="btn btn-default">Back</button></a>
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
mysqli_query($con,"DELETE FROM shoppingcart where cusID = '{$_SESSION['username']}';");

printf("Order Placed");
}

if (!empty($_POST['credit_pay'])){
mysqli_query($con,"DELETE FROM shoppingcart where cusID = '{$_SESSION['username']}';");

header("Location:dashboard2.php");
exit();
}

if (!empty($_POST['apple_pay'])){
mysqli_query($con,"DELETE FROM shoppingcart where cusID = '{$_SESSION['username']}';");

printf("Order Placed");
}

if (!empty($_POST['debit_pay'])){
mysqli_query($con,"DELETE FROM shoppingcart where cusID = '{$_SESSION['username']}';");

printf("Order Placed");
}

if (!empty($_POST['paypal_pay'])){
mysqli_query($con,"DELETE FROM shoppingcart where cusID = '{$_SESSION['username']}';");

printf("Order Placed");
}

if (!empty($_POST['bank_pay'])){
mysqli_query($con,"DELETE FROM shoppingcart where cusID = '{$_SESSION['username']}';");

printf("Order Placed");
}

if (empty($_POST['andriod_pay']) && empty($_POST['credit_pay']) && empty($_POST['paypal_pay']) && empty($_POST['debit_pay']) && empty($_POST['apple_pay']) && empty($_POST['bank_pay']))
	{printf("Error! Please retry");}


mysqli_close($con);
?>


</body>
</html>