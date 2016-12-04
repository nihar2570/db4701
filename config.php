<?php

$host="localhost";
$user="root";
$password="";
$dbname="login";

$con = new mysqli($host, $user, $password, $dbname)
    or die ('Couldnt connect to the database' . mysqli_connect_error());
    echo "Successfully connected to database server";

    session_start();

?>

