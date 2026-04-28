<?php
$servername="localhost";
$username="root";
$password="";
$dbname="core";
$connect=mysqli_connect($servername,$username,$password,$dbname);
if(!$connect){
    echo "connection established";
}


?>