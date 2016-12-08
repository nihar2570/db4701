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


	<div class="container"><h1>Northwind Web Application</h1>
		<div id="exTab1" class="container">	
			<ul  class="nav nav-pills">
				<li class="active"><a  href="#1a" data-toggle="tab">Home</a></li>
				<li><a href="#7a" data-toggle="tab">Search</a></li>
        <li><a href="#8a" data-toggle="tab">Buy</a></li>
				<li><a href="#2a" data-toggle="tab">Shopping Cart</a></li>
				<li><a href="#3a" data-toggle="tab">My Orders</a></li>
  				<li><a href="#4a" data-toggle="tab">Payment Options</a></li>
  				<li><a href="#5a" data-toggle="tab">Edit Profile</a></li>
  				<li><a href="#6a" data-toggle="tab">Logout</a></li>
			</ul>

		<div class="tab-content clearfix">
			<div class="tab-pane active" id="1a">
         		<h3>Send us a note :)</h3>
         		<form>
         		<div class="row">
         			<div class="col-lg-6">
         				<div class="form-group">
    						<textarea class="form-control" id="exampleTextarea" rows="8"></textarea>
  						</div>
  					</div>
  				</div>
  				<button type="submit" class="btn btn-primary">Submit</button>
  				</form>
			</div>

			<div class="tab-pane" id="2a">
          		<h3>My shopping cart</h3>
          		<div class="container">
					<div class="row">
                  <div class="span5">
                      <table class="table table-striped">
                          <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity Per Unit</th>
                                <th>Price</th>
                                <th>Units In Stock</th>
                                <th>Status</th>                                          
                            </tr>
                          </thead>   
                            <!-- we need a for loop here for every thread , for a different order-->
                            <?php
                            $qry = mysqli_query($con,"SELECT * FROM northwind.Products JOIN northwind.shoppingcart ON Products.productID = shoppingcart.productID;");
                              if(mysqli_num_rows($qry)!=0)
                                {
                                  while($row = $qry->fetch_assoc()) {
                                  if($_SESSION['username'] == $row['cusID']){
                                    $_SESSION['SC_product_name'] = $row['ProductName'];
                                    $_SESSION["SC_quantity"] = $row['QuantityPerUnit'];
                                    $_SESSION["SC_price"] = $row['UnitPrice'];
                                    $_SESSION["SC_stock"] = $row['UnitsInStock'];
                                    echo"
                                        <tbody>
                                          <tr>
                                            <td>".$row['ProductName']."</td>
                                            <td>".$row['QuantityPerUnit']."</td>
                                            <td>".$row['UnitPrice']."</td>
                                            <td>".$row['UnitsInStock']."</td>
                                            <form action=\"dashboard2.php\" method=\"POST\">
                                            <td><button class=\"label label-success\" name=\"blag\">Active</button></td>  
                                            </form>           
                                          </tr>                                   
                                        </tbody>";
                                  }
                                  }
                                }else{
                                  echo "no active orders";
                                  exit();
                                }
                            ?>
                        </table>
                        </div>                     
                          <form action="payment.php" method="POST">
                          <button name="pay_all" type="submit" value="pay_all">Pay for shopping cart</button>
                          </form>
					</div>
				</div>
			</div>

        	<div class="tab-pane" id="3a">
          		<h3>ORDERS</h3>
          		<div class="container">
              <div class="row">
                  <div class="span5">
                      <table class="table table-striped">
                          <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Product Name</th>
                                <th>Unit Price</th>
                                <th>Quantity Ordered</th>
                                <th>Status</th>                                          
                            </tr>
                          </thead>   
                            <!-- we need a for loop here for every thread , for a different order-->
                            <?php
                            $qry = mysqli_query($con,"SELECT * FROM northwind.Orders JOIN `order details` ON Orders.orderID = `order details`.orderID JOIN products ON products.productID = `order details`.productID where orders.CustomerID = '{$_SESSION['username']}';");
                              if(mysqli_num_rows($qry)!=0)
                                {
                                  while($row = $qry->fetch_assoc()) {
                                    $_SESSION["SC_order_id"] = $row['OrderID'];
                                    $_SESSION["SC_product_name"] = $row['ProductName'];
                                    $_SESSION["SC_price"] = $row['UnitPrice'];
                                    $_SESSION["SC_quantity"] = $row['Quantity'];
                                    echo"
                                        <tbody>
                                          <tr>
                                            <td>".$row['OrderID']."</td>
                                            <td>".$row['ProductName']."</td>
                                            <td>".$row['UnitPrice']."</td>
                                            <td>".$row['Quantity']."</td>
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
          	<div class="tab-pane" id="4a">
<div class="container">
                <div class = "row">
                <div class = "col-md-4">
                <form class="form-horizontal" role="search" method="POST" action="payment_var.php">
                    <h3>Andriod Pay</h3>
                    <div class="form-group">
                      <div class="col-md-9">
                        <strong>Andriod Pay</strong>
                        <input type="text" class="form-control" name="andriod_pay" placeholder="payment ID">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-9">
                        <strong>Confirmation Number</strong>
                        <input type="text" class="form-control" name="andriod_conf" placeholder="confirmation number">
                      </div>
                    </div>
                  <button type="submit" class="btn btn-primary">ADD</button>
                </form>
                </div>
                <!--row ends-->
                
                <div class = "col-md-4">
                <form class="form-horizontal" role="search" method="POST" action="payment_var.php">
                    <h3>Apple Pay</h3>
                    <div class="form-group">
                      <div class="col-md-9">
                        <strong>Payment ID</strong>
                        <input type="text" class="form-control" name="apple_pay" placeholder="payment ID">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-9">
                        <strong>Confirmation Number</strong>
                        <input type="text" class="form-control" name="apple_conf" placeholder="confirmation number">
                      </div>
                    </div>
                  <button type="submit" class="btn btn-primary">ADD</button>
                </form>
                </div><!--row ends-->

                <div class = "col-md-4">
                <form class="form-horizontal" role="search" method="POST" action="payment_var.php">
                    <h3>Credit Card</h3>
                    <div class="form-group">
                      <div class="col-md-9">
                        <strong>Payment ID</strong>
                        <input type="text" class="form-control" name="credit_pay" placeholder="payment ID">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-9">
                        <strong>Confirmation Number</strong>
                        <input type="text" class="form-control" name="credit_conf" placeholder="confirmation number">
                      </div>
                    </div>
                  <button type="submit" class="btn btn-primary">ADD</button>
                </form>
                </div>
                </div><!--row ends-->

                <div class = "row">
                <div class = "col-md-4">
                <form class="form-horizontal" role="search" method="POST" action="payment_var.php">
                    <h3>Debit Card</h3>
                    <div class="form-group">
                      <div class="col-md-9">
                        <strong>Payment ID</strong>
                        <input type="text" class="form-control" name="debit_pay" placeholder="payment ID">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-9">
                        <strong>Confirmation Number</strong>
                        <input type="text" class="form-control" name="debit_conf" placeholder="confirmation number">
                      </div>
                    </div>
                  <button type="submit" class="btn btn-primary">ADD</button>
                </form>
                </div>
                <!--row ends-->
                
                <div class = "col-md-4">
                <form class="form-horizontal" role="search" method="POST" action="payment_var.php">
                    <h3>PayPal</h3>
                    <div class="form-group">
                      <div class="col-md-9">
                        <strong>Payment ID</strong>
                        <input type="text" class="form-control" name="paypal_pay" placeholder="payment ID">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-9">
                        <strong>Confirmation Number</strong>
                        <input type="text" class="form-control" name="paypal_conf" placeholder="confirmation number">
                      </div>
                    </div>
                  <button type="submit" class="btn btn-primary">ADD</button>
                </form>
                </div><!--row ends-->

                <div class = "col-md-4">
                <form class="form-horizontal" role="search" method="POST" action="payment_var.php">
                    <h3>Bank Account</h3>
                    <div class="form-group">
                      <div class="col-md-9">
                        <strong>Payment ID</strong>
                        <input type="text" class="form-control" name="bank_pay" placeholder="payment ID">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-9">
                        <strong>Confirmation Number</strong>
                        <input type="text" class="form-control" name="bank_conf" placeholder="confirmation number">
                      </div>
                    </div>
                  <button type="submit" class="btn btn-primary">ADD</button>
                </form>
                </div>
                </div><!--row ends-->
              </div>
			</div>

			<div class="tab-pane" id="5a">
          		<h3>Are you sure you want to edit your profile?</h3>
          		<a href="edit_acc.php" class="btn btn-danger">
          			<span class="glyphicon glyphicon-pencil"></span> edit info
          		</a>
			</div>

			<div class="tab-pane" id="6a">
          		<h3>Are you sure you want to logout?</h3>
          		<a href="logout.php" class="btn btn-danger">
          			<span class="glyphicon glyphicon-log-out"></span> Logout
          		</a>
			</div>

      <div class="tab-pane" id="8a">
          search here
          <div class = "row">
          <div class="col-md-6">
            <h3>Search for Products by 'product name': </h3>
                <form class="navbar-form navbar-left" role="search" method="POST" action="dashboard.php">
                  <div class="form-group">
                    <input type="text" class="form-control" name="buy_product_name" placeholder="Search">
                  </div>
                  <button type="submit" class="btn btn-default">GO</button>
                </form>
          </div>
          <div class="col-md-6">
              <h3>Search for Products by 'supplier name': </h3>
              <form class="navbar-form navbar-left" role="search" method="POST" action="dashboard.php">
              <div class="form-group">
                <input type="text" class="form-control" name="buy_supplier_name" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-default">GO</button>
              </form>
          </div>
          </div>
        <div class = "row">
          <div class="col-md-6">
            <h3>Search for Products by 'categories': </h3> <!-- this is for the buy tab-->
                <form class="navbar-form navbar-left" role="search" method="POST" action="dashboard.php">
                  <div class="form-group">
                    <input type="text" class="form-control" name="buy_cat_name" placeholder="Search">
                  </div>
                <button type="submit" class="btn btn-default">GO</button>
                </form>
          </div>
          <div class="col-md-6">
              <h3>Search for Products by 'category enchancements?': </h3>
                  <form class="navbar-form navbar-left" role="search" method="POST" action="dashboard.php">
                     <div class="form-group">
                      <input type="text" class="form-control" name="buy_cat_name" placeholder="Search">
                     </div>
                     <button type="submit" class="btn btn-default">GO</button>
                  </form>
          </div>
        </div>
              <div class="row">
                  <div class="span5">
                      <table class="table table-striped">
                          <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity Per Unit</th>
                                <th>Price</th>
                                <th>Units In Stock</th>
                                <th>Status</th>                                          
                            </tr>
                          </thead>   
                            <!-- we need a for loop here for every thread , for a different order-->
                            <?php
                            $qry = mysqli_query($con,"SELECT * FROM northwind.Products JOIN northwind.shoppingcart ON Products.productID = shoppingcart.productID;");
                              if(mysqli_num_rows($qry)!=0)
                                {
                                  while($row = $qry->fetch_assoc()) {
                                  if($_SESSION['username'] == $row['cusID']){
                                    $_SESSION['SC_product_name'] = $row['ProductName'];
                                    $_SESSION["SC_quantity"] = $row['QuantityPerUnit'];
                                    $_SESSION["SC_price"] = $row['UnitPrice'];
                                    $_SESSION["SC_stock"] = $row['UnitsInStock'];
                                    echo"
                                        <tbody>
                                          <tr>
                                            <td>".$row['ProductName']."</td>
                                            <td>".$row['QuantityPerUnit']."</td>
                                            <td>".$row['UnitPrice']."</td>
                                            <td>".$row['UnitsInStock']."</td>
                                            <form action=\"dashboard2.php\" method=\"POST\">
                                            <td><button class=\"label label-success\" name=\"blag\">Active</button></td>  
                                            </form>           
                                          </tr>                                   
                                        </tbody>";
                                  }
                                  }
                                }else{
                                  echo "no active orders";
                                  exit();
                                }
                            ?>
                        </table>
                        </div>                     
                          <form action="dashboard.php" method="POST">
                          <button name="clear_all" type="submit" value="clear_all">Clear</button>
                          </form>
                    </div>
      </div>

			<div class="tab-pane" id="7a">
				<div class = "row">
					<div class="col-md-6">
						<h3>Search for Products by 'product name': </h3>
            <form class="navbar-form navbar-left" role="search" method="POST" action="dashboard.php"> <!--post and action-->
  						<div class="form-group">
    						<input type="text" class="form-control" name="product_name" placeholder="Search"> <!-- name -->
  						</div>
  						<button type="submit" class="btn btn-default">GO</button>
						</form>
					</div>
					<div class="col-md-6">
          			<h3>Search for Products by 'supplier name': </h3>
          		  <form class="navbar-form navbar-left" role="search" method="POST" action="dashboard.php">
  							<div class="form-group">
    						<input type="text" class="form-control" name="supplier_name" placeholder="Search">
  							</div>
  							<button type="submit" class="btn btn-default">GO</button>
						</form>
					</div>
        </div>
				<div class = "row">
					<div class="col-md-6">
						<h3>Search for Products by 'categories': </h3>
          				<form class="navbar-form navbar-left" role="search" method="POST" action="dashboard.php">
  							<div class="form-group">
    						<input type="text" class="form-control" name="cat_name" placeholder="Search">
  							</div>
  							<button type="submit" class="btn btn-default">GO</button>
						</form>
					</div>
					<div class="col-md-6">
          				<h3>Search for Products by 'category enchancements?': </h3>
          				<form class="navbar-form navbar-left" role="search" method="POST" action="dashboard.php">
  							<div class="form-group">
    						<input type="text" class="form-control" name="cat_name" placeholder="Search">
  							</div>
  							<button type="submit" class="btn btn-default">GO</button>
						</form>
					</div>
				</div>
			</div><!-- tab 7 content ends here-->

		</div><!--Tab content -->
		</div><!--All tab code ends-->
  </div><!--NORTHWIND WEB APPLICATION CONTAINER-->
</body>
</html>