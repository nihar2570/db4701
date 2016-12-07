<?php

$host="localhost";
$user="root";
$password="";
$dbname="northwind";

$con = new mysqli($host, $user, $password, $dbname)
    or die ('Couldnt connect to the database' . mysqli_connect_error());

session_start();
?>
