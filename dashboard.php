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

//product search
if (!empty($_POST['product_name'])){
$product_name = mysql_real_escape_string($_POST['product_name']);

$product_result = mysqli_query($con,"SELECT * FROM products where ProductName='$product_name' AND Discontinued=0;");
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
}

//supplier search
if (!empty($_POST['supplier_name'])){
$supplier_name = mysql_real_escape_string($_POST['supplier_name']);

$supplier_result = mysqli_query($con,"SELECT * FROM Products JOIN Company ON Products.SupplierID = Company.CompanyID where CompanyName = '$supplier_name' AND Discontinued = 0;");
if ($supplier_result->num_rows > 0) {
     echo "<table><tr><th>Product Name</th><th>Quantity Per Unit</th><th>Unit Price</th><th>Units In Stock</th><th>Company Name</th></tr>";
     // output data of each row
     while($row = $supplier_result->fetch_assoc()) {
         echo "<tr><td>" . $row["ProductName"]. "</td><td>" . $row["QuantityPerUnit"]. "</td><td>" . $row["UnitPrice"]. "</td><td>" . $row["UnitsInStock"]. "</td><td>" . $row["CompanyName"]. "</td></tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}

mysqli_free_result($supplier_result);
}

//categery search
if (!empty($_POST['cat_name'])){
$cat_name = mysql_real_escape_string($_POST['cat_name']);

$cat_result = mysqli_query($con,"SELECT * FROM Products JOIN Categories ON Products.CategoryID = Categories.CategoryID where Categories.CategoryName = '$cat_name' AND Discontinued = 0;");
if ($cat_result->num_rows > 0) {
     echo "<table><tr><th>Product Name</th><th>Quantity Per Unit</th><th>Unit Price</th><th>Units In Stock</th><th>Category Name</th></tr>";
     // output data of each row
     while($row = $cat_result->fetch_assoc()) {
         echo "<tr><td>" . $row["ProductName"]. "</td><td>" . $row["QuantityPerUnit"]. "</td><td>" . $row["UnitPrice"]. "</td><td>" . $row["UnitsInStock"]. "</td><td>" . $row["CategoryName"]. "</td></tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}

mysqli_free_result($cat_result);
}

//categery search
if (!empty($_POST['buy_product_name'])){
$buy_product_name = mysql_real_escape_string($_POST['buy_product_name']);

$buy_product_name_result = mysqli_query($con,"SELECT * FROM Products JOIN Categories ON Products.CategoryID = Categories.CategoryID where Categories.CategoryName = '$buy_product_name' AND Discontinued = 0;");
if ($buy_product_name->num_rows > 0) {
     echo "<table><tr><th>Product Name</th><th>Quantity Per Unit</th><th>Unit Price</th><th>Units In Stock</th><th>Category Name</th></tr>";
     // output data of each row
     while($row = $cat_result->fetch_assoc()) {
         echo "<tr><td>" . $row["ProductName"]. "</td><td>" . $row["QuantityPerUnit"]. "</td><td>" . $row["UnitPrice"]. "</td><td>" . $row["UnitsInStock"]. "</td><td>" . $row["CategoryName"]. "</td></tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}

mysqli_free_result($buy_product_name_result);
}

mysqli_close($con);
?>

</body>
</html>