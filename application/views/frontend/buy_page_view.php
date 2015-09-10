<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="<?php echo base_url('/assets/css/bootstrap.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('/assets/css/style_frontend.css'); ?>" rel='stylesheet' type='text/css' />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/js/puy.js'); ?>"></script>
    <?php echo $map['js']; ?>
</head>
<body>
<div class="buy_div">
    <?php foreach($data as $value) :?>
        <?php $row = $value; ?>
    <?php endforeach; ?>
<!--    <pre>-->
<!--        --><?php //print_r($row); ?>
    <?php if($row['count'] == 0){
        $row['count'] = 1;
    }
    ?>
    <div class="buy_div_page">
        <div class="left_div">
            <div class="name_buy_product"><?php echo $row['name']; ?></div>
            <div class="img_buy_product"><img width="100%" src="<?php echo base_url('/assets/img/' .$row['img']); ?>"></div>
            <div class="desc_buy_div"><?php echo $row['desc']; ?></div>
            <div class="price_buy_div">PRICE: <?php echo ($row['price']*$row['count']); ?>$</div>
            <div class="category_buy_div">CATEGORY: <?php echo $row['category_name']; ?></div>
            <a href="<?php echo base_url('/test/buy/' .$row['id']);?>"><button type="button" class="btn btn-primary button_buy_div">BUY PRODUCT</button></a>
        </div>
        <div class="right_div">
            <div class="country_map"><?php echo $row['country']; ?></div>
            <div class="map"><?php echo $map['html']; ?></div>
        </div>
    </div>
</div>
</body>
</html>