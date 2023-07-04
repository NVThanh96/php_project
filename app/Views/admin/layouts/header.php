<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="/project_php/app/Public/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet"
      href="/project_php/app/Public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="/project_php/app/Public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- JQVMap -->
<link rel="stylesheet" href="/project_php/app/Public/plugins/jqvmap/jqvmap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/project_php/app/Public/dist/css/adminlte.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="/project_php/app/Public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="/project_php/app/Public/plugins/daterangepicker/daterangepicker.css">
<!-- summernote -->
<link rel="stylesheet" href="/project_php/app/Public/plugins/summernote/summernote-bs4.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<!-- Include JavaScript library for additional functionality -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!--ion icons -->
<script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous" referrerpolicy="no-referrer"/>
<!-- css for charts -->

<style>
    .chart-responsive {
        width: 100%;
        max-width: 360px; /* Adjust as needed */
        height: auto;
        border-radius: 5px;
    }

     .container h2{
         margin: 20px
     }

    /* Close button styles */
    .popup .popup-content button {
        float: right;
    }
    .swal2-popup {
        width: 32%;
    }
</style>
<?php include "Views/adnimation/animationLoading.php" ?>
<?php include "Public/config/config.php"; ?>
<?php include "Views/admin/layouts/navBar.php" ?>
<?php include "Views/admin/layouts/sideBar.php" ?>

<head>
    <title>Hello <?php echo ucfirst($_SESSION["email"]) ?></title>
</head>
