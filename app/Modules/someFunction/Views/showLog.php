<?php
include "Public/config/config.php";

$baseFolder = 'C:\wamp64\www\JobDnict\php_project\app\Public\logError\error.log';

// Check if the delete button is clicked
if (isset($_POST['delete'])) {
    // Open the file in write mode to clear its contents
    file_put_contents($baseFolder, '');
    // Redirect to the same page to refresh the content
    header('Location: /someFunction/showLog');

    exit();
}

// Read the content of the file
$content = file_get_contents($baseFolder);

// Apply filter if the filter button is clicked
if (isset($_POST['filter'])) {
    $filterPattern = $_POST['filter_pattern'];
    $content = filterContent($content, $filterPattern);
}

// Function to filter the content based on a pattern
function filterContent($content, $pattern)
{
    $filteredContent = '';

    // Split the content by the 'Exception:' separator
    $logChunks = explode('Exception:', $content);

    // Iterate through each log chunk
    foreach ($logChunks as $logChunk) {
        // Check if the chunk contains the specified pattern
        if (stripos($logChunk, $pattern) !== false) {
            // Append the chunk to the filtered content
            $filteredContent .= 'Exception:' . $logChunk;
        }
    }

    return $filteredContent;
}

?>

<html>
<head>
    <?php include "Views/admin/layouts/header.php"; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="content-wrapper">
    <div class="content-header">
        <div style="display: flex;">
            <div style="flex-grow: 11">
                <form method="post">
                    <button type="submit" name="delete"
                            onclick="return confirm('Are you sure you want to delete all values ?');"
                            class="btn btn-danger">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
            </div>
            <div style="flex-grow: 1">
                <form method="post">
                    <select name="filter_pattern" style="margin: 0 10px;padding: 3px; width: 70%">
                        <option value="">Select filter pattern</option>
                        <option value="Thành Công">Thành Công</option>
                        <option value="Lỗi đường dẫn">Lỗi đường dẫn</option>
                        <option value="False">False</option>
                    </select>
                    <button type="submit" style="margin-top: -5px" name="filter" class="btn btn-primary"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>


        <textarea style="height: 93%;width: 100%">
            <?php
            // Check if the filter pattern is set and display the filtered content
            if (isset($_POST['filter'])) {
                $filterPattern = $_POST['filter_pattern'];
                // Filter the content based on the pattern
                $content = filterContent($content, $filterPattern);
            } else {
                // If no filter pattern is set, display the entire content
                $filterPattern = "";
            }

            // ...

            // Iterate through each log chunk and check for specific strings
            $logChunks = explode('Exception:', $content);
            foreach ($logChunks as $logChunk) {
                // Check if the filter pattern is empty or the log chunk contains the specified pattern
                if (empty($filterPattern) || stripos($logChunk, $filterPattern) !== false) {
                    echo $logChunk;
                }
            }
            ?>
        </textarea>
    </div>
</div>

<script>
    <?php include('Public/js/showInformation.js') ?>
</script>

</body>
</html>
<div>
    <div>
        <?php include "Views/admin/layouts/footer.php"; ?>
    </div>
</div>
