const btnHidden = document.getElementById('search_hidden');
const search = document.getElementById('search');
btnHidden.innerHTML = '<i class="fa fa-search"></i>';
btnHidden.addEventListener('click', function (event) {
    event.preventDefault();
    search.style.display = search.style.display === 'block' ? 'none' : 'block';

    // Check if search is hidden and update the icon accordingly
    if (search.style.display === 'none') {
        btnHidden.innerHTML = '<i class="fa fa-search"></i>';
    } else {
        btnHidden.innerHTML = '<i  class="fa fa-x "></i>';
    }
});
