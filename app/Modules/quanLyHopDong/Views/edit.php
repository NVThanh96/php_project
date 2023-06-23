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
                    <!--<h1 class="m-0"><?php /*echo $titleAdd */?></h1>-->
                </div><!-- /.col -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo $node['ten'] ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="card card-primary">
                <div class="card-header">
                    <a style="margin-left:-15px;font-size: 24px" class="btn hover btn-flat float-left" href="list"><i class="fa-solid fa-arrow-left"></i></a>

                    <h1 class="card-title"><?php echo $node['ten'] ?? ""?></h1>
                </div>
                <form action="update" method="post">
                    <?php foreach ($values as $value): ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Hợp Đồng</label>
                            <input name="ten_hop_dong" value="<?php echo $value['ten_hop_dong']?>" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập Id Hợp Đồng">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Khách Hàng</label>
                            <input name="khach_hang" value="<?php echo $value['khach_hang']?>" type="text" class="form-control" id="exampleInputPassword1"
                                   placeholder="Nhập Tên Hợp Đồng">
                        </div>
                        <div class="form-group">
                            <label>Lĩnh Vực</label>
                            <select name="linh_vuc_id" class="form-control">
                                <option value="0">-- Chọn --</option>
                                <?php if (isset($list_linh_vuc) && !empty($list_linh_vuc)): ?>
                                    <?php foreach ($list_linh_vuc as $linh_vuc): ?>
                                        <option value="<?php echo $linh_vuc['id']; ?>" <?php if ($linh_vuc['id'] == $selected_linh_vuc_id) echo 'selected'; ?>>
                                            <?php echo $linh_vuc['ten_linh_vuc']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Số Hợp Đồng</label>
                            <input name="so_hop_dong" value="<?php echo $value['so_hop_dong']; ?>" type="text" class="form-control" id="exampleInputPassword1">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Ngày Ký</label>
                            <input name="ngay_ky" value="<?php echo $value['ngay_ky']?>" type="date" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá Trị</label>
                            <input name="gia_tri" value="<?php echo $value['gia_tri']?>" type="text" class="form-control" id="exampleInputEmail1" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thời gian thực hiện</label>
                            <input name="Thoi_gian_thuc_hien" value="<?php echo $value['Thoi_gian_thuc_hien']?>" type="text" class="form-control" id="exampleInputEmail1" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">File hợp đồng</label>
                            <input name="file_hop_dong" value="<?php echo $value['file_hop_dong']?>" type="file" class="form-control" id="exampleInputEmail1" >
                        </div>
                        <div class="form-group">
                            <label>Select</label>
                            <select name="tinh_trang_hop_dong" class="form-control">
                                <option value="0">-- Chọn --</option>
                                <option value="Hoan thanh" <?php if ($value['tinh_trang_hop_dong'] == 'Hoan thanh') echo 'selected'; ?>>Hoàn Thành</option>
                                <option value="Dang thuc hien" <?php if ($value['tinh_trang_hop_dong'] == 'Dang thuc hien') echo 'selected'; ?>>Đang Thực Hiện</option>
                                <option value="Chua thuc hien" <?php if ($value['tinh_trang_hop_dong'] == 'Chua thuc hien') echo 'selected'; ?>>Chưa Thực Hiện</option>
                            </select>
                        </div>
                    </div>
                    <?php endforeach;?>
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

</html>
