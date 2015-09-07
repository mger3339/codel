<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="<?php echo base_url('/assets/css/bootstrap.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('/assets/css/style_frontend.css'); ?>" rel='stylesheet' type='text/css' />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/js/shipping.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/edit_cart_count.js'); ?>"></script>
</head>
<body>
    <div class="buy_div">
        <?php foreach($data as $value) :?>
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
        <?php endforeach; ?>
<!--        <pre>-->
<!--            --><?php //print_r($shipping); die; ?>
            <div class="page_img"><img width="100%" src="<?php echo base_url('/assets/img/'. $img); ?>"></div>
            <div class="page_desc">
                <div class="product_name"><?php echo $name ?></div>
                <div class="product_desc"><?php echo $desc ?></div>
                <div class="div_3">
                    <div class="product_country">COUNTRY: <?php echo $country ?></div>
                    <div class="product_category">CATEGORY: <?php echo $category_name ?></div>
                    <div class="product_total">TOTAL: <?php echo $total ?></div>
                </div>
            </div>
            <div><span class="aaa">COUNT: </span><input data-id="<?php echo $id; ?>" type="text" class="form-control count_control" value="<?php echo $total; ?>"></div><div class="count_error"></div>
            <div class="product_price">PRICE: <?php echo $price ?>$</div>
            <button data-id="<?=$id?>" type="button" class="btn btn-primary buy_button" data-dismiss="modal">DISPATCH METHOD</button>
            <a href="<?php echo base_url('/home/ordersBuy/' .$id);?>"><button data-id="<?=$id?>" type="button" class="btn btn-success buy_now" data-dismiss="modal">BUY NOW</button></a>
            <div class="shipping_div">
                <div class="shipping_img_title"><img width="100%" src="<?php echo base_url('/assets/img_icon/shipping.png');?>"></div>
                <div class="dispatch_method">Dispatch method</div>
                <div class="shipping_price_title">Shipping_price</div>
                <?php foreach($shipping as $item) :?>
                <div class="shipping_total">
                    <div class="shipping_img"><img width="100%" src="<?php echo base_url('/assets/img_icon/'. $item['shipping_img']); ?>"></div>
                    <div class="shipping_name"><?php echo $item['shipping_name']; ?></div>
                    <button data-id="<?=$item['id'];?>" id="" type="button" class="btn btn-success shipping_price_button"><div class="shipping_price"><?php echo $item['shipping_price']; ?>$</div></button>
                </div>
                <?php endforeach; ?>
            </div>
    </div>
</body>
</html>