<!DOCTYPE HTML>
<?php
require("config.php");

$result = mysqli_query($con,"SELECT * FROM Customers where CustomerID = '{$_SESSION['username']}';");
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $_SESSION['usertitle'] = $row["ContactTitle"];
     }
     
} else {
     echo "0 results";
}
?>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</head>

<body>
    <div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">  
        <h1 class="text-center login-title">Edit Account</h1>
        <?php

    $result = mysqli_query($con,"SELECT * FROM Customers where CustomerID = '{$_SESSION['username']}';");
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $_SESSION['my_name'] = $row['ContactName'];
        $_SESSION['usertitle'] = $row["ContactTitle"];
        $_SESSION['company'] = $row["CompanyName"];
        $_SESSION['address'] = $row["Address"];
        $_SESSION['city'] = $row["City"];
        $_SESSION['my_code'] = $row["PostalCode"];
        $_SESSION['country'] = $row["Country"];
        $_SESSION['phone'] = $row["Phone"];
        $_SESSION['fax'] = $row["Fax"];
     }
     
    } else {
     echo "0 results";
    }
    ?>
        
    	<form method="POST" action="edit_acc_var.php">
            <div class="form-group">
        	<strong>Contact Name</strong>
        	<input type="text" class="form-control" name="name" placeholder="" value="<?php echo $_SESSION['my_name'];?>">
        	</div>
    		<div class="form-group">
        	<strong>Contact Title</strong>
        	<input type="text" class="form-control" name="title" placeholder="" value="<?php echo $_SESSION['usertitle'];?>">
        	</div>
        	<div class="form-group">
        	<strong>Company</strong>
        	<input type="text" class="form-control" name="company" placeholder="" value="<?php echo $_SESSION['company'];?>">
        	</div>
        	<div class="form-group">
        	<strong>Address (Street no:)</strong>
        	<input type="text" class="form-control" name="address" placeholder="" value="<?php echo $_SESSION['address'];?>">
        	</div>
        	<div class="form-group">
        	<strong>City</strong>
        	<input type="text" class="form-control" name="city" placeholder="" value="<?php echo $_SESSION['city'];?>">
        	</div>
        	<div class="form-group">
        	<strong>Country</strong>
        	<input type="text" class="form-control" name="country" placeholder="" value="<?php echo $_SESSION['country'];?>">
        	</div>
        	<div class="form-group">
        	<strong>Postal Code</strong>
        	<input type="text" class="form-control" name="code" placeholder="" value="<?php echo $_SESSION['my_code'];?>">
        	</div>
        	<div class="form-group">
        	<strong>Phone</strong>
        	<input type="text" class="form-control" name="phone" placeholder="" value="<?php echo $_SESSION['phone'];?>">
        	</div>
        	<div class="form-group">
        	<strong>Fax</strong>
        	<input type="text" class="form-control" name="fax" placeholder="" value="<?php echo $_SESSION['fax'];?>">
        	</div>

        	<button type="submit" class="btn btn-primary center-block">Submit</button>
    	</form>
    	<br>
    	<br>
        </div>
    </div>
    </div>
</body>
</html>