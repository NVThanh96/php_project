document.getElementById("searchForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent form submission
    const searchInput = document.getElementById("searchInput").value.trim();
    console.log(searchInput);
    const pluginNames = document.querySelectorAll(".plugin-name");

    // Loop through all plugin names and hide/show based on search input
    for (let i = 0; i < pluginNames.length; i++) {
        const pluginName = pluginNames[i].textContent;
        console.log(pluginName)
        if (pluginName.toLowerCase().includes(searchInput.toLowerCase())) {
            pluginNames[i].parentNode.style.display = "";
        } else {
            pluginNames[i].parentNode.style.display = "none";
        }
    }
});