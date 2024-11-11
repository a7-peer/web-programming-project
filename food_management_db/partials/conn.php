<?php
define('servername', 'localhost');
define("username", "root");
define("password", "");
define("db", "food_management_db");
$conn=new mysqli(servername,username,password,db);
if($conn->connect_error){
    echo $conn->connect_error;
}
