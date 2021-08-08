<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <title>List</title>
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
                    <a class="nav-link active" href="list.php">List</a>
                </li>
                <li class="nav-item" active>
                    <a class="nav-link" href="./insert.php">insert</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="mb-4">
            <h2>List of Empoloyee</h2>
            <table id="table_id" class="table col-md-6">
                <thead class="thead-dark">
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include './connect.php';
                    $str = "select * from employees";
                    $result = mysqli_query($conn, $str);
                    $i = 1;
                    while ($row = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $row["name"] ?></td>
                            <td><?php echo $row["address"] ?></td>
                            <td><?php echo $row["email"] ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row["id"] ?>" class="btn btn-primary">Edit</a>
                                <a class = "btn btn-danger" data-toggle="modal" data-target="#mymodal<?php echo $row["id"]?>">Delete</a>
                                <div class="modal" id="mymodal<?php echo $row["id"]?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Confirmation...</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                Are you Sure you want to delete <?php echo $row["name"] ?>
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <a href="delete.php?id=<?php echo $row["id"] ?>" class = "btn btn-success">Yes</a>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </td>

                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
    <!-- <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>