<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>ADMIN</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet"/>
    <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url('assets/css/font-awesome.css'); ?>" rel="stylesheet"/>
    <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url('assets/css/custom.css'); ?>" rel="stylesheet"/>
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
    <link href="<?php echo base_url('/assets/css/style_admin.css'); ?>" rel='stylesheet' type='text/css' />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/js/category.js'); ?>"></script>
</head>
<body>
<div id="wrapper">
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="button_category">
                <a href="<?php echo base_url('admin/categories/addCategory'); ?>">
                    <button type="button" class="btn btn-primary add_category_button">ADD CATEGORY</button>
                </a>
                <a href="<?php echo base_url('admin/categories/editCategory'); ?>">
                    <button type="button" class="btn btn-success edit_category_button">EDIT CATEGORY</button>
                    <a>
                        <a href="<?php echo base_url('admin/categories/deleteCategory'); ?>">
                            <button type="button" class="btn btn-danger delete_category_button">DELETE CATEGORY</button>
                        </a>
            </div>
            <div class="delete_category">
                <?php foreach ($category as $value) : ?>
                    <a href="<?php echo base_url('admin/categories/deleteCategoryById/' . $value['id']); ?>">
                        <button type="button"
                                class="btn btn-danger delete_category_button"><?php echo $value['category_name']; ?></button>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
