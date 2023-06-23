function executeExample() {
    setTimeout(function () {
        Swal.fire({
            position: 'top-end',
            icon: 'warning',
            title: 'Đường truyền chậm',
            showConfirmButton: false,
            timer: 3000
        });
    }, 5000); // Delay the execution by 5000 milliseconds (5 seconds)

}
