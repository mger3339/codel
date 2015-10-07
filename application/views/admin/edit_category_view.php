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
                <a href="<?php echo base_url('add_category'); ?>">
                    <button type="button" class="btn btn-primary add_category_button">ADD CATEGORY</button>
                </a>
            </div>
            <div class="category_edit">
                <form action="<?php echo base_url('admin/categories/saveCategory'); ?>" data-check-url="<?php echo base_url('admin/categories/checkCategory'); ?>" method="post"
                      class="edit_category_form" enctype="multipart/form-data">
                    <input type="hidden" name="hidden_id_category" class="hidden_id" value="<?=$data[0]['id'] ?>">

                    <div class="form-group">
                        <label for="edit_category">Enter Product category</label>
                        <input type="text" name="category_name" value="<?=$data[0]['category_name'] ?>" class="form-control add_input"
                               id="edit_category" placeholder="Name Product">

                        <div class="country_name_error"></div>
                    </div>
                    <input type="submit" name="category_save" class="btn btn-success save_edit_category" value="Save"/>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
