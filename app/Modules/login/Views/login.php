<!-- Required dependencies for Bootstrap carousel -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.12/sweetalert2.min.js"
        integrity="sha512-JbRQ4jMeFl9Iem8w6WYJDcWQYNCEHP/LpOA11LaqnbJgDV6Y8oNB9Fx5Ekc5O37SwhgnNJdmnasdwiEdvMjW2Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trung Tâm Số</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style>
        <?php include "Modules/login/Public/css/style.css"?>
    </style>
</head>
<body>

    <div <div class="row login">

        <!--<i class="infinity"></i>-->
        <div class="col-sm-9 left">
            <img style="width: 100%" class="img" src='data:image/png;base64,<?php echo base64_encode(file_get_contents("C:\wamp64\www\JobDnict\php_project\app\Modules\login\Public\img\img1.png")); ?>'>
            <img class="icon1" src='data:image/png;base64,<?php echo base64_encode(file_get_contents("C:\wamp64\www\JobDnict\php_project\app\Modules\login\Public\img\icon11.png")); ?>'>
            <img class="icon2" src='data:image/png;base64,<?php echo base64_encode(file_get_contents("C:\wamp64\www\JobDnict\php_project\app\Modules\login\Public\img\icon22.png")); ?>'>
            <img class="icon3" src='data:image/png;base64,<?php echo base64_encode(file_get_contents("C:\wamp64\www\JobDnict\php_project\app\Modules\login\Public\img\global.png")); ?>'>
            <img class="icon4" src='data:image/png;base64,<?php echo base64_encode(file_get_contents("C:\wamp64\www\JobDnict\php_project\app\Modules\login\Public\img\chart.png")); ?>'>

        </div>
        <div class="col-sm-3">
            <div class="input-login">
                <a type="reset" href="/JobDnict/php_project/app/"><i class="fa-solid fa-arrow-left"></i></a>

                <form name="frmUser" id="frmUser" method="post" action="login?action=btnLogin">
                    <div class="message">
                        <?php
                        if ($message_error ? $message_error : '') {
                            echo $message_error;
                        }
                        ?>
                    </div>
                    <input type="hidden" name="session_token" value="{your session token value}">
                    <h3><i class="fa-brands fa-envira"></i>
                        Đăng nhập</h3>
                    <hr style="border: black 1px solid">

                    <div class="form-group">
                        <label for="">Tên Đăng Nhập</label>
                        <input type="text" name="username" class="form-control" placeholder="Enter username">
                        <i class="fa-solid fa-user"></i>
                    </div>

                    <div class="form-group">
                        <label for="">Mật Khẩu</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter password">
                        <i class="fa-solid fa-lock"></i>
                    </div>

                    <br>
                    <!--<button type="submit" name="submit" class="btn btn-success">Đăng Nhập</button>-->
                    <button style="    font-size: 20px;
width: 100%" type="submit" name="submit" class="btn btn-success" onclick="executeExample('customPosition')">
                        <i class="fa-solid fa-key"></i> Đăng Nhập
                    </button>

                </form>
            </div>

        </div>


    </div>

</div>

<script>
    <?php include('Public/js/showInternetSlow.js') ?>
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.12/sweetalert2.all.js"
        integrity="sha512-7TfWz/1TEVLE2pG8KLC/suq4qgXocI+/sNKfX0yifGXBbSKPoA9wcQ2GDublV7SSCu90vnW1q7+TUXOYaCIshA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>

