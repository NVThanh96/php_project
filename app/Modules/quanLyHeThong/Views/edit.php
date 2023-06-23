<?php
include "Public/config/config.php"
?>
<html>
<head>
    <?php include 'Views/admin/layouts/header.php' ?>
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
                <form action="update" method="post">
                    <?php foreach ($values as $value): ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên</label>
                                <input name="name" value="<?php echo $value['name'] ?>" type="text" class="form-control"
                                       id="exampleInputEmail1" placeholder="Nhập Id Hợp Đồng">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tên Tài khoản</label>
                                <input name="username" value="<?php echo $value['username'] ?>" type="text"
                                       class="form-control" id="exampleInputPassword1"
                                       placeholder="Nhập Tên Hợp Đồng">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mật Khẩu</label>
                                <a id="toggle-password" href="#">
                                    <ion-icon hidden name="eye-outline"></ion-icon>
                                    <ion-icon name="eye-off-outline"></ion-icon>
                                </a>
                                <input id="password-input" name="password" type="password" class="form-control"
                                       id="exampleInputEmail1">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <input name="email" value="<?php echo $value['email']; ?>" type="email"
                                       class="form-control" id="exampleInputPassword1">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Số Điện Thoại</label>
                                <input name="phone" value="<?php echo $value['phone'] ?>" type="text"
                                       class="form-control" id="exampleInputPassword1"
                                       placeholder="Nhập Bên A">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giới tính</label>

                                <input type="radio" name="gender" value="nam"
                                       id="nam-option" <?php if ($value['gender'] == 'nam') echo 'checked'; ?>>
                                <label for="nam-option">Nam</label>

                                <input type="radio" name="gender" value="nu"
                                       id="nu-option" <?php if ($value['gender'] != 'nam') echo 'checked'; ?>>
                                <label for="nu-option">Nữ</label>
                            </div>

                            <div class="form-group">
                                <label>Select</label>
                                <select <?php echo ($value['level'] == 'admin') ? 'disabled' : '' ?> name="level"
                                                                                                     class="form-control">
                                    <?php
                                    foreach ($roles as $role): ?>
                                        <option value="<?php echo $role['role_id'] ?>" <?php echo ($value['level'] === $role['role_id']) ? 'selected="selected"' : ''; ?>><?php echo ucfirst($role['role_name']) ?></option>
                                    <?php endforeach; ?>
                                </select>

                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success" style="float: right">Submit</button>
                    </div>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
</body>
<?php include "./Views/admin/layouts/footer.php" ?>
<script><?php include('Public/js/showAndHide.js') ?></script>

</html>
