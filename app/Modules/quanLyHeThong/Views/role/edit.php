<?php
include "Public/config/config.php"
?>

<html>
<head>

    <?php include 'Views/admin/layouts/header.php' ?>
</head>

<style>
    #button-icons a.active i {
        color: green; /* Change the color to your desired value */
    }
</style>


<body class="hold-transition sidebar-mini layout-fixed">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!--<h1 class="m-0"><?php /*echo $titleAdd */ ?></h1>-->
                </div><!-- /.col -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo $node['ten'] ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="card card-purple">
                <div class="card-header">
                    <a style="margin-left:-15px;font-size: 24px" class="btn hover btn-flat float-left"
                       href="list"><i
                                class="fa-solid fa-arrow-left"></i></a>
                    <h1 class="card-title"><?php echo $node['ten'] ?? "" ?></h1>
                </div>
                <form action="update" method="post">
                    <?php foreach ($values as $value): ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Chức Vụ</label>
                                <input name="role_name" value="<?php echo $value['role_name'] ?>" type="text"
                                       class="form-control"
                                       id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả</label>
                                <input name="description" value="<?php echo $value['description'] ?>" type="textarea"
                                       class="form-control" id="exampleInputPassword1">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Lĩnh Vực</label>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-3">
                                            <select name="id_linh_vuc" class="form-control">
                                                <option value="100">Không</option>
                                                <?php
                                                foreach ($getAllLinhVuc as $valueLinhVuc): ?>
                                                    <?php var_dump($valueLinhVuc['id']); ?>
                                                    <option value="<?php echo $valueLinhVuc['id'] ?>" <?php echo ($value['id_linh_vuc'] === $valueLinhVuc['id']) ? 'selected="selected"' : ''; ?>><?php echo ucfirst($valueLinhVuc['ten_linh_vuc']) ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="col-3 d-flex justify-content-between mt-2" id="button-icons">
                                            <div>
                                                <a href="#"  <?php if (in_array('1', $explodedArray) || in_array('0', $explodedArray) ) echo 'class="active"'; ?>><i class="fa-solid fa-add"></i></a>
                                            </div>
                                            <div>
                                                <a href="#"  <?php if (in_array('2', $explodedArray)|| in_array('0', $explodedArray)) echo 'class="active"'; ?>><i class="fa-solid fa-pen"></i></a>
                                            </div>
                                            <div>
                                                <a href="#" <?php if (in_array('3', $explodedArray)|| in_array('0', $explodedArray)) echo 'class="active"'; ?>><i class="fa-solid fa-trash"></i></a>
                                            </div>
                                            <div>
                                                <a href="#" <?php if (in_array('4', $explodedArray)|| in_array('0', $explodedArray)) echo 'class="active"'; ?>><i class="fa-solid fa-eye"></i></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div>
                        <button type="submit" class="btn btn-success" style="float: right">Submit</button>
                    </div>
                    <input type="hidden" name="button" id="button-json-input">

                </form>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
</body>
<?php include "./Views/admin/layouts/footer.php" ?>
<script><?php include('Public/js/showAndHide.js') ?></script>

<script>
    const icons = document.querySelectorAll('#button-icons a');

    icons.forEach(icon => {
        icon.addEventListener('click', () => {
            icon.classList.toggle('active');

            const selectedIndices = [];

            icons.forEach((icon, index) => {
                if (icon.classList.contains('active')) {
                    selectedIndices.push(index + 1);
                }
            });

            // Convert the selected indices array to a JSON string
            const jsonButton = JSON.stringify(selectedIndices);
            console.log(jsonButton)
            const jsonButtonWithoutBrackets = jsonButton.replace(/\[|\]/g, ''); // Remove square brackets

            // Assign the JSON string to an input field (e.g., hidden input)
            document.querySelector("#button-json-input").value = jsonButtonWithoutBrackets;
        });
    });
</script>


</html>
