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
                        <th>ContactName</th>
                        <th>CompanyName</th>
                        <th>Phone</th>                                       
                    </tr>
                </thead>
        </div>
    </div>

  <?php
      require("config.php");
        if(isset($_POST['c1']) || isset($_POST['c2']) || isset($_POST['c3']) || isset($_POST['c4'])){
        $c1 = ($_POST['c1']);
        $c2 = ($_POST['c2']);
        $c3 = ($_POST['c3']);
        $c4 = ($_POST['c4']);

        $qry = mysqli_query($con," SELECT * FROM customers WHERE ContactName='$c1'
                                    OR City='$c2' OR Region='$c3' OR Country='$c4'");
        
          if(mysqli_num_rows($qry)!=0){
              while($row = $qry->fetch_assoc()) {
               echo"
                   <tbody>
                     <tr>
                       <td>".$row['CustomerID']."</td>
                       <td>".$row['ContactName']."</td>
                       <td>".$row['CompanyName']."</td>
                       <td>".$row['Phone']."</td>           
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

               