<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="<?php echo base_url('/assets/css/bootstrap.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('/assets/css/style_frontend.css'); ?>" rel='stylesheet' type='text/css' />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/js/delete_cart_product.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/shipping.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/edit_cart_count.js'); ?>"></script>
</head>
<body>
    <div id="content">

<!--        <pre>-->
<!--            --><?php $a = 1; //print_r($data); die; ?>
        <?php foreach($data as $value): ?>
            <?php
                $id = $value['id'];
                $name = $value['name'];
                $desc = $value['desc'];
                $price = $value['price'];
                $img = $value['img'];
                $country = $value['country'];
                $category_name = $value['category_name'];
                $total = $value['total'];
            ?>
        <div class="cart_1<?=$id?>">
            <div class="cart_products">
                <label class="checkbox-inline checkbox"><input type="checkbox" value=""><?php echo $a++; ?></label>
                <div class="cart_product_name"><?php echo $name; ?></div>
                <div class="cart_img"><img height="100%" src="<?php echo base_url('/assets/img/' .$value['img']) ?>"></div>
                    <div class="cart_product_price">PRICE: <?php echo $price; ?> $</div>
<!--                <div class="cart_product_country">COUNTRY: --><?php //echo $country; ?><!--</div>-->
<!--                <div class="cart_product_category">CATEGORY: --><?php //echo $category_name; ?><!--</div>-->
                <div class="max_count"><span class="aaa">MAX COUNT: </span><input data-id="<?php echo $id; ?>" type="text" class="form-control count_control" value="<?php echo $total; ?>"></div>
                        <button data-id="<?php echo $value['id']; ?>" type="button" class="btn cart_button btn-danger" data-toggle="modal" data-target="#myModal<?php echo $value['id']; ?>">DELETE</button>
                        <a href="<?php echo base_url('/home/buyProduct/' . $value['id']) ?>"><button data-id="<?php echo $value['id']; ?>" type="button" class="btn cart_button_buy btn-success">BUY</button></a>
            </div>
        </div>
            <div class="modal fade" id="myModal<?=$id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal_content">
                        <div class="modal-body">
                            <p class="confirm">Are you sure</p>
                        </div>
                        <div class="modal-footer">
                            <a href="<?php echo base_url('/home/cartPage');?>"><button type="button" class="btn btn-success" data-dismiss="modal">NO</button></a>
                            <a href="<?php echo base_url('/home/deleteCartProduct/' .$id);?>"><button data-id="<?php echo $value['id']; ?>" type="button" class="btn btn-danger delete" data-dismiss="modal">YES</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
    </div>
</body>
</html>