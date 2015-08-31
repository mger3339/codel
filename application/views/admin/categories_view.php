<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADMIN</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url('assets/css/font-awesome.css'); ?>" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url('assets/css/custom.css'); ?>" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
<div id="wrapper">
    <div id="page-wrapper" >
        <div id="page-inner">
            <?php foreach($category as $item) : ?>
                <?php $id = $item['id']; ?>
                <div class="category_button">
                    <a href="<?php echo base_url('index.php/admin/categories/productViewByCategory/' . $item['id']); ?>"><button type="button" class="btn btn-primary"><span class="edit"><?php echo $item['category_name']; ?></span></button></a>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
