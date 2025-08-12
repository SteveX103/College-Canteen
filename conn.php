<?php
$server="localhost";
$username="root";
$password="Sriju@2025";
$db="canteen";

$conn=new mysqli($server, $username, $password, $db);
if(!$conn){
    echo "Connection error: " . mysqli_connect_error();
}
?>