<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="<?php echo base_url('/assets/css/bootstrap.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('/assets/css/style_frontend.css'); ?>" rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="content">
        <?php foreach($data as $value) :?>
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
            <div class="product_page">
                <div class="page_img"><img width="100%" src="<?php echo base_url('/assets/img/'. $img); ?>"></div>
                <div class="page_desc">
                    <div class="product_name"><?php echo $name ?></div>
                    <?php echo $desc ?><br><br>
                    <div class="product_price">PRICE: <?php echo $price ?></div>
                    <div class="product_country">COUNTRY: <?php echo $country ?></div>
                    <div class="product_category">CATEGORY: <?php echo $category_name ?></div>
                    <div class="product_category">TOTAL: <?php echo $total ?></div>
                </div>
            </div>
    </div>
</body>
</html>
