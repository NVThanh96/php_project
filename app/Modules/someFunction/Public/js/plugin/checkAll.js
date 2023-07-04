window.addEventListener('DOMContentLoaded', (event) => {
    const allCheckbox = document.querySelector('.all');
    const checkboxes = document.querySelectorAll('tbody input[type="checkbox"]');

    allCheckbox.addEventListener('change', () => {
        checkboxes.forEach((checkbox) => {
            checkbox.checked = allCheckbox.checked;
        });
    });
});