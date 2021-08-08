<?php 
    include './connect.php';
    $emp_id = $_REQUEST['id'];
    $str = "DELETE FROM `employees` WHERE id = $emp_id";
    if(mysqli_query($conn,$str)){
        header("location: list.php");
    };
?>