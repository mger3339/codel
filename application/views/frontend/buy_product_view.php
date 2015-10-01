<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="<?php echo base_url('/assets/css/bootstrap.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('/assets/css/style_frontend.css'); ?>" rel='stylesheet' type='text/css' />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
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

            <div class="shipping_div">
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