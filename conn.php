<?php

$servername="localhost";
$username= "root";
$password= "";
$database= "db_project";

$conn=mysqli_connect($servername,$username,$password,$database);

if(!$conn)
{
    die("Sorry we could not connect :( , " .mysqli_connect_error());
}


?>


