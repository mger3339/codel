<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="<?php echo base_url('/assets/css/bootstrap.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('/assets/css/style_frontend.css'); ?>" rel='stylesheet' type='text/css' />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/js/puy.js'); ?>"></script>
</head>
<body>
<div class="buy_div">
    <?php foreach($data as $value) :?>
        <?php $row = $value; ?>
    <?php endforeach; ?>
    <pre>
        <?php print_r($row); ?>
</div>
</body>
</html>