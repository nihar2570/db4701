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
                        <th>OrderID</th>
                        <th>CustomerID</th>
                        <th>EmployeeID</th>
                        <th>OrderDate</th>
                        <th>ProductID</th>                                       
                    </tr>
                </thead>
        </div>
    </div>

  <?php
      require("config.php");

      if(isset($_POST['fname'])){
        $fname = ($_POST['fname']);

        $qry = mysqli_query($con,"SELECT *
                                  FROM northwind.orders
                                  INNER JOIN northwind.`order details`ON orders.OrderID = `order details`.orderID
                                  INNER JOIN northwind.employees ON orders.EmployeeID = employees.EmployeeID
                                  INNER JOIN northwind.shipments ON orders.OrderID = shipments.OrderID
                                  WHERE FirstName = '$fname';
                                  ");

        $num_rows = mysqli_num_rows($qry);
          echo "<h3> Search by employee names: - $num_rows Matches: </h3>\n";

          if(mysqli_num_rows($qry)!=0){
              while($row = $qry->fetch_assoc()) {
               echo"
                   <tbody>
                     <tr>
                       <td>".$row['OrderID']."</td>
                       <td>".$row['CustomerID']."</td>
                       <td>".$row['EmployeeID']."</td>
                       <td>".$row['OrderDate']."</td>
                       <td>".$row['ProductID']."</td>           
                      </tr>                                   
                   </tbody>
                   ";
              }
          }
        }

        if(isset($_POST['year']) || isset($_POST['month']) || isset($_POST['day'])){
        $year = ($_POST['year']);
        $month = ($_POST['month']);
        $day= ($_POST['day']);

        $qry = mysqli_query($con,"SELECT *
                                  FROM northwind.orders
                                  INNER JOIN northwind.`order details`ON orders.OrderID = `order details`.orderID
                                  INNER JOIN northwind.employees ON orders.EmployeeID = employees.EmployeeID
                                  INNER JOIN northwind.shipments ON orders.OrderID = shipments.OrderID
                                    WHERE YEAR(OrderDate) = '$year'
                                    OR MONTH(OrderDate) = '$month'
                                    OR DAY(OrderDate) = '$day'
                                    ");
        $num_rows = mysqli_num_rows($qry);
          echo "<h3> Month/day/year search: - $num_rows Matches: </h3>\n";

          if(mysqli_num_rows($qry)!=0){
              while($row = $qry->fetch_assoc()) {
               echo"
                   <tbody>
                     <tr>
                       <td>".$row['OrderID']."</td>
                       <td>".$row['CustomerID']."</td>
                       <td>".$row['EmployeeID']."</td>
                       <td>".$row['OrderDate']."</td>
                       <td>".$row['ProductID']."</td>           
                      </tr>                                   
                   </tbody>
                   ";
              }
          }
        }

        if(isset($_POST['fromdate']) && isset($_POST['todate'])){
        $from = ($_POST['fromdate']);
        $to = ($_POST['todate']);

        $qry = mysqli_query($con,"SELECT *
                                  FROM northwind.orders
                                  INNER JOIN northwind.`order details`ON orders.OrderID = `order details`.orderID
                                  INNER JOIN northwind.employees ON orders.EmployeeID = employees.EmployeeID
                                  INNER JOIN northwind.shipments ON orders.OrderID = shipments.OrderID
                                  WHERE OrderDate BETWEEN '$from' AND '$to'");

        $num_rows = mysqli_num_rows($qry);
          echo "<h3> From and To search: - $num_rows Matches: </h3>\n";

          if(mysqli_num_rows($qry)!=0){
              while($row = $qry->fetch_assoc()) {
               echo"
                   <tbody>
                     <tr>
                       <td>".$row['OrderID']."</td>
                       <td>".$row['CustomerID']."</td>
                       <td>".$row['EmployeeID']."</td>
                       <td>".$row['OrderDate']."</td>
                       <td>".$row['ShipVia']."</td>           
                      </tr>                                   
                   </tbody> ";
              }
          }
        }
  ?>
</table>
<a href="adminDash.php"><button type="submit" class="btn btn-default">Back</button></a>
</div>  

</body>
</html>

               