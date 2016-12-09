<!DOCTYPE HTML>
<html>
<head>
    <title>dashboard</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</head>
  <body>test
  </body>
</html>
<?php
    require("config.php");
    $a = ($_POST['c1']);
    $b = ($_POST['c2']);
    $c = ($_POST['c3']);
    $d = ($_POST['c4']);
    $e = ($_POST['c5']);
    $f = ($_POST['c6']);
    $g = ($_POST['c7']);
    $h = ($_POST['c8']);
    $i = ($_POST['c9']);
    $j = ($_POST['c10']);
    $k = ($_POST['c11']);
    $l = ($_POST['c12']);
    $m = ($_POST['c13']);
    $n = ($_POST['c14']);
    $o = ($_POST['c15']);
    $p = ($_POST['c16']);
    $q = ($_POST['c17']);
    $r = ($_POST['c18']);
    $s = ($_POST['c19']);

    $qry = "INSERT INTO employees (EmployeeID, LastName, FirstName, Title, TitleOfCourtesy, BirthDate, HireDate, Address, City, Region, PostalCode, Country, HomePhone, Extension, Photo, Notes, ReportsTo, PhotoPath, Salary) 
    VALUES ('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s')";

    if ($con->query($qry) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $qry . "<br>" . $con->error;
    }
  ?>