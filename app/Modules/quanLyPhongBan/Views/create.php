<?php
include "Public/config/config.php"
?>


<html>
<head>
    <?php include "Views/admin/layouts/header.php" ?>
</head>

<body>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!--<h1 class="m-0"><?php /*echo $titleAdd */ ?></h1>-->
                </div><!-- /.col -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo $node['ten'] ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="card card-green">
                <div class="card-header">
                    <a style="margin-left:-15px;font-size: 24px" class="btn hover btn-flat float-left" href="list"><i class="fa-solid fa-arrow-left"></i></a>
                    <h1 class="card-title"><?php echo $node['ten'] ?? "" ?></h1>
                </div>
                <form action="add" method="post">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Phòng Ban</label>
                            <input name="ten_phong" type="text" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mã Phòng Ban</label>
                            <input name="ma_phong" type="text" class="form-control" id="exampleInputPassword1">
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success" style="float: right">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
</body>
<?php include "./Views/admin/layouts/footer.php" ?>
</html>
