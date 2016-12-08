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
                        <th>ProductName</th>
                        <th>CategoryName</th>
                        <th>UnitsInStock</th>
                        <th>CompanyName</th>                                       
                    </tr>
                </thead>
        </div>
    </div>

  <?php
      require("config.php");
        if(isset($_POST['pname']) || isset($_POST['cname']) || isset($_POST['uis']) || isset($_POST['cmpname'])){
        $c1 = ($_POST['pname']);
        $c2 = ($_POST['cname']);
        $c3 = ($_POST['uis']);
        $c4 = ($_POST['cmpname']);

        $qry = mysqli_query($con," SELECT DISTINCT ProductName, CategoryName, UnitsInStock, CompanyName
                                    FROM products JOIN suppliers JOIN categories JOIN CompanyName
                                    WHERE ProductName='$c1' AND CategoryName='$c2' AND UnitsInStock='$c3' AND CompanyName='$c4'");
        
          if(mysqli_num_rows($qry)!=0){
              while($row = $qry->fetch_assoc()) {
               echo"
                   <tbody>
                     <tr>
                       <td>".$row['ProductName']."</td>
                       <td>".$row['CategoryName']."</td>
                       <td>".$row['UnitsInStock']."</td>
                       <td>".$row['CompanyName']."</td>           
                      </tr>                                   
                   </tbody>
                  ";
              }
          }
        } 
  ?>
</table>
<a href="adminDash.php"><button type="submit" class="btn btn-default">Back</button></a>
</div>  

</body>
</html>

               