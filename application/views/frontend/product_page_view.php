<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="<?php echo base_url('/assets/css/bootstrap.css'); ?>" rel="stylesheet"/>
    <link href="<?php echo base_url('/assets/css/style_frontend.css'); ?>" rel='stylesheet' type='text/css'/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="<?php echo base_url('/assets/js/add_cart.js'); ?>"></script>
</head>
<body>
<div id="content1">
    <div class="cart">
        <a href="<?php echo base_url('/home/cartPage'); ?>"><img class="img_cart" src="<?php echo base_url('/assets/img/cart_img.jpg'); ?>"/></a>
        <div class="count"><?php echo count($cart); ?></div>
    </div>
    <?php foreach ($data as $value) : ?>
        <?php
        $name = $value['name'];
        $desc = $value['desc'];
        $price = $value['price'];
        $img = $value['img'];
        $country = $value['country'];
        $category_name = $value['category_name'];
        $total = $value['total'];
        ?>
    <?php endforeach; ?>
    <div class="page_img">
        <div class="img_div"><img width="100%" src="<?php echo base_url('/assets/img/' . $img); ?>"></div>
        <div class="product_price">PRICE: <?php echo $price ?>$</div>
        <div class="product_country">COUNTRY: <?php echo $country ?></div>
        <div class="product_category">CATEGORY: <?php echo $category_name ?></div>
        <div class="product_category">TOTAL: <?php echo $total ?></div>
    </div>
    <div class="page_desc">
        <div class="product_name"><?php echo $name ?></div>
        <?php echo $desc ?><br><br>
    </div>
    <div class="add_cart_button_div">
        <button data-id="<?php echo $value['id']; ?>" type="button" class="btn add_cart btn-danger btn-md">Add to cart</button>
    </div>
    <div class="asd"></div>
<!--    <div class="map">--><?php //echo $map['html']; ?><!--</div>-->
</div>
</body>
</html>
