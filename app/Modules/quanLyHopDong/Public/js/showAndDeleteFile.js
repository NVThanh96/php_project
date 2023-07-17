
// Clear the existing file list
$("#files-names").empty();

// Iterate over each file record and add it to the file list
const fileIDHD = <?php echo $fileIDHDJson; ?>;


for (let i = 0; i < fileIDHD.length; i++) {
    let fileBloc = $('<span/>', { class: 'file-block' });
    let fileName = $('<span/>').append(
        $('<a/>', {
            href: fileIDHD[i].duong_dan,
            text: fileIDHD[i].ten,
            click: function(e) {
                e.preventDefault();
                window.open($(this).attr('href'));
            },
        })
    );

    let fileId = fileIDHD[i].id; // Store the file ID in a variable

    fileBloc.append($('<span/>', {
        'data-id': fileId, // Set the file ID as the data-id attribute
        class: 'file-delete',
        html: '<span>+</span>'
    })).append(fileName);

    $("#files-names").append(fileBloc);
}

const xoaArray =[];
// Event listener for the delete button
$(document).on('click', 'span.file-delete', function() {
    // Remove the file display
    $(this).parent().remove();

    // Retrieve the file ID from the data-id attribute
    let fileId = $(this).data('id');
    // If the value is empty, create an empty array

    // Add the fileId to the array of values
    xoaArray.push(fileId);

    // Set the new value of #sexoafile as the array of values
    $('#sexoafile').val(xoaArray);
});

$(document).ready(function() {
    // Function to update the database with the files to be deleted
    function updateDeletedFiles(files) {
        $.ajax({
            url: 'deleteFile.php', // Replace with the actual path to your PHP script
            method: 'POST',
            data: { files: files },
            success: function(response) {
                console.log(response); // Optional: handle the response from the server
            },
            error: function(xhr, status, error) {
                console.log(error); // Optional: handle any errors
            }
        });
    }

    // Event listener for the form submission
    $('form').submit(function(event) {
        event.preventDefault();

        // Retrieve the file IDs to be deleted from the input value
        var filesToDelete = $('#sexoafile').val();

        // Split the input value into an array of file IDs
        var fileIDs = filesToDelete.split(',');

        // Call the function to update the database with the file IDs
        updateDeletedFiles(fileIDs);

        // Submit the form
        this.submit();
    });
});