document.getElementById("uploadForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent form submission
    const filesInput = document.getElementById("files");
    const fileName = filesInput.files[0]?.name;

    const fileNameWithoutExtension = fileName.replace(".zip", "");
    console.log(fileNameWithoutExtension); // Output: quanLyThongTin
    if (!fileName) {
        Swal.fire({
            title: "Error!",
            text: "Please choose a zip file",
            icon: "error",
            confirmButtonText: "OK"
        });
        return;
    }


    // Add an additional check for existing filenames
    const existingFilenames = ["quanLyThongTin", "filename2.zip", "filename3.zip"]; // Replace with your existing filenames
    if (existingFilenames.includes(fileNameWithoutExtension)) {
        Swal.fire({
            title: "Error!",
            text: "The file already exists. Please choose another file.",
            icon: "error",
            confirmButtonText: "OK"
        });
        return;
    }

    const formData = new FormData(this);

    fetch(this.action, {
        method: this.method,
        body: formData
    })
        .then(response => response.text())
        .then(message => {
            const messageContainer = document.getElementById("message");
            messageContainer.innerHTML = '<i class="message-icon fas fa-check-circle"></i>Upload Successful';
            messageContainer.style.color = "green";
            Swal.fire({
                title: "Success!",
                text: "Upload Successful",
                icon: "success",
                confirmButtonText: "OK"
            });
            setTimeout(() => {
                messageContainer.style.display = "none";
                document.getElementById("a").style.display = "block";
            }, 4000);
        })
        .catch(error => {
            console.error(error);
        });
});
