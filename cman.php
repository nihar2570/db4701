<!DOCTYPE HTML>
<html>
<head>
    <title>dashboard</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</head>
<body>
<div class="container">
  <div class = "row">
      <div class="col-lg-6">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>CustomerID</th>
                        <th>CompanyName</th>
                        <th>ContactName</th>
                        <th>ContactTitle</th>
                        <th>Address</th>
                        <th>City</th>  
                        <th>Region</th>
                        <th>PostalCode</th>
                        <th>Country</th>
                        <th>Phone</th>
                        <th>Fax</th>                                         
                    </tr>
                </thead>
                <tbody>
		</div>
	</div>
	<?php
		require("config.php");
        $qry = mysqli_query($con,"SELECT * FROM customers 
        							WHERE CustomerID = '{$_POST['c1']}'
        							OR CompanyName = '{$_POST['c2']}' 
        							OR Fax = '{$_POST['c11']}'
        							OR ContactName = '{$_POST['c3']}'
        							OR ContactTitle = '{$_POST['c4']}'	
        							OR Address =	'{$_POST['c5']}'
        							OR City =		'{$_POST['c6']}'
        							OR Region  =	'{$_POST['c7']}'
        							OR PostalCode = '{$_POST['c8']}'
        							OR Country = 	'{$_POST['c9']}'
        							OR Phone = 		'{$_POST['c10']}'
        							");

          if(mysqli_num_rows($qry)!=0){
              while($row = $qry->fetch_assoc()) {
               echo"<tbody>
                     <tr>
                       <td>".$row['CustomerID']."</td>
                       <td>".$row['CompanyName']."</td>
                       <td>".$row['ContactName']."</td>
                       <td>".$row['ContactTitle']."</td>
                       <td>".$row['Address']."</td>
                       <td>".$row['City']."</td>
                       <td>".$row['Region']."</td> 
                       <td>".$row['PostalCode']."</td>
                       <td>".$row['Country']."</td>
                       <td>".$row['Phone']."</td>
                       <td>".$row['Fax']."</td>            
                      </tr>                                   
                   </tbody>
                   ";
              }
          }else{
            echo "none";
            exit();
          }

	?>
	</table>
	<hr>
	<a href="adminDash.php"><button type="submit" class="btn btn-default">Back</button></a>
</div>
</body>
</html>

</body>
</html>