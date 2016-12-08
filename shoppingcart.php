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

$product_result = mysqli_query($con,"SELECT * FROM northwind.Products JOIN northwind.shoppingcart ON Products.productID = shoppingcart.productID;");
if ($product_result->num_rows > 0) {
     echo "<table><tr><th>Product Name</th><th>Quantity Per Unit</th><th>Unit Price</th><th>Units In Stock</th></tr>";
     // output data of each row
     while($row = $product_result->fetch_assoc()) {
         echo "<tr><td>" . $row["ProductName"]. "</td><td>" . $row["QuantityPerUnit"]. "</td><td>" . $row["UnitPrice"]. "</td><td>" . $row["UnitsInStock"]. "</td></tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}
mysqli_free_result($product_result);

mysqli_close($con);
?>

</body>
</html>