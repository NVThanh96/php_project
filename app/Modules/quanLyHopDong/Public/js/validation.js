function checkEmptySoHD(inputElement, errorMessageElementId) {
    var value = inputElement.value.trim();
    var errorElement = document.getElementById(errorMessageElementId);

    if (value === '') {
        errorElement.innerText = "Vui lòng nhập số hợp đồng";
    } else {
        errorElement.innerText = "";
    }
}
function checkEmptyTenHD(inputElement, errorMessageElementId) {
    var value = inputElement.value.trim();
    var errorElement = document.getElementById(errorMessageElementId);

    if (value === '') {
        errorElement.innerText = "Vui lòng nhập tên hợp đồng";
    } else {
        errorElement.innerText = "";
    }
}
function checkEmptyKinhPhi(inputElement, errorMessageElementId) {
    var value = inputElement.value.trim();
    var errorElement = document.getElementById(errorMessageElementId);

    if (value === '') {
        errorElement.innerText = "Vui lòng nhập kinh phí";
    } else {
        errorElement.innerText = "";
    }
}
function checkEmptyPhongBan(inputElement, errorMessageElementId) {
    var value = inputElement.value.trim();
    var errorElement = document.getElementById(errorMessageElementId);

    if (value === '0') { // Check if the selected value is '0', which represents the default option '-- Chọn --'
        errorElement.innerText = "Vui lòng chọn phòng thực hiện";
    } else {
        errorElement.innerText = "";
    }
}function checkEmptyKhachHang(inputElement, errorMessageElementId) {
    var value = inputElement.value.trim();
    var errorElement = document.getElementById(errorMessageElementId);

    if (value === '') {
        errorElement.innerText = "Vui lòng nhập khách hàng";
    } else {
        errorElement.innerText = "";
    }
}function checkEmptyNgayKy(inputElement, errorMessageElementId) {
    var value = inputElement.value.trim();
    var errorElement = document.getElementById(errorMessageElementId);

    if (value === '') {
        errorElement.innerText = "Vui lòng chọn ngày ký";
    } else {
        errorElement.innerText = "";
    }
}function checkEmptyNgayKetThuc(inputElement, errorMessageElementId) {
    var value = inputElement.value.trim();
    var errorElement = document.getElementById(errorMessageElementId);

    if (value === '') {
        errorElement.innerText = "Vui lòng chọn ngày kết thúc";
    } else {
        errorElement.innerText = "";
    }
}function checkEmptyTrangThai(inputElement, errorMessageElementId) {
    var value = inputElement.value.trim();
    var errorElement = document.getElementById(errorMessageElementId);

    if (value === 'null') { // Corrected condition to check for 'null' value
        errorElement.innerText = "Vui lòng chọn trạng thái";
    } else {
        errorElement.innerText = "";
    }
}function checkThoiGianThucHien(inputElement, errorMessageElementId) {
    var value = inputElement.value.trim();
    var errorElement = document.getElementById(errorMessageElementId);

    if (isNaN(value) || parseInt(value) < 0) {
        errorElement.textContent = "Thời gian thực hiện phải là một số không âm.";
    } else {
        errorElement.textContent = ""; // Clear the error message if the input is valid

        // Additional check for decimal numbers if needed
        if (parseFloat(value) !== parseInt(value)) {
            errorElement.textContent = "Thời gian thực hiện phải là một số nguyên không âm.";
        }
    }
}


