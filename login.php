<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <!-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> -->
    <title>Login</title>
</head>

<body>
    <div class="container">
        <!-- <div class="text-gray-00   px-4 mt-4 p-4 text-center rounded border bg-blue-200 mx-auto mb-4">hello</div> -->
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div class="box">
                    <div class="shape1"></div>
                    <div class="shape2"></div>
                    <div class="shape3"></div>
                    <div class="shape4"></div>
                    <div class="shape5"></div>
                    <div class="shape6"></div>
                    <div class="shape7"></div>
                    <div class="float">
                        <form class="form" method="POST" action="login.php">
                            <div class="form-group">
                                <label for="username" class="text-white">Email:</label><br>
                                <input type="Email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-white">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
    include "./connect.php";
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $str = "select * from users where email='$email' and password = '$password'";
        $result = mysqli_query($conn,$str);
        $row = mysqli_fetch_array($result);
        if($row){
            $username = $row['name'];
            $role = $row['role'];
            $_SESSION['role'] = $role;
            $_SESSION['username'] = $username;
            if($role == 'admin'){
                header('Location: ./adminHome.php');
            }
            else{
                header('Location: ./employeeHome.php');
            }
        }
        else{ echo '<script> alert("Email or Password Is Wrong"); </script>'; }
    }
?>