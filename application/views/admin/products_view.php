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
    <script src="<?php echo base_url('assets/js/button_delete.js'); ?>"></script>
</head>
<body>
<div id="wrapper">
    <div id="page-wrapper">
        <div id="page-inner">
            <?php if(!empty($is_added)){
                ?>
                <div class="alert alert-success alert_add">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Added new Product!</strong>
                </div>
            <?php
            }?>
            <?php if(!empty($is_edited)){
                ?>
                <div class="alert alert-info alert_edit">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Product changed!</strong>
                </div>
            <?php
            }?>
            <div class="alert alert-danger info">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Product deleted</strong>
            </div>
            <div id="add_button">
                <a href="<?php echo base_url('index.php/admin/products/addProduct'); ?>">
                    <button class="btn btn-info">ADD PRODUCT</button>
                </a>
            </div>
            <?php foreach ($data_product as $value) : ?>
                <?php $id = $value['id']; //print_r($value); ?>
                <div class="product_<?= $id ?>">
                    <div class="div_product">
                        <div class="name_product"><?php echo $value['name'] . "<br>"; ?></div>
                        <div class="img_product"><img width="100%"
                                                      src="<?php echo base_url('assets/img/' . $value['img']); ?>">
                        </div>
                        <div class="desc_product"><?php echo $value['desc'] . "<br>"; ?></div>
                        <div class="price_product"><span>PRICE: <span><?php echo $value['price'] . " $" . "<br>"; ?>
                        </div>
                        <div class="country_product"><span>COUNTRY: <span><?php echo $value['country']; ?></div>
                        <div class="category_product"><span>CATEGORY: <span><?php echo $value['category_name']; ?></div>
                        <div class="total_product"><span>TOTAL: <span><?php echo $value['total'] . "<br>"; ?></div>
                        <a href="<?php echo base_url('admin/products/editProduct/' .$id); ?>">
                            <button class="btn btn-success btn-lg admin_edit_button">EDIT</button>
                        </a>
                        <button class="btn btn-danger btn-lg admin_delete_button" data-toggle="modal"
                                data-target="#myModal<?= $id ?>">DELETE
                        </button>
                    </div>
                    <hr>
                </div>
                <div class="modal fade" id="myModal<?= $id ?>" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <p>Are you sure</p>
                            </div>
                            <div class="modal-footer">
                                <a href="<?php echo base_url('admin/products'); ?>">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">NO</button>
                                </a>
                                <a href="<?php echo base_url('admin/products/deleteProduct/' . $id); ?>">
                                    <button data-id="<?= $id ?>" type="button" class="btn btn-danger delete"
                                            data-dismiss="modal">YES
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>
</body>
</html>
