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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/js/category.js'); ?>"></script>
</head>
<body>
<div id="wrapper">
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="button_category">
                <button type="button" class="btn btn-primary add_category_button">ADD CATEGORY</button>
                <button type="button" class="btn btn-success edit_category_button">EDIT CATEGORY</button>
                <button type="button" class="btn btn-danger delete_category_button">DELETE CATEGORY</button>
            </div>
            <div class="category">
                <div class="add_category">
                    <form action="<?php echo base_url('index.php/admin/categories/saveProduct'); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Enter Product name</label>
                            <input type="text" name="category_name" class="form-control add_input" id="exampleInputEmail1"  placeholder="Name Product">
                        </div>
                        <input type="submit" name="category_save" class="btn btn-success" value="Save"/>
                    </form>
                </div>
                <div class="edit_category">
                    <div class="edit_category_name">
                        <form action="<?php echo base_url('index.php/admin/categories/saveProduct'); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Enter Product name</label>
                                <input type="text" name="category_name" value="" class="form-control add_input" id="exampleInputEmail1"  placeholder="Name Product">
                            </div>
                            <input type="submit" name="category_save" class="btn btn-success" value="Save"/>
                        </form>
                    </div><br><br>
                    <?php foreach ($category as $value) : ?>
                        <a href="<?php echo base_url('index.php/admin/categories/getCategory/' .$value['id']); ?>"><button type="button" class="btn btn-primary category_button"><?php echo $value['category_name']; ?></button></a>
                    <?php endforeach; ?>
                </div>
                <div class="delete_category">
                    <?php foreach ($category as $value) : ?>
                        <a href="<?php echo base_url('index.php/admin/categories/deleteCategory/' . $value['id']); ?>"><button type="button" class="btn btn-danger add_category_button"><?php echo $value['category_name']; ?></button></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>