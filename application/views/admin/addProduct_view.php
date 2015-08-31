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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/js/add_validation.js'); ?>"></script>
    <!-- GOOGLE FONTS-->
</head>
<body>
<div id="wrapper">
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="form_div">
                <form action="<?php echo base_url('index.php/admin/products/saveProduct'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Enter Product name</label>
                        <input type="text" name="name" class="form-control add_input" id="exampleInputEmail1"  placeholder="Name Product"><div class="name_error"><?php echo form_error('name'); ?></div><br>
                    </div>
                    <div class="form-group">
                        <label for="textarea">Enter Product Description</label><br>
                        <textarea id="textarea" rows="8" cols="48" name="desc"></textarea>
                        <div class="desc_error"><?php echo form_error('desc'); ?></div><br><br>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Enter Product Price</label>
                        <input type="text"  name="price" class="form-control add_input" id="exampleInputPassword1" placeholder="Product Price"><div class="price_error"><?php echo form_error('price'); ?></div><br>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Enter Product Total</label>
                        <input type="text" name="total" class="form-control add_input" id="exampleInputTotal"  placeholder="Total Product"><div class="total_error"><?php echo form_error('total'); ?></div><br>
                    </div>
                    <div class="category_select">
                        <label>Enter product country</label>
                        <select class="selectpicker" name="country" data-style="btn-primary">
                            <option value="1">China</option>
                            <option value="2">Usa</option>
                            <option value="3">Armenia</option>
                            <option value="4">Russia</option>
                        </select><br><br>
                    </div>
                    <div class="category_select select_css">
                        <label>Enter product category</label>
                        <select class="selectpicker" name="category" data-style="btn-primary">
                            <option value="1">Phone</option>
                            <option value="2">Computers</option>
                            <option value="3">Cars</option>
                            <option value="4">Watches</option>
                        </select><br><br>
                    </div>
                    <div class="input-group div_file">
                        <span class="input-group-btn">
                            <span class="btn btn-primary btn-file">
                                Browse&hellip; <input type="file" name="userfile" id="exampleInputFile">
                            </span>
                        </span>
                        <input type="text" class="form-control add_input_file" readonly>
                    </div>
                    <div class="file"></div>
                    <input type="hidden" name="hid_id" /><br><br>
                    <input type="submit" id="submit" name="submit" class="btn btn-success button_save" value="Save"/>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
