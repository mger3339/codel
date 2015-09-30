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
        <div class="add_button_div">
            <a href="<?php echo base_url('admin/slider/addPhoto'); ?>">
                <button type="button" class="btn btn-primary slider_add_button">Add Image</button>
            </a>
            <a href="<?php echo base_url('admin/slider/editPhoto'); ?>">
                <button type="button" class="btn btn-success slider_add_button">Edit Image</button>
            </a>
            <a href="<?php echo base_url('admin/slider/deletePhoto'); ?>">
                <button type="button" class="btn btn-danger slider_add_button">Delete Image</button>
            </a>
        </div>
        <?php foreach ($images as $images) : ?>
            <div class="all_image_slider">
                <a href="<?php echo base_url('admin/slider/deleteImage/' . $images['id']) ?>"><img
                        src="<?php echo base_url('assets/img_slider/' . $images['img']) ?>" width="100%">
            </div>
        <?php endforeach; ?>
    </div>
</div>
</div>
</body>
</html>
