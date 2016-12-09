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
                <li class = "active"><a href="#1a" data-toggle="tab">Home</a></li>
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
                            ACTIVE ORDERS
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Product ID</th>
                                    <th>Unit Price</th>
                                    <th>Quantity</th>
                                    <th>Discount</th>
                                    <th>Status</th>                                          
                                </tr>
                            </thead>   
                            <!-- we need a for loop here for every thread , for a different order-->
                            <?php
                            $qry = mysqli_query($con,"SELECT * FROM `order details`");
                              if(mysqli_num_rows($qry)!=0)
                                {
                                  while($row = $qry->fetch_assoc()) {
                                    echo"
                                        <tbody>
                                          <tr>
                                            <td>".$row['OrderID']."</td>
                                            <td>".$row['ProductID']."</td>
                                            <td>".$row['UnitPrice']."</td>
                                            <td>".$row['Quantity']."</td>
                                            <td>".$row['Discount']."</td>
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
                      <form class="navbar-form navbar-left" method = "POST" role="search" action="pman.php">
                        <div class="form-group">
                          <input type="text" class="form-control" name="productSearch" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">GO</button>
                      </form>    
                  </div>
                </div>
                <hr>
            </div>    

            <div class="tab-pane" id="3a">
              <h3>Search with any Customer Info: </h3>
              <form class="form" method= "POST" action="cman.php">
                  <div class = "row">
                    <div class="col-md-5">
                      <div class="form-group">
                        <label for="">Customer ID</label>
                        <input type="text" class="form-control" id="" name="c1">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-md-5">        
                      <div class="form-group">
                        <label for="">Company Name</label>
                        <input type="text" class="form-control" id="" name="c2">
                      </div>
                      </div>
                      <div class="col-md-5">      
                      <div class="form-group">
                        <label for="">Contact Name</label>
                        <input type="text" class="form-control" id="" name="c3">
                      </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-5">         
                      <div class="form-group">
                        <label for="">Contact Title</label>
                        <input type="text" class="form-control" id="" name="c4">
                      </div>
                      </div>
                      <div class="col-md-5">      
                      <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control" id="" name="c5">
                      </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-5">         
                      <div class="form-group">
                        <label for="">City</label>
                        <input type="text" class="form-control" id="" name="c6">
                      </div>
                      </div>
                      <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Region</label>
                        <input type="text" class="form-control" id="" name="c7">
                      </div>
                      </div>
                      <div class="col-md-2">      
                      <div class="form-group">
                        <label for="">Postal Code</label>
                        <input type="text" class="form-control" id="" name="c8">
                      </div>
                      </div>      
                  </div>
                <div class="row">
                    <div class="col-md-5">         
                      <div class="form-group">
                        <label for="">Country</label>
                        <input type="text" class="form-control" id="" name="c9">
                      </div>
                    </div>
                    <div class="col-md-5">      
                      <div class="form-group">
                        <label for="">phone</label>
                        <input type="text" class="form-control" id="" name="c10">
                      </div>
                    </div>
                    <div class="col-md-5">      
                      <div class="form-group">
                        <label for="">fax</label>
                        <input type="text" class="form-control" id="" name="c11">
                      </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-10">
                    <button type="submit" class="btn btn-primary pull-right">Search</button>
                  </div>  
                </div> 
              </form> 
              <hr>
            </div>


            <div class="tab-pane" id="4a">
              <h3>Add New Employee:</h3>
              <hr>
                <form class="form" method= "POST" action="eman.php">
                    <div class="col-md-5">      
                      <div class="form-group">
                        <label for="">EmployeeID</label>
                        <input type="text" class="form-control" id="" name="c1">
                      </div>
                    </div>
                    <div class="col-md-5">      
                      <div class="form-group">
                        <label for="">Last Name</label>
                        <input type="text" class="form-control" id="" name="c2">
                      </div>
                    </div>
                    <div class="col-md-5">      
                      <div class="form-group">
                        <label for="">First Name</label>
                        <input type="text" class="form-control" id="" name="c3">
                      </div>
                    </div>
                    <div class="col-md-5">      
                      <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control" id="" name="c4">
                      </div>
                    </div>
                    <div class="col-md-5">      
                      <div class="form-group">
                        <label for="">TitleOfCourtesy</label>
                        <input type="text" class="form-control" id="" name="c5">
                      </div>
                    </div>
                    <div class="col-md-5">      
                      <div class="form-group">
                        <label for="">Birth Date</label>
                        <input type="text" class="form-control" id="" name="c6">
                      </div>
                    </div>
                    <div class="col-md-5">      
                      <div class="form-group">
                        <label for="">Hire Date</label>
                        <input type="text" class="form-control" id="" name="c7">
                      </div>
                    </div>
                    <div class="col-md-5">      
                      <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control" id="" name="c8">
                      </div>
                    </div>
                    <div class="col-md-5">      
                      <div class="form-group">
                        <label for="">City</label>
                        <input type="text" class="form-control" id="" name="c9">
                      </div>
                    </div>
                    <div class="col-md-5">      
                      <div class="form-group">
                        <label for="">Region</label>
                        <input type="text" class="form-control" id="" name="c10">
                      </div>
                    </div>
                    <div class="col-md-5">      
                      <div class="form-group">
                        <label for="">PostalCode</label>
                        <input type="text" class="form-control" id="" name="c11">
                      </div>
                    </div>
                    <div class="col-md-5">      
                      <div class="form-group">
                        <label for="">Country</label>
                        <input type="text" class="form-control" id="" name="c12">
                      </div>
                    </div>
                    <div class="col-md-5">      
                      <div class="form-group">
                        <label for="">Home Phone</label>
                        <input type="text" class="form-control" id="" name="c13">
                      </div>
                    </div>
                    <div class="col-md-5">      
                      <div class="form-group">
                        <label for="">Extension</label>
                        <input type="text" class="form-control" id="" name="c14">
                      </div>
                    </div>
                    <div class="col-md-5">      
                      <div class="form-group">
                        <label for="">Photo</label>
                        <input type="text" class="form-control" id="" name="c15">
                      </div>
                    </div>
                    <div class="col-md-5">      
                      <div class="form-group">
                        <label for="">Notes</label>
                        <input type="text" class="form-control" id="" name="c16">
                      </div>
                    </div>
                    <div class="col-md-5">      
                      <div class="form-group">
                        <label for="">ReportsTo</label>
                        <input type="text" class="form-control" id="" name="c17">
                      </div>
                    </div>
                    <div class="col-md-5">      
                      <div class="form-group">
                        <label for="">PhotoPath</label>
                        <input type="text" class="form-control" id="" name="c18">
                      </div>
                    </div>
                    <div class="col-md-5">      
                      <div class="form-group">
                        <label for="">Salary</label>
                        <input type="text" class="form-control" id="" name="c19">
                      </div>
                    </div>
                  <div class="row">
                    <div class="col-md-10">
                    <button type="submit" class="btn btn-success pull-right">ADD</button>
                    </div>  
                  </div> 
                </form>           
              <hr>
            </div>

            <div class="tab-pane" id="5a">
                <p>Sales Reporting: A screen that has the ability to run a wide range of reports on overall
                  sales by month, by durational period (start and end date), by city and/or state and/or
                  country; reports on sales of customers by month, by durational period (start and end
                  date), by city and/or state and/or country
                </p>
                <div class = "row">
                  <div class="col-lg-12">
                    <h3>Search for Product: </h3>
                    <hr>
                      <form class="navbar-form navbar-left" method = "POST" role="search" action="salesrep.php">
                        <div class="form-group">
                          FROM:
                          <input type="text" class="form-control" name="fromdate" placeholder="eg:1996-07-04 00:00:00">
                        </div>
                        <div class="form-group">
                          TO:
                          <input type="text" class="form-control" name="todate" placeholder="eg:1996-07-04 00:00:00">
                        </div>
                  </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                          Year:
                          <input type="text" class="form-control" name="year" placeholder="eg:1996">
                        </div> 
                        <div class="form-group">
                          Month:
                          <input type="text" class="form-control" name="month" placeholder="eg:5">
                        </div>     
                        <div class="form-group">
                          Day:
                          <input type="text" class="form-control" name="day" placeholder="eg:13">
                        </div>
                        <button type="submit" class="btn btn-primary">GO</button>
                        </form>
                    </div>
                 </div>
                <hr>
                <div class = "row">  
                    <div class="col-md-5"> 
                      <form class="form" method = "POST" action="salesrep2.php">
                        <div class="form-group">
                          Country:
                          <input type="text" class="form-control" name="country" placeholder="eg:France">
                        </div>
                    </div>
                    <div class="col-md-5">      
                        <div class="form-group">
                          Region:
                          <input type="text" class="form-control" name="region" placeholder="eg:NM">
                        </div>
                    </div>
                    <div class="col-md-5">      
                        <div class="form-group">
                          City:
                          <input type="text" class="form-control" name="city" placeholder="eg:Aachen">
                        </div>
                        <button type="submit" class="btn btn-primary">GO</button>
                      </form>
                    </div>
                </div>
                <hr>
                <div class = "row">  
                  <div class="col-md-5"> 
                    <form class="form" method = "POST"  action="salesrep3.php">
                        <div class="form-group">
                          Product Name:
                          <input type="text" class="form-control" name="pname" placeholder="eg:France">
                        </div>
                  </div>      
                  <div class="col-md-5">      
                        <div class="form-group">
                          Category Name:
                          <input type="text" class="form-control" name="cname" placeholder="eg:NM">
                        </div>
                  </div>
                  <div class="col-md-5">      
                        <div class="form-group">
                          UnitsInStock:
                          <input type="text" class="form-control" name="uis" placeholder="eg:Aachen">
                        </div>
                  </div>
                  <div class="col-md-5">      
                        <div class="form-group">
                          CompanyName:
                          <input type="text" class="form-control" name="cmpname" placeholder="eg:Aachen">
                        </div>
                        <button type="submit" class="btn btn-primary">GO</button>
                  </div></form> 
                </div>
                <hr>
                <div class = "row">  
                  <div class="col-md-5"> 
                    <form class="form" method = "POST"  action="salesrep4.php">
                        <div class="form-group">
                          Contact Name:
                          <input type="text" class="form-control" name="c1" placeholder="maria anders">
                        </div>
                  </div>      
                  <div class="col-md-5">      
                        <div class="form-group">
                          City:
                          <input type="text" class="form-control" name="c2" placeholder="eg:madrid">
                        </div>
                  </div>
                  <div class="col-md-5">      
                        <div class="form-group">
                          Region:
                          <input type="text" class="form-control" name="c3" placeholder="eg:connecticut">
                        </div>
                  </div>
                  <div class="col-md-5">      
                        <div class="form-group">
                          Country:
                          <input type="text" class="form-control" name="c4" placeholder="eg:france">
                        </div>
                        <button type="submit" class="btn btn-primary">GO</button>
                  </div> </form>
                </div>
                <hr>       
            </div>

            <div class="tab-pane" id="6a">
                <p>Employee Productivity Reporting: A screen that has the ability to run a wide range of
                  reports on employee productivity by employee and broken down on a customer by
                  customer basis which includes data such as the number of customer(s) per employee and
                  sales of those customer(s) by employee also by month or durational period (start and end date
                </p>
                <div class = "row">
                  <div class="col-lg-12">
                    <h3>Search by:</h3>
                    <hr>
                      <form class="navbar-form navbar-left" method = "POST" role="search" action="emprep.php">
                        <div class="form-group">
                          First Name:
                          <input type="text" class="form-control" name="fname" placeholder="eg:Nancy">
                        </div>
                        <button type="submit" class="btn btn-primary">GO</button>
                    </div>
                  </div>
                <hr>
                <div class="row">
                    <div class="col-md-5"> 
                        <div class="form-group">
                          Year:
                          <input type="text" class="form-control" name="year" placeholder="eg:1996">
                        </div>
                        <div class="form-group">
                          Month:
                          <input type="text" class="form-control" name="month" placeholder="eg:5">
                        </div>
                        <div class="form-group">
                          Day:
                          <input type="text" class="form-control" name="day" placeholder="eg:13">
                        </div>
                        <button type="submit" class="btn btn-primary">GO</button>
                    </div>
                </div>
                <div class = "row">
                  <div class="col-md-5">
                    <hr>
                        <div class="form-group">
                          FROM:
                          <input type="text" class="form-control" name="fromdate" placeholder="eg:1996-07-04 00:00:00">
                        </div>
                        <div class="form-group">
                          TO:
                          <input type="text" class="form-control" name="todate" placeholder="eg:1996-07-04 00:00:00">
                        </div>
                        <button type="submit" class="btn btn-primary">GO</button>
                  </div>
                </div></form>
            </div>

            <div class="tab-pane" id="7a">
                <p>Inventory Reporting: A screen that has the ability to run a wide range of reports on
                products by name, category, supplier, amounts (in stock, reorder limit, etc.). These can
                be summary reports product name, product category, supplier name, amounts, etc.
                </p>
                <hr>
                <div class = "row">  
                  <div class="col-md-5"> 
                    <form class="form" method = "POST"  action="invrep.php">
                        <div class="form-group">
                          Product Name:
                          <input type="text" class="form-control" name="c1" placeholder="eg: chai">
                        </div>
                  </div>      
                  <div class="col-md-5">      
                        <div class="form-group">
                          Category Name:
                          <input type="text" class="form-control" name="c2" placeholder="eg:beverages">
                        </div>
                  </div>
                  <div class="col-md-5">      
                        <div class="form-group">
                          Company Name:
                          <input type="text" class="form-control" name="c3" placeholder="eg:company name">
                        </div>
                  </div>
                  <div class="col-md-5">      
                        <div class="form-group">
                          UnitsInstock:
                          <input type="text" class="form-control" name="c4" placeholder="eg:units in stock">
                        </div>
                        <button type="submit" class="btn btn-primary">GO</button>
                  </div> 
                </div></form>
                <hr> 
                
            </div>

            <div class="tab-pane" id="8a">
                <p>Customer Reporting: A screen that has the ability to run a wide range of reports on the
                interests of customers in terms of music and media preferences. This can include
                looking at what a specific customer prefers in terms of products, categories, etc., or
                might be statistical analysis across multiple customers to determine preferences by state
                and/or country. Each Group is tasked with defining the scope of customer reporting for their project
                </p>
                <hr>
                <div class = "row">  
                  <div class="col-md-5"> 
                    <form class="form" method = "POST"  action="cusrep1.php">
                        <div class="form-group">
                          Contact Name:
                          <input type="text" class="form-control" name="c1" placeholder="eg: maria anders">
                        </div>
                  </div>      
                  <div class="col-md-5">      
                        <div class="form-group">
                          City:
                          <input type="text" class="form-control" name="c2" placeholder="eg:madrid">
                        </div>
                  </div>
                  <div class="col-md-5">      
                        <div class="form-group">
                          Region:
                          <input type="text" class="form-control" name="c3" placeholder="eg:madrid">
                        </div>
                  </div>
                  <div class="col-md-5">      
                        <div class="form-group">
                          Country:
                          <input type="text" class="form-control" name="c4" placeholder="eg:france">
                        </div>
                        <button type="submit" class="btn btn-primary">GO</button>
                  </div> </form>
                </div>
                <hr>
                <div class = "row">  
                  <div class="col-md-5"> 
                    <form class="form" method = "POST"  action="cusrep2.php">
                        <div class="form-group">
                          Product Name:
                          <input type="text" class="form-control" name="c1" placeholder="eg: chai">
                        </div>
                  </div>      
                  <div class="col-md-5">      
                        <div class="form-group">
                          Category Name:
                          <input type="text" class="form-control" name="c2" placeholder="eg:beverages">
                        </div>
                  </div>
                  <div class="col-md-5">      
                        <div class="form-group">
                          Company Name:
                          <input type="text" class="form-control" name="c3" placeholder="eg:company name">
                        </div>
                  </div>
                  <div class="col-md-5">      
                        <div class="form-group">
                          UnitsInstock:
                          <input type="text" class="form-control" name="c4" placeholder="eg:units in stock">
                        </div>
                        <button type="submit" class="btn btn-primary">GO</button>
                  </div> </form>
                </div>
                <hr>
                <div class = "row">
                  <div class="col-lg-12">
                    <h4>Search by years: </h4>
                    <hr>
                      <form class="form" method= "POST" action="salesrep.php">
                        <div class="form-group">
                          FROM:
                          <input type="text" class="form-control" name="fromdate" placeholder="eg:1996-07-04 00:00:00">
                        </div>
                        <div class="form-group">
                          TO:
                          <input type="text" class="form-control" name="todate" placeholder="eg:1996-07-04 00:00:00">
                        </div>
                  </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-5"> 
                        <div class="form-group">
                          Year:
                          <input type="text" class="form-control" name="year" placeholder="eg:1996">
                        </div>
                        <div class="form-group">
                          Month:
                          <input type="text" class="form-control" name="month" placeholder="eg:5">
                        </div>
                        <div class="form-group">
                          Day:
                          <input type="text" class="form-control" name="day" placeholder="eg:13">
                        </div>
                        <button type="submit" class="btn btn-primary">GO</button>
                    </div>
                </div></form>
                <hr>
                <hr>
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