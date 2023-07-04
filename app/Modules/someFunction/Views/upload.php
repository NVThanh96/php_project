<?php
include "Public/config/config.php";
?>

<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
          rel="stylesheet">

    <style>
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .fade-in-left {
            animation: fadeInLeft 2s ease-in;
            opacity: 0;
        }

        @keyframes fadeInLeft {
            0% {
                opacity: 0;
                transform: translateX(-50px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }


        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        label {
            display: block;
            font-size: 30px;
            margin-bottom: 5px;
        }

        label:hover {
            animation: pulse 1s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }


        .box {
            position: relative;
            margin: 5% 25.3%;
            padding: 200px;
            width: 800px;
            animation: fadeInDown 2s;
        }

        .box::before {
            content: "";
            position: absolute;
            top: -3px;
            left: -3px;
            right: -3px;
            bottom: -3px;
            border-radius: 10px;
            animation: runAroundBorder 3s reverse infinite;
        }

        @keyframes runAroundBorder {
            0% {
                box-shadow: 0 0 0 0 rgba(162, 239, 189, 0.65);
            }

            100% {
                box-shadow: 0 0 0 6px rgba(119, 199, 147, 0.65), 0 0 20px 9px rgba(175, 74, 203, 0.3);
            }
        }

        .form_field {
            margin-bottom: 15px;
        }

        input[type="file"] {
            margin-top: 5px;
        }

        #upload {
            font-style: normal;
        }

    </style>
    <?php include "Views/admin/layouts/header.php"; ?>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <a style="color:black;display: block; margin: 20px; font-size:15px"   class="upload animate__animated animate__fadeInLeft" href="<?php echo $DefaultSomeFunction; ?>/listPlugin">
            <i class="fa-solid fa-arrow-left"> Back</i>
        </a>
        <div class="container-fluid">
            <div class="box">
                <div class="form_field">
                    <form enctype="multipart/form-data" method="post" action="uploadPlugin" id="uploadForm">
                        <div style="text-align: center;">
                            <h3 class="animate__animated animate__fadeInDown"
                                style="font-family: 'Dancing Script';font-size: 45px;font-style: italic;">
                                Add your menu
                            </h3>

                            <label for="files" class="btn animate__animated animate__fadeIn">
                                <i style=" margin: 25px 0;font-size: 38px" class="fa-solid fa-cloud-arrow-up"></i>
                            </label>

                            <input name="files" id="files" accept=".zip" style="display:none;" type="file">
                        </div>
                        <input style="display: block; margin: 0 auto; text-align: center; font-size: 20px" type="submit"
                               name="submit"
                               value="Upload" id="upload" class="upload animate__animated animate__fadeInUp">

                        <h3 style="margin: 30px;text-align: center" id="message"></h3>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<!-- ... Remaining HTML code ... -->
<script>
<?php include "Modules/someFunction/Public/js/plugin/choiceFileUp.js"?>
</script>

<script>

</script>

<script>
    <?php include "Modules/someFunction/Public/js/plugin/btnUpload.js"?>
</script>


<footer>
    <?php include "Views/admin/layouts/footer.php"; ?>
</footer>
</html>
