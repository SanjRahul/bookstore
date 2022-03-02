<?php
$servername='localhost';
$username='root';
$password='';
$dbname='bookstore';
$con= mysqli_connect($servername,$username,$password,$dbname);
if ($con){
    // echo "connecting";
}else{
    echo " errors connecting";
}
?>