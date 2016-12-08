                        
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
                        <th>ProductID</th>
                        <th>ProductName</th>
                        <th>UnitsInStock</th>
                        <th>QuantityPerUnit</th>
                        <th>UnitPrice</th>
                        <th>Status</th>                                          
                    </tr>
                </thead>
        </div>
    </div>

  <?php
      require("config.php");
      if(isset($_POST['productSearch'])){
        $pd = ($_POST['productSearch']);
        $qry = mysqli_query($con,"SELECT * FROM products WHERE ProductName='$pd'");
          if(mysqli_num_rows($qry)!=0){
              while($row = $qry->fetch_assoc()) {
               echo"
                   <tbody>
                     <tr>
                       <td>".$row['ProductID']."</td>
                       <td>".$row['ProductName']."</td>
                       <td>".$row['UnitsInStock']."</td>
                       <td>".$row['QuantityPerUnit']."</td>
                       <td>".$row['UnitPrice']."</td>
                       <td><button class=\"label label-primary\">Available</button></td>             
                      </tr>                                   
                   </tbody>
                  </table> ";
              }
          }else{
            echo "no active orders";
            exit();
          }
        }
  ?>
</table>
<button type="submit" class="btn btn-default"><a href="adminDash.php">Back</a></button>
</div>  

</body>
</html>

               