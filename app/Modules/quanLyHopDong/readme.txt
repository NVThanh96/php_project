// nếu copy ra 1 file mới nhớ đổi tên file *Routes.php vd quanLyLinhVucRoutes.php sang file quanLyNhanVienRoutes.php
// controller cũng vậy
bao gồm thêm, xóa, sửa, và hiển thị

----------------------------------Folder bao gồm các file------------------------------------

Folder Views gồm có các views add edit và list

Folder Public bao gồm các file
    - folder js
        + file delete.js
        (*) const deleteButtons = document.querySelectorAll('[id^="delete-btn-"]');
           dùng để gọi id từ trong button ra để xử lý
        (*)const hopDongId = btn.getAttribute('id').replace('delete-btn-', '');
            gọi hopDongId ra để lấy được id ra để xử lý
        (*) window.location.href = `?controller=hopDong&action=deleteSoft&id=${hopDongId}`;
            action=deleteSoft gọi từ trong controller ra để xử lý
            id=${hopDongId} so sánh với id để bik giá trị cần xử lý
        (*)Và window.location.href = '/project_php/app/admin/quanLyLinhVuc/list';
            sau khi xóa thành công sẽ trả về trang /project_php/app/admin/quanLyHopDong/list

Folder Models bao gồm các function
   - User.php gồm các function
        + get_hop_dong_page()               // để lấy tất cả giá trị trong bảng hop_dong ra có gắn thêm paginate
        + createHopDong()                   // dùng để tạo mới hợp đồng
        + editHopDong($id)                  // dùng để chỉnh sửa hợp đồng
        + softDeleteHopDong($id)            // dùng để xóa mềm hợp đồng
        + getValuesByID($id)                // dùng để lấy giá trị theo id
        + getListLinhVuc()                  // dùng để lấy tất cả giá trị của lĩnh vực ra
        + getRecordById($id)                // dùng để lấy giá trị của lĩnh vực theo id

Folder Controller bao gồm các function ()
    - bao gồm các function  show            // hiện thị trang dashboard
                            list            // hiện thị danh sách của 1 table
                            add             // vào trang thêm mới hợp đồng
                            createHopDong   // chức năng của nút thêm mới
                            edit            // vào trang chỉnh sửa hợp đồng
                            updateHopDong   // chức năng của nút cập nhật
           dùng js để xử lý deleteSoft      // xóa mềm 1 record của table

    - 1 số chức năng được gọi thêm vào từ Util
        + $totalHopDong = (new Util)->countHopDong();   // lấy tổng số hợp đồng
        + $totalUser = (new Util)->countUser();         // lấy tổng số người dùng
        + $totalNhanVien = (new Util)->countNhanVien(); // lấy tổng số nhân viên
        + $path = Utils\Util::exportPath();             // lấy đường dẫn

    - 1 số chức năng được gọi thêm vào từ HopDongDB
        + HopDongDB::get_hop_dong_page($page_number, $items_per_page, $daxoa); // lấy tất cả giá trị của hơp đồng và có paginate
        + HopDongDB::createHopDong();                                                // tạo mới hợp đồng
        + HopDongDB::getValuesByID($id);                                             // lấy giá trị theo $id
        + HopDongDB::editHopDong($id);                                               // chỉnh sửa theo $id
        + HopDongDB::softDeleteHopDong($id);                                         // xóa mềm theo $id
        + HopDongDB::getListLinhVuc();                                               // lấy tất cả giá trị của lĩnh vực ra

Và file quanLyHopDongRoutes.php để điều hướng tới các trang và các xử lý