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
        (*)const nhanVienID = btn.getAttribute('id').replace('delete-btn-', '');
            gọi hopDongId ra để lấy được id ra để xử lý
        (*) window.location.href = `?controller=nhanVien&action=deleteSoft&id=${nhanVienID}`;
        action=deleteSoft gọi từ trong controller ra để xử lý
        id=${nhanVienID} so sánh với id để bik giá trị cần xử lý
        (*)Và window.location.href = '/project_php/app/admin/quanLyLinhVuc/list';
        sau khi xóa thành công sẽ trả về trang /project_php/app/admin/quanLyLinhVuc/list


Folder Models bao gồm các function
   - User.php gồm các function
        + getLinhVucPage()                  // để lấy tất cả giá trị trong bảng hop_dong ra có gắn thêm paginate
        + createLinhVuc()                   // dùng để tạo mới hợp đồng
        + editLinhVuc($id)                  // dùng để chỉnh sửa hợp đồng
        + softDelete($id)                   // dùng để xóa mềm hợp đồng
        + getValuesByID($id)                // dùng để lấy giá trị theo id

Folder Controller bao gồm các function ()
    - bao gồm các function  list            // hiện thị danh sách của 1 table
                            add             // vào trang thêm mới Lĩnh vực
                            create          // chức năng của nút thêm mới
                            edit            // vào trang chỉnh sửa Lĩnh vực
                            update          // chức năng của nút cập nhật
           dùng js để xử lý deleteSoft      // xóa mềm 1 record của table

    - 1 số chức năng được gọi thêm vào từ Util
        + $path = Utils\Util::exportPath(); // lấy đường dẫn

    - 1 số chức năng được gọi thêm vào từ HopDongDB
        + LinhVucDB::getLinhVucPage($page_number, $items_per_page, $flag_delete); // lấy tất cả giá trị của Lĩnh vực và có paginate
        + LinhVucDB::createLinhVuc();                                             // tạo mới Lĩnh vực
        + LinhVucDB::getValuesByID($id);                                          // lấy giá trị theo $id
        + LinhVucDB::editLinhVuc($id);                                            // chỉnh sửa theo $id
        + LinhVucDB::softDelete($id);                                             // xóa mềm theo $id

Và file quanLyLinhVucRoutes.php để điều hướng tới các trang và các xử lý