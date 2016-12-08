<!DOCTYPE HTML>
<?php
require("config.php");
?>
<html>
<head>
    <title>dashboard</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</head>
<body>

    <div class="container"><h1>Northwind Web Application<h3>(Employee/Admin)<?php echo $_SESSION["LastName"]?></h3></h1>
        <div id="exTab1" class="container"> 
            <ul  class="nav nav-pills">
                <li class="active"><a href="#1a" data-toggle="tab">Home</a></li>
                <li><a href="#2a" data-toggle="tab">Product Mangement</a></li>
                <li><a href="#3a" data-toggle="tab">Customers</a></li>
                <li><a href="#4a" data-toggle="tab">Employee Management</a></li>
                <li><a href="#5a" data-toggle="tab">Sales Reporting</a></li>
                <li><a href="#6a" data-toggle="tab">Employee Productivity Reporting</a></li>
                <li><a href="#7a" data-toggle="tab">Inventory Reporting</a></li>
                <li><a href="#8a" data-toggle="tab">Customer Reporting</a></li>
                <li><a href="#9a" data-toggle="tab">Logout</a></li>
            </ul>
            <hr>

        <div class="tab-content clearfix">
            <div class="tab-pane active" id="1a">
                <div class="container">
                    <div class="row">
                        <div class="span5">
                            <table class="table table-striped">
                            add link to order status and content of each order
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer ID</th>
                                    <th>OrderDate</th>
                                    <th>EmployeeID</th>
                                    <th>ShipVia</th>
                                    <th>Status</th>                                          
                                </tr>
                            </thead>   
                            <!-- we need a for loop here for every thread , for a different order-->
                            <?php
                            $qry = mysqli_query($con,"SELECT * FROM orders");
                              if(mysqli_num_rows($qry)!=0)
                                {
                                  while($row = $qry->fetch_assoc()) {
                                    $_SESSION["OrderID"] = $row['OrderID'];
                                    $_SESSION["CustomerID"] = $row['CustomerID'];
                                    $_SESSION["OrderDate"] = $row['OrderDate'];
                                    $_SESSION["EmployeeID"] = $row['EmployeeID'];
                                    $_SESSION["ShipVia"] = $row['ShipVia'];
                                    echo"
                                        <tbody>
                                          <tr>
                                            <td>".$row['OrderID']."</td>
                                            <td>".$row['CustomerID']."</td>
                                            <td>".$row['OrderDate']."</td>
                                            <td>".$row['EmployeeID']."</td>
                                            <td>".$row['ShipVia']."</td>
                                            <td><button class=\"label label-success\">Active</button></td>             
                                          </tr>                                   
                                        </tbody>";
                                  }
                                }else{
                                  echo "no active orders";
                                  exit();
                                }
                            ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="2a">
                <div class = "row">
                  <div class="col-lg-6">
                    <h3>Search for Product: </h3>
                    <form class="navbar-form navbar-left" role="search">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                      </div>
                      <button type="submit" class="btn btn-default">GO</button>
                      <hr>
                      Search Result:
                      <hr>
                      Add to Products:
                      Ask to add required boxes
                      <hr>
                     </form>
                  </div>
                </div>
            </div>    

            <div class="tab-pane" id="3a">
              <h3>Search for Customer by: </h3>
              <div class = "row">
                <div class="col-md-5">
                    <form class="form">
                      <div class="form-group">
                        <label for="">First Name:</label>
                        <input type="text" class="form-control" id="">
                      </div>
                </div>
                <div class="col-md-5">      
                      <div class="form-group">
                        <label for="">Last Name:</label>
                        <input type="text" class="form-control" id="">
                      </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">        
                      <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" id="">
                      </div>
                </div>
                <div class="col-md-5">      
                      <div class="form-group">
                        <label for="">Company Name:</label>
                        <input type="text" class="form-control" id="">
                      </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">         
                      <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" id="">
                      </div>
                </div>
                <div class="col-md-5">      
                      <div class="form-group">
                        <label for="">Fax</label>
                        <input type="text" class="form-control" id="">
                      </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">         
                      <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control" id="">
                      </div>
                </div>
                <div class="col-md-3">
                      <div class="form-group">
                        <label for="">City</label>
                        <input type="text" class="form-control" id="">
                      </div>
                </div>
                <div class="col-md-2">      
                      <div class="form-group">
                        <label for="">State</label>
                        <input type="text" class="form-control" id="">
                      </div>
                </div>      
                </div>
              <div class="row">
                <div class="col-md-5">         
                      <div class="form-group">
                        <label for="">Country</label>
                        <input type="text" class="form-control" id="">
                      </div>
                </div>
                <div class="col-md-5">      
                      <div class="form-group">
                        <label for="">Postal Code</label>
                        <input type="text" class="form-control" id="">
                      </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-10">
                  <button type="submit" class="btn btn-primary pull-right">Search</button>
                </div>  
              </div>            
              <hr>
                Search Result:
              <hr>
              </form>
            </div>

            <div class="tab-pane" id="4a">
            <h3>Add New Emplyee:</h3>
              <div class = "row">
                <div class="col-md-5">
                    <form class="form">
                      <div class="form-group">
                        <label for="">First Name:</label>
                        <input type="text" class="form-control" id="">
                      </div>
                </div>
                <div class="col-md-5">      
                      <div class="form-group">
                        <label for="">Last Name:</label>
                        <input type="text" class="form-control" id="">
                      </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">        
                      <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" id="">
                      </div>
                </div>
                <div class="col-md-5">      
                      <div class="form-group">
                        <label for="">Company Name:</label>
                        <input type="text" class="form-control" id="">
                      </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">         
                      <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" id="">
                      </div>
                </div>
                <div class="col-md-5">      
                      <div class="form-group">
                        <label for="">Fax</label>
                        <input type="text" class="form-control" id="">
                      </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">         
                      <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control" id="">
                      </div>
                </div>
                <div class="col-md-3">
                      <div class="form-group">
                        <label for="">City</label>
                        <input type="text" class="form-control" id="">
                      </div>
                </div>
                <div class="col-md-2">      
                      <div class="form-group">
                        <label for="">State</label>
                        <input type="text" class="form-control" id="">
                      </div>
                </div>      
                </div>
              <div class="row">
                <div class="col-md-5">         
                      <div class="form-group">
                        <label for="">Country</label>
                        <input type="text" class="form-control" id="">
                      </div>
                </div>
                <div class="col-md-5">      
                      <div class="form-group">
                        <label for="">Postal Code</label>
                        <input type="text" class="form-control" id="">
                      </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-10">
                  <button type="submit" class="btn btn-success pull-right">ADD</button>
                </div>  
              </div>            
              <hr>
            </div>

            <div class="tab-pane" id="5a">
                <p>Sales Reporting: A screen that has the ability to run a wide range of reports on overall
                  sales by month, by durational period (start and end date), by city and/or state and/or
                  country; reports on sales of customers by month, by durational period (start and end
                  date), by city and/or state and/or country
                </p>
            </div>

            <div class="tab-pane" id="6a">
                <p>Employee Productivity Reporting: A screen that has the ability to run a wide range of
                  reports on employee productivity by employee and broken down on a customer by
                  customer basis which includes data such as the number of customer(s) per employee and
                  sales of those customer(s) by employee also by month or durational period (start and end date
                </p>
            </div>

            <div class="tab-pane" id="7a">
                <p>Inventory Reporting: A screen that has the ability to run a wide range of reports on
                products by name, category, supplier, amounts (in stock, reorder limit, etc.). These can
                be summary reports product name, product category, supplier name, amounts, etc.
                </p>
            </div>

            <div class="tab-pane" id="8a">
                <p>Customer Reporting: A screen that has the ability to run a wide range of reports on the
                interests of customers in terms of music and media preferences. This can include
                looking at what a specific customer prefers in terms of products, categories, etc., or
                might be statistical analysis across multiple customers to determine preferences by state
                and/or country. Each Group is tasked with defining the scope of customer reporting for their project
                </p>
            </div>

            <div class="tab-pane" id="9a">
                <h3>Are you sure you want to logout?</h3>
                <a href="logout.php" class="btn btn-danger">
                    <span class="glyphicon glyphicon-log-out"></span> Logout
                </a>
            </div>

        </div><!--Tab content -->
        </div><!--All tab code ends-->
  </div><!--NORTHWIND WEB APPLICATION CONTAINER-->
</body>
</html>