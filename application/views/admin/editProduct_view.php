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
    <!-- MORRIS CHART STYLES-->
    <link href="<?php echo base_url('assets/js/morris/morris-0.4.3.min.css'); ?>" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url('assets/css/custom.css'); ?>" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/js/edit_validation.js'); ?>"></script>
</head>
<body>
<div id="wrapper">
    <div id="page-wrapper" >
         <div id="page-inner">
            <div class="form_div">
                <?php foreach ($edit_product as $item) : ?>
                <?php endforeach; ?>
                <form action="<?php echo base_url('admin/products/saveProduct'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Enter Product name</label>
                        <input type="text" name="name" class="form-control add_input" value="<?php echo $item['name']; ?>" id="exampleInputEmail1" placeholder="Name Product"><div class="name_error"><?php echo form_error('name'); ?></div><br>
                    </div>
                    <div class="form-group">
                        <label for="textarea">Edit Product Description</label><br>
                        <textarea id="textarea" rows="8" cols="48" name="desc"><?php echo $item['desc']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Edit Product Price</label>
                        <input type="text" name="price" class="form-control add_input" value="<?php echo $item['price']; ?>" id="exampleInputPassword1" placeholder="Product Price"><div class="price_error"><?php echo form_error('price'); ?></div><br>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTotal">Enter total Product</label>
                        <input type="text" name="total" class="form-control add_input"  value="<?php echo $item['total']; ?>" id="exampleInputTotal"  placeholder="Total Product"><div class="total_error"><?php echo form_error('total'); ?></div><br>
                    </div>
                    <div class="category_select">
                        <label>Edit product country</label>
                        <select class="selectpicker" name="country" data-style="btn-danger">
                            <option value="1">China</option>
                            <option value="2">Usa</option>
                            <option value="3">Armenia</option>
                            <option value="4">Russia</option>
                        </select><br><br>
                    </div>
                    <div class="category_select">
                        <label>Edit product category</label>
                    <select class="selectpicker" name="category" data-style="btn-danger">
                            <option value="1">Phone</option>
                            <option value="2">Computers</option>
                            <option value="3">Cars</option>
                            <option value="4">Watches</option>
<!--                            <option selected value="t4">Крыса Лариса</option>-->
                        </select><br><br>
                    </div>
                    <div class="input-group div_file">
                        <span class="input-group-btn">
                            <span class="btn btn-primary btn-file">
                                Browse&hellip; <input type="file" name="userfile" id="exampleInputFile" value="<?php echo base_url('assets/img/' .$item['img']); ?>">
                            </span>
                        </span>
                        <input type="text" class="form-control add_input_file" value="<?php echo $item['img']; ?>" readonly>
                    </div><br><br>
                    <div class="img_edit">
                        <img src="<?php echo base_url('assets/img/' .$item['img']) ; ?>"/>
                    </div>
                    <input type="hidden" name="hid_id" value="<?php echo $item['id']; ?>"/>
                    <input type="submit" id="edit_submit" name="submit" class="btn btn-success button_save" value="Save"/>
                    <?php echo base_url('assets/img/' . $item['img']); ?>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
