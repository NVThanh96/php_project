function deleteFolder(folderPath) {
    if (confirm("Are you sure you want to delete this folder?")) {
        fetch("removePlugin", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "folderPath=" + escapedFolderPath
        })
            .then(response => response.text())
            .then(message => {
                alert("Delete Successful"); // Show the response message
                // Reload the page or perform any other action after deleting the folder
                location.reload();
            })
            .catch(error => {
                console.error(error);
            });
    }
}