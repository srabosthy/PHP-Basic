<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Location</title>
</head>
<body>
    <div class="container">
        <form class="border col-6" style="margin-top: 5%; margin-bottom: 5%;" action="">
            <div class="form-group" style="margin-top: 5%;">
                <label for="">Country</label>
                <select class="form-control"  name="country" id="country">
                    <option selected>Select A country</option>
                    <?php include "./connect.php" ;
                    $str = "select * from country";
                    $result = mysqli_query($conn,$str);
                    while($row = mysqli_fetch_array($result)){ ?>
                        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group" style="margin-top: 5%;">
                <label for="">City</label>
                <select class="form-control"  name="division" id="city">
                    <option selected>Select A City</option>
                </select>
            </div>
            <div class="form-group" style="margin-top: 5%;">
                <label for="">District</label>
                <select class="form-control"  name="district" id="district">
                    <option selected>Select A district</option>
                </select>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function(){
            $("#country").change(function(){
                var country = $("#country").val();

                $.ajax({
                    url: './getCity.php',
                    dataType: 'json',
                    data: {
                        "countryId": country
                    },
                    success: function(data){
                        for(i = 0 ; i < data.length ; i++){
                            var x =  '<option value="'+data[i].id+'"> '+data[i].name+'</option>';
                            $("#city").append(x);
                        }
                    }
                });
            });
            $("#city").change(function(){
                var city = $("#city").val();
                console.log(city);
                $.ajax({
                    url: './getDistrict.php',
                    dataType: 'json',
                    data: {
                        "cityId": city
                    },
                    success: function(data){
                        console.log(data);
                        $('#district').html('<option selected>Select A district</option>');
                        for(i = 0 ; i < data.length ; i++){
                            var x =  '<option value="'+data[i].id+'"> '+data[i].name+'</option>';
                            $("#district").append(x);
                        }
                    }
                });
            });
        });

    </script>
</body>
</html>