<?php
session_start();
require 'connection.php';

if(isset($_POST['delete_btn_set']))
{
    $del_id = $_POST['delete_id'];
    
    $delete = mysqli_query($con,"delete from books where book_id='$del_id'");

}

?>