function validateForm() {
    var tenHopDong = document.getElementById("so_hop_dong").value;
    var soHopDong = document.getElementById("ten_hop_dong").value;
    var kinhPhi = document.getElementById("kinh_phi").value;
    var khachHang = document.getElementById("khach_hang").value;
    var idPhongBan = document.getElementById("id_phong_ban").selectedIndex;
    var thoiGianThucHien = document.getElementById("thoi_gian_thuc_hien").value;
    var ngayKetThuc = document.getElementById("ngay_ket_thuc").value;
    var ngayKy = document.getElementById("ngay_ky").value;
    var trangThai = document.getElementsByName("trang_thai")[0].value;


    /*var ngayKy = new Date(document.getElementById('ngay_ky').value);
    var ngayKetThuc = new Date(document.getElementById('ngay_ket_thuc').value);*/

    var isValid = true;
    // Check ngay_ket_thuc and thoi_gian_thuc_hien
    if (ngayKetThuc < ngayKy) {
        document.getElementById('error-ngay-ket-thuc').innerText = "Ngày kết thúc phải lớn hơn hoặc bằng ngày ký.";
        isValid = false;
    } else {
        document.getElementById('error-ngay-ket-thuc').innerText = "";
    }

    if (thoiGianThucHien <= 0) {
        document.getElementById('error-thoi-gian-thuc-hien').innerText = "Thời gian thực hiện phải lớn hơn 0.";
        isValid = false;
    } else {
        document.getElementById('error-thoi-gian-thuc-hien').innerText = "";
    }

    if (soHopDong.trim() === '') {
        document.getElementById("error-so-hop-dong").innerText = "Vui lòng nhập số hợp đồng";
        isValid = false;
    } else {
        document.getElementById("error-so-hop-dong").innerText = "";
    }

    if (tenHopDong.trim() === '') {
        document.getElementById("error-ten-hop-dong").innerText = "Vui lòng nhập tên hợp đồng";
        isValid = false;
    } else {
        document.getElementById("error-ten-hop-dong").innerText = "";
    }

    if (idPhongBan === 0) {
        document.getElementById("error-id-phong-ban").innerText = "Vui lòng chọn phòng thực hiện";
        isValid = false;
    } else {
        document.getElementById("error-id-phong-ban").innerText = "";
    }

    if (kinhPhi === '') {
        document.getElementById("error-kinh-phi").innerText = "Vui lòng nhập kinh phí";
        isValid = false;
    } else {
        document.getElementById("error-kinh-phi").innerText = "";
    }

    if (khachHang.trim() === '') {
        document.getElementById("error-khach-hang").innerText = "Vui lòng nhập tên khách hàng";
        isValid = false;
    } else {
        document.getElementById("error-khach-hang").innerText = "";
    }

    if (thoiGianThucHien.trim() === '') {
        document.getElementById("error-thoi-gian-thuc-hien").innerText = "Vui lòng chọn thời gian thực hiện";
        isValid = false;
    }else {
        document.getElementById("error-thoi-gian-thuc-hien").innerText = "";
    }

    if (ngayKetThuc.trim() === '') {
        document.getElementById("error-ngay-ket-thuc").innerText = "Vui lòng chọn thời gian kết thúc";
        isValid = false;
    }
    else {
        document.getElementById("error-ngay-ket-thuc").innerText = "";
    }

    if (trangThai === "null") {
        document.getElementById("error-trang-thai").innerText = "Vui lòng chọn trạng thái";
        isValid = false;
    } else {
        document.getElementById("error-trang-thai").innerText = "";
    }

    if (ngayKy.trim() === '') {
        document.getElementById("error-ngay-ky").innerText = "Vui lòng chọn ngày ký";
        isValid = false;
    } else {
        document.getElementById("error-ngay-ky").innerText = "";
    }

    // ... (other field validations)

    return isValid;
}


// Function to show SweetAlert success message
function showSuccessAlert() {
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'Form successfully saved!',
        showConfirmButton: false,
        timer: 1500
    });
}
function onSubmitForm() {
    var isValid = validateForm();

    if (!isValid) {
        return false; // Prevent form submission if validation fails
    }

    showSuccessAlert();
    header('location:list');

}

function checkNgayKetThuc() {
    var ngayKy = new Date(document.getElementById('ngay_ky').value);
    var ngayKetThuc = new Date(document.getElementById('ngay_ket_thuc').value);

    // Check if ngay_ket_thuc is greater than or equal to ngay_ky
    if (ngayKetThuc < ngayKy) {
        var errorElement = document.getElementById('error-ngay-ket-thuc');
        errorElement.innerText = "Ngày kết thúc phải lớn hơn ngày ký.";
    } else {
        var errorElement = document.getElementById('error-ngay-ket-thuc');
        errorElement.innerText = "";
    }
}


