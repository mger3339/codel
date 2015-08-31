<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="<?php echo base_url('/assets/css/bootstrap.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('/assets/css/style_frontend.css'); ?>" rel='stylesheet' type='text/css' />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/js/add_cart.js'); ?>"></script>
</head>
<body>
        <div id="content">
            <div class="cart"><a href="<?php echo base_url('index.php/frontend/home/cartPage'); ?>"><img class="img_cart" src="<?php echo base_url('/assets/img/cart_img.jpg'); ?>"/></a>
                <div class="count"></div>
            </div>
            <?php foreach($data as $value): ?>
            <div class="auto">
                <div class="auto_img_div"><a href="<?php echo base_url('index.php/frontend/home/productPage/'. $value['id']); ?>"><img  src="<?php echo base_url('/assets/img/'. $value['img']); ?>" alt="..." class="img-rounded"></a></div>
                <div class="auto_desc">
                    <p class="title"><a href="<?php echo base_url('index.php/frontend/home/productPage/'. $value['id']); ?>"><?php echo $value['name']; ?></a></p>
                    <p class="price">PRICE: <?php echo $value['price']; ?></p>
                    <p class="country">COUNTRY: <?php echo $value['country']; ?></p>
                    <p class="country">CATEGORY: <?php echo $value['category_name']; ?></p>
                    <p class="country">TOTAL: <span class="total"><?php echo $value['total'] ?></span></p>
                    <button type="button" class="btn button_view_frontend btn-primary btn-md"><a href="<?php echo base_url('index.php/frontend/home/productPage/'. $value['id']); ?>"><span class="button_view">VIEW</span></a></button>
                    <button data-id="<?php echo $value['id']; ?>" type="button" class="btn button_add_cat  add_cart btn-primary btn-md"><a href="#"><span class="button_view">Add to cart</span></a></button>
                    <div class="asd"></div>
                </div>
            </div>
            <?php endforeach; ?>
           <?php echo $this->pagination->create_links(); ?>
     </div>
</body>
</html>