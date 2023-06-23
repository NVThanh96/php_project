// nếu copy ra 1 file mới nhớ đổi tên file *Routes.php vd quanLyLinhVucRoutes.php sang file quanLyNhanVienRoutes.php
// controller cũng vậy
bao gồm thêm, xóa, sửa, và hiển thị

----------------------------------Folder bao gồm các file------------------------------------

Folder Views gồm có
 + role (Phân quyền cho người dùng)
    gồm có add edit listRole và paginate
 + và các views add edit và list

Folder Public bao gồm các file
    - folder js
        + file delete.js và deleteRole.js
        (*) const deleteButtons = document.querySelectorAll('[id^="delete-btn-"]');
           dùng để gọi id từ trong button ra để xử lý
        (*)const userId = btn.getAttribute('id').replace('delete-btn-', '');
            gọi userId ra để lấy được id ra để xử lý
        (*) window.location.href = `?controller=HeThong&action=deleteSoft&id=${userId}`;
        action=deleteSoft gọi từ trong controller ra để xử lý
        id=${userId} so sánh với id để bik giá trị cần xử lý

Folder Models bao gồm các function
   - Role.php gồm các function
        + get_role_page()                   // để lấy tất cả giá trị trong bảng roles ra có gắn thêm paginate
        + createRole()                      // dùng để tạo mới Role
        + editRole($role_id)                // dùng để chỉnh sửa Role
        + softDeleteRole($role_id)          // dùng để xóa mềm Role
        + getRole()                         // lấy tất cả giá trị của bảng roles và ko có paginate
        + getValuesByID($role_id)           // dùng để lấy giá trị theo id
        + getRoleName($id)                  // dùng để lấy tên của Role theo id
        + getAllLinhVuc()                   // dùng để lấy tất cả giá trị của bảng lĩnh vực
        + getNameLinhVuc($id)               // lấy tất cả tên của bảng lĩnh vực theo $id

   - User.php gồm các function
        + get_user_page()                   // để lấy tất cả giá trị trong bảng users ra có gắn thêm paginate
        + createRole()                      // dùng để tạo mới User
        + editUser($id)                     // dùng để chỉnh sửa User
        + softDeleteUser($id)               // dùng để xóa mềm User
        + getValuesByID($id)                // dùng để lấy giá trị theo id

Folder Controller bao gồm các function ()
    - bao gồm các function  index           // hiện thị trang dashboard
                            list            // hiện thị danh sách của 1 table
                            add             // vào trang thêm mới người dùng
                            createUser      // chức năng của nút thêm mới
                            edit            // vào trang chỉnh sửa người dùng
                            updateUser      // chức năng của nút cập nhật
           dùng js để xử lý deleteSoft      // xóa mềm 1 record của table
                            listRole        // danh sách của quyền
                            addRole         // vào trang thêm mới phân quyền
                            CreateRole      // chức năng tạo mới của nút thêm
                            editRole        // vào trang chỉnh sửa phân quền
                            updateRole      // chức năng của nút cập nhật
           dùng js để xử lý deleteSoftRole  // xóa mềm 1 record của table

    - 1 số chức năng được gọi thêm vào từ Util
        + $totalHopDong = (new Util)->countHopDong();   // lấy tổng số hợp đồng
        + $totalUser = (new Util)->countUser();         // lấy tổng số người dùng
        + $totalNhanVien = (new Util)->countNhanVien(); // lấy tổng số nhân viên
        + $path = Utils\Util::exportPath();             // lấy đường dẫn

    - 1 số chức năng được gọi thêm vào từ User
        + User::get_user_page($page_number, $items_per_page, $flag_delete); // lấy tất cả giá trị của người dùng và có paginate
        + User::createUser();                                               // tạo mới người dùng
        + User::getValuesByID($id);                                         // lấy giá trị theo $id
        + User::editUser($id);                                              // chỉnh sửa theo $id
        + User::softDeleteUser($id);                                        // xóa mềm theo $id

    - 1 số chức năng được gọi thêm vào từ Role
        + Role::get_user_page($page_number, $items_per_page, $flag_delete); // lấy tất cả giá trị của phân quyềnvà có paginate
        + Role::createUser();                                               // tạo mới phân quyền
        + Role::getValuesByID($id);                                         // lấy giá trị theo $id
        + Role::editUser($id);                                              // chỉnh sửa theo $id
        + Role::softDeleteUser($id);                                        // xóa mềm theo $id
        + Role::getAllLinhVuc();                                            // lấy tất cả giá trị của lĩnh vực ra

Và file quanLyHeThongRoutes.php để điều hướng tới các trang và các xử lý