<?php include "Views/adnimation/animationLoading.php" ?>

<?php include "Views/admin/layouts/header.php" ?>

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
                    <a style="float: left; font-size: 20px; padding-top: 8px; padding-right: 8px " href="list"><i class="fa-solid fa-arrow-right fa-rotate-180"></i></a>
                    <h1 class="card-title"><?php echo $node['ten'] ?? "" ?></h1>
                </div>
                <form action="add" method="post">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Nhân Viên</label>
                            <input name="ten_nhan_vien" type="text" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tuổi</label>
                            <input name="tuoi" type="text" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giới tính</label>

                            <input type="radio" name="gioi_tinh" id="nam-option">
                            <label for="nam-option">Nam</label>

                            <input type="radio" name="gioi_tinh" id="nu-option">
                            <label for="nu-option">Nữ</label>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Địa Chỉ</label>
                            <input name="dia_chi" type="text" class="form-control" id="exampleInputPassword1">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Ngày Vào Làm</label>
                            <input name="ngay_vao_lam" type="date" class="form-control" id="exampleInputPassword1"
                            >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Lương</label>
                            <input name="luong" type="text" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success" style="float: right">Submit</button>
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
