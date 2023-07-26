
<?php
include "Public/config/config.php"
?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <?php if (isset($readFileJson)):?>
        <?php
        foreach ($readFileJson as $child):
            $getName = str_replace('/', '', $child['path']);
            $directory = dirname(__DIR__) . '\layouts\chart\*';
            $moduleFiles = glob($directory, GLOB_NOSORT | GLOB_BRACE);
            $paths = [];

            foreach ($moduleFiles as $key => $value) {
                $folderName = str_replace('.php', '', basename($value));
                $paths[] = $folderName;
            }
            ?>

            <?php if (in_array($getName, $paths)): ?>
            <section class="content">
                <?php include "chart/quanLyHopDong.php"; ?>
            </section>
        <?php endif; ?>

        <?php endforeach; ?>
    <?php endif;?>

</body>
