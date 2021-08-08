<?php
    include "./connect.php";
    $cityId = $_REQUEST['cityId'];
    $str = "select * from district where cityId = $cityId";
    $result=mysqli_query($conn,$str);
    $data = [];
    $i=0;
    while($row = mysqli_fetch_array($result)){
        $data[$i]['id'] = $row['id'];
        $data[$i++]['name'] = $row['name'];
    }
    echo json_encode($data);
?>