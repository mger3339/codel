<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="<?php echo base_url('/assets/css/bootstrap.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('/assets/css/style_frontend.css'); ?>" rel='stylesheet' type='text/css' />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/js/shipping.js'); ?>"></script>
</head>
<body>
<div id="content">
     <p>You are about to buy</p>
    <ul>
        <?php $total = 0; ?>
        <?php foreach($product as $p) : ?>
        <?php $p['price'] = $p['price'] * $p['count']; ?>
        <?php echo "<li>{$p['name']} - \${$p['price']}</li>"; ?>
        <?php $total = $total + $p['price']; ?>
        <?php endforeach; ?>
    </ul>
    <?php echo "<h1><a href='" . site_url('test/buy/') . "'>BUY NOW</a></h1>"; ?>
</div>
</body>
</html>