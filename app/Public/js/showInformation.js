function openPopup(id) {
    const popupElement = document.getElementById("popup-" + id);
        Swal.fire({
            icon: 'info',
            html: popupElement.innerHTML,
        });
}

function closePopup(id) {
    const popupElement = document.getElementById("popup-" + id);
}
