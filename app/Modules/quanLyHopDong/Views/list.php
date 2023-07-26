<?php
include "Public/config/config.php";
include "Views/admin/layouts/header.php";
?>

<style>
    <?php include "Modules/quanLyHopDong/Public/css/list.css";?>
</style>

<body class="hold-transition sidebar-mini layout-fixed">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo $node1['ten'] ?? '' ?></li>
                    </ol>
                </div><!-- /.col -->

            </div>

            <div class="card">
                <div class="card-header">
                    <h1 class="card-title"><?php echo $node1['ten'] ?? '' ?></h1>
                    
                    <a href="create" type="button"
                       class="btn btn-outline-primary btn-flat"
                       style="margin: 0 20px;">
                        <i class="fa-solid fa-plus"></i></a>
                    <a id="search_hidden"></a>
                </div>

                <div id="search"> <!--style="display: none"-->
                    <?php include "search.php"; ?>
                </div>

                <?php
                $t = time();
                $now = date("Y-m-d", $t);
                ?>
                <div class="card-body">
                    <div id="result"></div>
                    <table id="table-bordered" class="table table-bordered">
                        <thead>
                        <tr class="text-center">
                            <th style="width: 10px">STT</th>
                            <th>Tên hợp đồng</th>
                            <th>Số hợp đồng</th>
                            <th>Ngày ký</th>
                            <th>Phòng thực hiện</th>
                            <th>Khách hàng</th>
                            <th>Kinh phí</th>
                            <th>Thời gian thực hiện</th>
                            <th>Ngày kết thúc</th>
                            <th>Trạng thái</th>
                            <th colspan="3" class="text-center">Tùy chọn</th>
                        </tr>
                        </thead>
                        <tbody id="table-container">
                        <?php if (isset($list_hop_dong) && !empty($list_hop_dong)): ?>
                            <?php foreach ($list_hop_dong as $key => $value): ?>
                                <?php if ($value['daxoa'] == 0): ?>
                                    <tr>
                                        <td class="text-center"><?php echo $key + 1 ?></td>
                                        <td><?php echo $value['ten_hop_dong']; ?></td>
                                        <td><?php echo $value['so_hop_dong']; ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($value['ngay_ky'])); ?></td>
                                        <td>
                                            <?php $list_phong_ban = HopDongDB::getListPhongBan();
                                            foreach ($list_phong_ban as $value1) {
                                                if ($value1['id'] === $value['id_phong_ban']) {
                                                    echo $value1['ten_phong'];
                                                }
                                                echo "";
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $value['khach_hang']; ?></td>
                                        <td>

                                            <p class="text-right">
                                            <?php echo number_format($value['kinh_phi'], 0, ',', '.') ; ?>
                                                VND
                                            </p>
                                        </td>
                                        <td><?php echo $value['thoi_gian_thuc_hien'] ?></td>
                                        <td>
                                            <?php
                                            $ngay_ket_thuc = date('d/m/Y', strtotime($value['ngay_ket_thuc']));
                                            echo ($t >= strtotime($value['ngay_ket_thuc']) && $value['trang_thai'] === 2) ? '<span style="color: red;">' . $ngay_ket_thuc . '</span>' : $ngay_ket_thuc
                                            ?>
                                        </td>


                                        <td>
                                            <?php echo $value['trang_thai'] == '1' ?
                                                "Đã Hoàn Thành" : ($value['trang_thai'] == '2' ?
                                                    "Đang Thực Hiện" : ($value['trang_thai'] == '3' ? "Tạm Dừng" : '')); ?>
                                        </td>

                                        <td class="text-center">
                                            <a href="/quanLyHopDong/edit?id=<?= $value['id'] ?>"><i
                                                        class="fa-solid fa-pen"></i></a>
                                        </td>

                                        <td class="text-center">
                                            <button style="color:red; border: none;background-color: transparent"
                                                    id="delete-btn-<?= $value['id'] ?>">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>

                                        <td class="text-center">
                                            <button onclick="openPopup('<?= $value['id'] ?>')"
                                                    style="color:green; border: none;background-color: transparent;">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <div class="popup" id="popup-<?php echo $value['id'] ?>" style="display:none">
                                        <div class="popup-content">
                                            <div style="display: flex">
                                                <div class="left col-6">
                                                    <h3>Hợp Đồng Thứ: <?php echo $value['id'] ?></h3>
                                                    <h3>Tên Hợp Đồng: <?php echo $value['ten_hop_dong']; ?></h3>
                                                    <h3>Số Hợp Đồng: <?php echo $value['so_hop_dong']; ?></h3>
                                                    <h3>Ngày
                                                        Ký: <?php echo date('d/m/Y', strtotime($value['ngay_ky'])); ?></h3>
                                                    <h3>Phòng Ban: <?php echo $value['id_phong_ban']; ?></h3>
                                                    <h3>Tên Khách Hàng: <?php echo $value['khach_hang']; ?></h3>
                                                    <h3>Kinh
                                                        Phí: <?php echo number_format($value['kinh_phi'], 0, ',', '.') . ' VND'; ?></h3>
                                                    <h3>Thời Gian Thực
                                                        Hiện: <?php echo $value['thoi_gian_thuc_hien'] ?>
                                                    <h3>Ngày Kết
                                                        Thúc: <?php echo date('d/m/Y', strtotime($value['ngay_ket_thuc'])); ?></h3>
                                                    <h3>
                                                        <?php echo $value['trang_thai'] == '1' ?
                                                            "<span style='color: green;'>Đã Hoàn Thành</span>" :
                                                            ($value['trang_thai'] == '2' ?
                                                                "<span style='color: yellow;'>Đang Thực Hiện</span>" :
                                                                ($value['trang_thai'] == '3' ? "<span style='color: Red;'>Tạm Dừng</span>" : '')); ?>
                                                    </h3>

                                                </div>
                                                <div class="right col-6">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <h3> have no record!!</h3>
                        <?php endif; ?>

                        </tbody>
                    </table>
                    <div id="paginate">
                        <?php include('Utils/paginate.php') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    <?php include('Modules/quanLyHopDong/Public/js/delete.js') ?>
    <?php include('Public/js/showInformation.js') ?>
    <?php include "Modules/quanLyHopDong/Public/js/hideAndShowFormSearch.js";?>
</script>

<!--<script>
    $(document).ready(function () {
        $('.Items a').on('click', function (e) {
            e.preventDefault();
            var page = $(this).data('page');
            fetchContent(page);
        });

        function fetchContent(page) {
            var url = 'list?' + $.param($.extend({}, <?php /*echo json_encode($_GET); */?>, {page: page}));

            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'html',
                success: function (data) {
                    // Update the content container with the fetched data
                    $('#table-container').html(data);
                    // Update the pagination links' active status
                    $('.Items a').removeClass('active');
                    $('.Items a[data-page="' + page + '"]').addClass('active');
                },
                error: function () {
                    // Handle error if necessary
                    console.error('Failed to fetch content.');
                }
            });
        }
    });
