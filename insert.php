<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Insert</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!-- <a class="navbar-brand" href="./index.php">Home</a> -->
        <div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./list.php">List</a>
                </li>
                <li class="nav-item" active>
                    <a class="nav-link active"href="insert.php">insert</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="mb-3">
            <h2>Create Empoloyee</h2>
        </div>
        <form method="POST" action="insert.php" class="col-6">
            <div class="form-group">
                <label for="exampleInputName">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="exampleInputAddress">Address</label>
                <input type="text" name="address" class="form-control" placeholder="Address">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <input class = "btn btn-primary" type="submit" name = "submit" value="Insert">
        </form>
    </div>
</body>
</html>
<?php 
    include './connect.php';
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $str = "INSERT INTO `employees`(`name`, `address`, `email`, `password`) VALUES ('$name','$address','$email','$password')";
        if(mysqli_query($conn, $str)){
            // echo "<script>alert('Employee inserted Successfully')</script>";
            header("Location: list.php");
        }
    }
?>
