<?php
$server_name = "localhost";
$username="root";
$password="";
$database="foodfasters";
$conn = mysqli_connect($server_name,$username,$password,$database);
if(!$conn){
echo mysqli_error($conn);
}

?>