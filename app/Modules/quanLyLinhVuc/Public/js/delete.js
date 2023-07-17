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
        const linhVucID = btn.getAttribute('id').replace('delete-btn-', '');
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
                window.location.href = `?controller=quanLyLinhVuc&action=deleteSoft&id=${linhVucID}`;
                window.location.href = '/project_php/app/admin/quanLyLinhVuc/list';
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