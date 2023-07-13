<?php
include "Public/config/config.php";
?>

<html>
<head>
    <style>
        <?php include "Modules/someFunction/Public/css/upload.css"?>
    </style>
    <?php include "Views/admin/layouts/header.php"; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div>
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <a style="color:black;display: block; margin: 20px; font-size:15px"
               class="animate__animated animate__fadeInLeft"
               href="<?php echo $DefaultSomeFunction; ?>/listPlugin">
                <i class="fa-solid fa-arrow-left"> Back</i>
            </a>

            <div class="container-fluid">
                <div>
                    <img style="width: 100%;border-radius: 3%" src="..\Public\images\monitor.jpg">
                </div>
                <div style="position: absolute ;top: 0">
                    <form enctype="multipart/form-data" method="post" action="uploadPlugin" id="uploadForm">
                        <div class="upload-details">
                            <div class=" col-12">
                                <div style="text-align: center;">
                                    <h3>Select to upload file </h3>
                                    <label for="files" class="btn animate__fadeIn"><i style="color: lightskyblue"
                                                                                      class="fa-solid fa-cloud-arrow-up"></i></label>
                                    <input name="files[]" id="files" accept=".zip" style="display:none;color: white"
                                           type="file" multiple>
                                </div>
                                <input style="display: block; margin: 0 auto; text-align: center; font-size: 15px"
                                       type="submit"
                                       name="submit"
                                       value="Upload" id="upload"
                                       class="btn btn-success upload animate__animated animate__fadeInUp">
                                <h3 style="margin: 30px;text-align: center" id="message"></h3>
                            </div>
                    </form>
                </div>
                <!-- hiển thị giá trị của các file sẽ up lên-->
                <div class="content">
                    <ul id="uploadedFiles"></ul>
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
    <?php include "Modules/someFunction/Public/js/plugin/btnUpload.js"?>
</script>


<footer>
    <?php include "Views/admin/layouts/footer.php"; ?>
</footer>
</html>
