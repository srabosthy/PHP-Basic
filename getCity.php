<?php 
    include "./connect.php";
    $countryId = $_REQUEST['countryId'];
    $str = "select * from city where countryId = $countryId";
    $result = mysqli_query($conn,$str);
    $data = [];
    while($row = mysqli_fetch_array($result)){
        $data[] = $row;
    }
    echo json_encode($data);    
?>