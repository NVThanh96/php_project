<?php
include "Public/config/config.php";
?>
<html>
<head>
    <?php include "Views/admin/layouts/header.php"; ?>
    <style>
        .title {
            display: flex
        }

        .title .fa-add {
            margin-top: -5px;
            padding: 5px;
            border: 1px solid black;
        }
        .flex-container {
            display: flex;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="flex-container">
            <div class="title col-10">
                <h1 style="margin-left: 30px">Plugin</h1>
                <a href="<?php echo $DefaultSomeFunction; ?>/upload" class="nav-link">
                    <i class="fa-solid fa-add"></i>
                </a>
                <a href="<?php echo $DefaultSomeFunction; ?>/reloadPlugin" class="nav-link">
                    <i class="fa-solid fa-upload"></i>
                </a>
            </div>

            <div class="col-2">
                <!-- Form search -->
                <form id="searchForm">
                    <div class="input-group input-group-sm">
                        <input type="text" id="searchInput" class="form-control" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php if (!empty($getFileMoTa)):?>
            <div class="table">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th><input class="all" type="checkbox"></th>
                                    <th>Plugin</th>
                                    <th>Mô Tả</th>
                                    <th colspan="2" class="text-center">Tùy chọn</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($getFileMoTa as $item) :
                                    $folderMota = basename(dirname($item));
                                    $json = file_get_contents($item);
                                    $lines = explode("\n", $json);
                                    $firstLine = $lines[0];
                                    ?>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td class="plugin-name" value="<?php echo $firstLine?>"><?php echo $firstLine; ?></td>
                                        <td>
                                            <?php
                                            $countString = count($lines);
                                            $limitedLines = array_slice($lines, 0, 6);
                                            $cutString = array_slice($limitedLines, 1, $countString);
                                            echo implode("<br>", $cutString);
                                            if (count($lines) > 6) {
                                                echo "<br>...";
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                            foreach ($getFileConfig as $value) {
                                                $folderConfig = basename(dirname($value));
                                                if ($folderMota == $folderConfig) {
                                                    $json = file_get_contents($value);
                                                    $json_data = json_decode($json, true);
                                                    $check = ($json_data['hidden'] === true) ? true : false;
                                                    $linkText = $check ? 'Re-active' : 'Active';
                                                    $linkUrl = "changeActive?file=" . urlencode($value);
                                                    echo "<a href='$linkUrl'>$linkText</a>";
                                                }
                                            }
                                            ?>
                                        </td>


                                        <td class="text-center">
                                            <?php $a = dirname($item) ?>
                                            <?php $escapedFolderPath = rawurlencode($a); ?>

                                            <button style="color:red; border: none;background-color: transparent;"
                                                    onclick="deleteFolder('<?php echo $escapedFolderPath ?>')">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>

                                    </tr>

                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        <?php else: ?>
            <p>Have no plugin</p>
        <?php endif;?>

    </div>
</div>
</body>
<!--check all value in the table-->
<script>
    <?php include dirname(__DIR__) . '\Public\js\plugin\checkAll.js'?>
</script>

<script>
    function deleteFolder(FolderPath) {
        var escapedFolderPath = FolderPath.replace(/\\/g, "\\\\");
        Swal.fire({
            title: 'Confirmation',
            text: 'Are you sure you want to delete this folder?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch("removePlugin", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: "folderPath=" + escapedFolderPath
                })
                    .then(response => response.text())
                    .then(message => {
                        Swal.fire({
                            title: 'Success',
                            text: 'Delete Successful',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            // Reload the page or perform any other action after deleting the folder
                            location.reload();
                        });
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }
        });
    }
</script>

<script>
    <?php include dirname(__DIR__) . '\Public\js\plugin\searchPlugin.js'?>
</script>


<footer>
    <?php include "Views/admin/layouts/footer.php"; ?>
</footer>
</html>
