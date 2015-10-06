<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="<?php echo base_url('/assets/css/bootstrap.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('/assets/css/style_frontend.css'); ?>" rel='stylesheet' type='text/css' />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/js/delete_cart_product.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/edit_cart_count.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/shipping.js'); ?>"></script>
</head>
<body>
    <div id="content">
        <div class="select_all">
            <input type="hidden" class="user_id_hidden" name="hidden" value="<?php echo $this->session->userdata('user_id'); ?>">
            <input type="checkbox" name="select-all" id="select_all" /><label for="select_all">Select All</label>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal_content">
                        <div class="modal-body">
                            <p class="confirm">Are you sure?</p>
                        </div>
                        <div class="modal-footer">
                            <a href="<?php echo base_url('/home/cartPage');?>"><button type="button" class="btn btn-success" data-dismiss="modal">NO</button></a>
                            <a href="<?php echo base_url('/home/deleteCartProduct');?>"><button type="button" class="btn btn-danger delete_all_in_cart" data-dismiss="modal">YES</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn delete_all btn-danger" data-toggle="modal" data-target="#myModal">DELETE ALL</button>
            <div class="select_error"></div>
    </div>
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
    <form action="<?php echo base_url('test/index') ?>" method="post">
        <div class="cart_1<?=$id?>">
            <div class="cart_products">
                <label class="checkbox-inline checkbox"><input type="checkbox" name="checkbox" value="<?php echo $id; ?>"></label>
                <div class="cart_product_name"><?php echo $name; ?></div>
                <div class="cart_img"><img height="100%" src="<?php echo base_url('/assets/img/' .$value['img']) ?>"></div>
                <div id="price_<?php echo $id; ?>" class="cart_product_price">PRICE: <?php echo $price; ?> $</div>
                <div class="max_count"><span class="aaa">COUNT: </span><input id="input_<?=$id?>" data-id="<?php echo $id; ?>" type="text" class="form-control count_control" value="1"></div>
                <div id="total<?php echo $id; ?>" class="total_price"> = <?php echo $price; ?>$</div>
                <button data-id="<?php echo $value['id']; ?>" type="button" class="btn cart_button btn-danger" data-toggle="modal" data-target="#myModal<?php echo $value['id']; ?>">DELETE</button>
            </div>
        </div>
        <div class="modal fade" id="myModal<?=$id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal_content">
                    <div class="modal-body">
                        <p class="confirm">Are you sure?</p>
                    </div>
                    <div class="modal-footer">
                        <a href="<?php echo base_url('/home/cartPage');?>"><button type="button" class="btn btn-success" data-dismiss="modal">NO</button></a>
                        <a href="<?php echo base_url('/home/deleteCartProduct');?>"><button data-id="<?php echo $value['id']; ?>" type="button" class="btn btn-danger delete" data-dismiss="modal">YES</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <div class="aaa123">
                <div class="shipping_div">
                    <?php foreach($shipping as $item) :?>
                        <div class="shipping_total">
                            <div class="shipping_img"><img width="100%" src="<?php echo base_url('/assets/img_icon/'. $item['shipping_img']); ?>"></div>
                            <div class="shipping_name"><?php echo $item['shipping_name']; ?></div>
                            <button data-id="<?=$item['id'];?>" id="" type="button" class="btn btn-success shipping_price_button"><div class="shipping_price"><?php echo $item['shipping_price']; ?>$</div></button>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="shipping"></div>
                <div class="total_sum"></div>
            </div>
            <div class="all_total">
                <div class="total_shipping_sum"></div>
                <button type="button" class="btn btn-primary buy_now" change_url = <?= base_url('test/buy')?>><div class="shipping_price">BUY NOW</div></button>
            </div>
        </form>
    </div>
</body>
</html>