<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta property="og:url"           content="http://www.your-domain.com/your-page.html" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Your Website Title" />
    <meta property="og:description"   content="Your description" />
    <meta property="og:image"         content="http://www.your-domain.com/path/image.jpg" />
    <title></title>
    <link href="<?php echo base_url('/assets/css/bootstrap.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('/assets/css/style_frontend.css'); ?>" rel='stylesheet' type='text/css' />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="<?php echo base_url('/assets/js/add_cart.js'); ?>"></script>
    <script src="<?php echo base_url('/assets/js/search_validation.js'); ?>"></script>
</head>
<body>
<div id="content">
    <div class="col-md-12 search_div">
        <form class="form-inline form_search" id="serarchForm" action="<?php echo base_url('/search'); ?>" method="get">
            <input type="text" name="text" value="<?php echo $values['text']; ?>" class="form-control text_search" placeholder="Search">
            <div class="form-group select_div">
                <select class="form-control area_value" name="areas">
                    <option value=""disabled selected>Areas</option>
                    <option selected value="<?php echo $values['areas']; ?>"><?php echo $values['areas']; ?></option>
                    <?php foreach($areas as $areas): ?>
                        <option value="<?php echo $areas['country']; ?>"><?php echo $areas['country']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group select_div">
                <select class="form-control category_value" name="category">
                    <option value=""disabled selected>Categories</option>
                    <option selected value="<?php echo $values['category']; ?>"><?php echo $values['category']; ?></option>
                    <?php foreach($categories as $categories): ?>
                        <option value="<?php echo $categories['category_name']; ?>"><?php echo $categories['category_name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="label_price">From - </div>
            <div class="form-group from_div">
                <input type="text" name="from" value="<?php echo $values['from']; ?>" class="form-control price_input from_price" placeholder="Price $"/>
            </div>
            <div class="label_price">To - </div>
            <div class="form-group from_div">
                <input type="text" name="to" value="<?php echo $values['to']; ?>" class="form-control price_input before_price" placeholder="Price $" />
            </div>
            <div class="form-group search_input_div">
                <button type="submit" class="btn btn-success button_search">Search</button>
            </div>
        </form>
    </div>
    <div class="cart"><a href="<?php echo base_url('/home/cartPage'); ?>"><img class="img_cart" src="<?php echo base_url('/assets/img/cart_img.jpg'); ?>"/></a>
        <div class="count"><?php echo count($cart); ?></div>
    </div>
        <div class="main_div">
           <div class="no_result">Not search Results</div>
        </div>
</div>
</body>
</html>