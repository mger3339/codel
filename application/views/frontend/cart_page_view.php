<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="<?php echo base_url('/assets/css/bootstrap.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('/assets/css/style_frontend.css'); ?>" rel='stylesheet' type='text/css' />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/js/edit_cart_count.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/delete_cart_product.js'); ?>"></script>
</head>
<body>
    <div id="content">
        <?php foreach($data as $value): ?>
            <?php $id = $value['id'];?>
        <div class="cart_1<?=$id?>">
            <div class="cart_products">
                <div class="cart_img"><img src="<?php echo base_url('/assets/img/' .$value['img']) ?>"></div>
                <div class="cart_product_div">
                    <div class="cart_product_name"><?php echo $value['name']; ?></div>
                    <div class="cart_product_country">COUNTRY: <?php echo $value['country']; ?></div>
                    <div class="cart_product_category">CATEGORY: <?php echo $value['category_name']; ?></div>
                    <div class="cart_product_price">PRICE: <?php echo $value['price']; ?> $</div>
                    <div class="cart_count">
                        <div class="form-group">
                            <span class="aaa">COUNT: </span><input data-id="<?php echo $value['id']; ?>" type="text" class="form-control count_control" value="<?php echo $value['count']; ?>">
                        </div>
                        <button data-id="<?php echo $value['id']; ?>" type="button" class="btn cart_button btn-primary" data-toggle="modal" data-target="#myModal<?php echo $value['id']; ?>">DELETE</button>
                        <button data-id="<?php echo $value['id']; ?>" type="button" class="btn cart_button_buy btn-primary">BUY</button>
                    </div>
                </div>
            </div>
        </div>
            <div class="modal fade" id="myModal<?=$id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><a href="<?php echo base_url('index.php/frontend/home/cartPage');?>">NO</a></button>
                            <button data-id="<?php echo $value['id']; ?>" type="button" class="btn btn-default delete" data-dismiss="modal"><a href="<?php echo base_url('index.php/frontend/home/deleteCartProduct/' .$id);?>">YES</a></button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
    </div>
</body>
</html>