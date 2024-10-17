<?php
session_start();
error_reporting(0);

$servername= "localhost";
$username = "root";
$password = "";
$dbname = "cnt";


try {
   
   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    //echo $conn;// set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed:" . $e->getMessage();exit;
    }


?>