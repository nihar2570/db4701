<html>
<head>
    <title>Sign-In</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</head>

<body>
    <div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">  
        <h1 class="text-center login-title">ADMIN Sign in</h1>
        
    	<form method="POST" action="adminLogin.php">

    		<div class="form-group">
        	Name
        	<input type="text" class="form-control" name="name" placeholder="Username">
        	</div>

        	<div class="form-group">
        	Password
        	<input type="text" class="form-control" name="pass" placeholder="Password">
        	</div>

        	<button type="submit" class="btn btn-default">Submit</button>
    	</form>
        </div>
    </div>
    </div>
</body>
</html>

<?php
require("config.php");

if(isset($_POST['name'])){
$username = ($_POST['name']);
$password = ($_POST['pass']);

$result = mysqli_query($con,"SELECT * FROM employees WHERE FirstName='$username'");
if(mysqli_num_rows($result)!=0)
{
	echo "yes";
	while($row = mysqli_fetch_array($result)) {
		$_SESSION["LastName"] = $row['LastName'];
		$_SESSION["EmployeeID"] = $row['EmployeeID'];
		$_SESSION["HomePhone"] = $row['HomePhone'];
		header("Location:adminDash.php");
   		exit();
	}
}else{
	echo "no such user exists";
}
mysqli_free_result($result);
mysqli_close($con);
}
?>