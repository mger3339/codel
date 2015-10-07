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
</head>
<body>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="add_button_div">
            <a href="<?php echo base_url('admin/slider/addPhoto'); ?>">
                <button type="button" class="btn btn-primary slider_add_button">Add Image</button>
            </a>
        </div>
        <div class="add_button_div">
                <button type="button" class="btn btn-danger slider_delete_button">Delete</button>
        </div>
        <?php foreach ($images as $images) : ?>
            <div class="all_image_slider">
                <div class="slider_checkbox"><input type="checkbox"></div>
                <div class="div_img">
                    <img src="<?= base_url('/assets/img_slider/' .$images['img']); ?>" width="100%">
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</div>
</body>
</html>
