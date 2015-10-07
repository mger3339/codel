<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADMIN</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url('assets/css/font-awesome.css'); ?>" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url('assets/css/custom.css'); ?>" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="<?php echo base_url('/assets/css/style_admin.css'); ?>" rel='stylesheet' type='text/css' />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<!--    <script src="--><?php //echo base_url('assets/js/category.js'); ?><!--"></script>-->
</head>
<body>
    <div id="wrapper">
        <div id="page-wrapper" >
            <div id="page-inner">
                <?php if(!empty($is_saved)){
                    ?>
                    <div class="alert alert-success alert_add">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Added new Category!</strong>
                    </div>
                <?php
                }?>
                <?php if(!empty($is_deleted)){
                    ?>
                    <div class="alert alert-danger alert_delete">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Category deleted!</strong>
                    </div>
                <?php
                }?>
                <?php if(!empty($is_changed)){
                    ?>
                    <div class="alert alert-info alert_edit">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Category changed!</strong>
                    </div>
                <?php
                }?>
                <div class="button_category">
                    <a href="<?php echo base_url('add_category'); ?>"><button type="button" class="btn btn-primary add_category_button">ADD CATEGORY</button></a>
                </div>
                <div class="container div_ul">
                    <h2 class="h2_cat">CATEGORIES</h2>
                    <ul class="list-group">
                        <?php foreach($category as $value) : ?>
                        <li class="list-group-item list-group-item-success"><?php echo $value['category_name'] ?>
                            <a href="<?php echo base_url('admin/categories/deleteCategoryById/' .$value['id']); ?>">
                                <button class="btn btn-danger delete_area_button">Delete</button>
                            </a>
                            <a href="<?php echo base_url('edit_category/' .$value['id']); ?>">
                                <button class="btn btn-success edit_area_button">Edit</button>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
