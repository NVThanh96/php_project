const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
})

const deleteButtons = document.querySelectorAll('[id^="delete-btn-"]');
deleteButtons.forEach(btn => {
    btn.addEventListener('click', function () {
        const role_id = btn.getAttribute('role_id').replace('delete-btn-', '');
        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `?controller=QuanLyHeThong&action=deleteSoftRole&role_id=${role_id}`;
                alert(role_id)
                window.location.href = '/project_php/app/admin/quanLyHeThong/listRole';
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'The student was not deleted',
                    'error'
                )
            }
        })
    });
});