<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "fyp";

$conn = mysqli_connect($hostname, $username, $password, $database) or die("Database connection failed");

$base_url = "http://localhost/login1/";
$my_email = "nyaupane04@gmail.com";

$smtp['host'] = "smtp.gmail.com";
$smtp['user'] = "nyaupane04@gmail.com";
$smtp['pass'] = "sculniesufnkqvst";
$smtp['port'] = 465;