</script>-->

<script>
    var searchURL = 'http://localhost:8080/quanLyHopDong/search'; // If the PHP file is named 'search.php', change it to 'search.php'

    function handleSearchResult(data) {
        const show_search = $('#result');
        const table = $('#table-bordered');
        const paginate = $('#paginate');

        if (data.trim() !== '') {
            // Show the table and pagination, and hide the 'show_search' div (if needed)
            show_search.html(data).show();
            table.hide();
            paginate.hide();
        } else {
            // If the response data is empty, show the 'show_search' div and hide the table and pagination
            show_search.hide();
            table.show();
            paginate.show();
        }
    }

    function performSearch() {
        const inputValue = $('#enter_search').val();
        const selectedTrangThai = $('#search_trang_thai').val();
        const selectedPhongBan = $('#search_phong_ban').val() ;
        const selectedTuNgayThucHien = $('#tu_ngay_thuc_hien').val();
        const selectedDenNgayThucHien = $('#den_ngay_thuc_hien').val();
        const selectedTuNgayKetThuc = $('#tu_ngay_ket_thuc').val();
        const selectedDenNgayKetThuc = $('#den_ngay_ket_thuc').val();

        // Combine both values into a single object
            var searchData = {
                search: inputValue,
                searchTT: selectedTrangThai,
                searchPB: selectedPhongBan,
                searchTNTH: selectedTuNgayThucHien,
                searchDNTH: selectedDenNgayThucHien,
                searchTNKT: selectedTuNgayKetThuc,
                searchDNKT: selectedDenNgayKetThuc
            };


        // Make an AJAX request to the server with the combined search data
        $.ajax({
            type: 'POST',
            url: searchURL, // Replace this with the actual URL of your PHP script
            data: searchData,
            success: function (data) {
                handleSearchResult(data);
            },
        });
    }

    // Call the performSearch function when either input changes
    $('#enter_search, #search_trang_thai,#search_phong_ban,#tu_ngay_thuc_hien,#den_ngay_thuc_hien,#tu_ngay_ket_thuc,#den_ngay_ket_thuc').on('change', function () {
        performSearch();
    });
</script>


</body>
<?php include "Views/admin/layouts/footer.php"; ?>
