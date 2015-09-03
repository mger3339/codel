<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="<?php echo base_url('/assets/css/bootstrap.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('/assets/css/style_frontend.css'); ?>" rel='stylesheet' type='text/css' />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="<?php echo base_url('/assets/js/add_cart.js'); ?>"></script>
</head>
<body>
        <div id="content">
            <div class="cart"><a href="<?php echo base_url('/home/cartPage'); ?>"><img class="img_cart" src="<?php echo base_url('/assets/img/cart_img.jpg'); ?>"/></a>
                <div class="count"></div>
            </div>
            <?php foreach($data as $value): ?>
                <div class="main_div">
                    <div class="title"><a href="<?php echo base_url('/home/productPage/'. $value['id']); ?>"><?php echo $value['name']; ?></a></div>
                    <div class="auto_img_div"><a href="<?php echo base_url('/home/productPage/'. $value['id']); ?>"><img width="100%"  src="<?php echo base_url('/assets/img/'. $value['img']); ?>" alt="..." class="img-rounded"></a></div>
                    <div class="cart_page_div">
                        <div class="country">COUNTRY: <?php echo $value['country']; ?></div>
                        <div class="category">CATEGORY: <?php echo $value['category_name']; ?></div>
                        <div class="total">TOTAL: <?php echo $value['total'] ?></div>
                    </div>
                    <div class="div_button">
                        <a href="<?php echo base_url('/home/productPage/'. $value['id']); ?>"><button type="button" class="btn button_view_frontend btn-success btn-md">VIEW</button></a>
                        <a href="#"><button data-id="<?php echo $value['id']; ?>" type="button" class="btn add_cart btn-danger btn-md">Add to cart</button></a>
                    </div>
                    <div class="price">PRICE: <?php echo $value['price']; ?>$</div>
                    <div class="asd"></div>
                </div>
            <?php endforeach; ?>
           <div class="pagin"><?php echo $this->pagination->create_links(); ?></div>
     </div>
</body>
</html>