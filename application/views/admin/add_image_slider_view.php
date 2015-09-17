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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/js/category.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/add_validation.js'); ?>"></script>
</head>
<body>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="slider_image_view">

        </div>
        <div class="add_image_slider_div">
            <form action="<?php echo base_url('admin/slider/savePhoto'); ?>" method="post"
                  enctype="multipart/form-data">
                <div class="input-group div_file">
                    <span class="input-group-btn">
                        <span class="btn btn-primary btn-file">
                            Browse&hellip; <input type="file" name="userfile" id="exampleInputFile">
                        </span>
                    </span>
                    <input type="text" class="form-control add_input_file" readonly>
                </div>
                <input type="submit" id="submit" name="submit" class="btn btn-success slider_save_button" value="Save"/>
            </form>
        </div>
    </div>
</div>
</div>
</body>
</html>
