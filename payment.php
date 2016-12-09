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
              <a href="dashboard2.php"><button type="submit" class="btn btn-default">Back</button></a>

              </body>
</html>