<?php
include "Public/config/config.php"
?>
<html>
<head>
    <?php include "Views/admin/layouts/header.php" ?>
</head>
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

            <div class="card card-orange">
                <div class="card-header">
                    <a style="margin-left:-15px;font-size: 24px" class="btn hover btn-flat float-left" href="list"><i
                                class="fa-solid fa-arrow-left"></i></a>

                    <h1 class="card-title"><?php echo $node['ten'] ?? "" ?></h1>
                </div>
                <form action="create" method="post" id="userForm">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên</label>
                            <input name="name" type="text" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tên Tài khoản</label>
                            <input name="username" type="text" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mật Khẩu</label>
                            <input name="password" type="password" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input name="email" type="email" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Số Điện Thoại</label>
                            <input name="phone" type="text" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giới tính</label>
                            <input type="radio" name="gender" value="nam" id="nam-option">
                            <label for="nam-option">Nam</label>

                            <input type="radio" name="gender" value="nu" id="nu-option">
                            <label for="nu-option">Nữ</label>
                        </div>
                        <div class="form-group">
                            <label>Level</label>
                            <select name="level" class="form-control">
                                <option value="0">-- Chọn --</option>
                                <?php foreach ($roles as $role): ?>
                                    <option value="<?php echo $role['role_id'] ?>"><?php echo $role['role_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
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

</html>





