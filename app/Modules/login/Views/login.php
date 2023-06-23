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
    <title>Title Page</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: linear-gradient(to right, rgba(33, 150, 243, 0.8), rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.8), rgba(33, 150, 243, 0.8)), url('Public/images/login.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            animation: gradientAnimation 10s infinite;
            margin-top: 4.5%;
            margin-left: 2.5%;
        }


        @keyframes gradientAnimation {
            0% {
                background-position: 30% 30%;
            }
            50% {
                background-position: 100% 10%;
            }
            100% {
                background-position: 30% 30%;
            }
        }

        form {
            width: 430px;
            margin: 8% auto;
            background-color: rgb(255, 255, 255, 0.7);
            padding: 20px;
            border-radius: 7px;
        }

        .container {
            margin-bottom: 20px;
        }

        .message {
            color: red;
            font-weight: bold;
            margin-bottom: 10px;
        }

        h3 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 23px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }

        input[type="submit"],
        input[type="reset"] {
            display: inline-block;
            padding: 10px 20px;
            background-color: #1e2933;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #4cd989;
        }


    </style>
</head>
<body>

<div class="container">

</div>
<form name="frmUser" id="frmUser" method="post" action="login?action=btnLogin" align="center">
    <div class="message">
        <?php
        if ($message_error ? $message_error : '') {
            echo $message_error;
        }
        ?>
    </div>
    <input type="hidden" name="session_token" value="{your session token value}">

    <h3 align="center">Đăng nhập</h3>

    <div class="form-group">
        <label for="">Tên Đăng Nhập</label>
        <input type="text" name="username" class="form-control" placeholder="Enter username">
    </div>

    <div class="form-group">
        <label for="">Mật Khẩu</label>
        <input type="password" name="password" class="form-control" placeholder="Enter password">
    </div>

    <br>
    <!--<button type="submit" name="submit" class="btn btn-success">Đăng Nhập</button>-->
    <button type="submit" name="submit" class="btn btn-success" onclick="executeExample('customPosition')">
        Đăng Nhập
    </button>
    <a type="reset" class="btn btn-danger" href="/JobDnict/php_project/app/">Quay Lại</a>

</form>

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
