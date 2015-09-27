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
        <input type="hidden" class="hidden_responce" value="<?php echo $responce; ?>">
        <div class="col-md-12 search_div">
            <form class="form-inline form_search" id="serarchForm" action="<?php echo base_url('/search'); ?>" method="get">
                <input type="text" name="text" value="<?php echo $values['text']; ?>" class="form-control text_search" placeholder="Search">
                <div class="form-group select_div">
                    <select class="form-control area_value" name="areas">
                        <?php if($values['areas'] == '')
                        {?>
                            <option value=""disabled selected>Areas</option>
                        <?php }
                        else
                        {?>
                            <option value="<?php echo $values['areas']; ?>" selected><?php echo $values['areas']; ?></option>
                         <?php } ?>
                        <?php foreach($areas as $areas): ?>
                            <option value="<?php echo $areas['country']; ?>"><?php echo $areas['country']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group select_div">
                    <select class="form-control category_value" name="category">
                        <?php if($values['category'] == '')
                        {?>
                            <option value=""disabled selected>Categories</option>
                        <?php }
                        else
                        {?>
                            <option value="<?php echo $values['category']; ?>" selected><?php echo $values['category']; ?></option>
                        <?php } ?>
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
                <div class="warning"></div>
                <!--   <div class="loading_img"><img src="--><?php //echo base_url('/assets/gif/loading.gif') ?><!--" width="30px"></div>-->
            </form>
        </div>
        <div class="cart"><a href="<?php echo base_url('/home/cartPage'); ?>"><img class="img_cart" src="<?php echo base_url('/assets/img/cart_img.jpg'); ?>"/></a>
            <div class="count"><?php echo count($cart); ?></div>
        </div>
        <?php foreach($data as $value): ?>
            <div class="main_div">
                <div class="title"><a href="<?php echo base_url('/home/productPage/'. $value['id']); ?>"><?php echo $value['name']; ?></a></div>
                <div class="auto_img_div"><a href="<?php echo base_url('/home/productPage/'. $value['id']); ?>"><img width="100%"   src="<?php echo base_url('/assets/img/'. $value['img']); ?>" alt="..." class="img-rounded"></a></div>
                <div class="cart_page_div">
                    <div class="country">COUNTRY: <?php echo $value['country']; ?></div>
                    <div class="category">CATEGORY: <?php echo $value['category_name']; ?></div>
                    <div class="total">TOTAL: <?php echo $value['total'] ?></div>
                </div>
                <div class="div_button">
                    <a href="<?php echo base_url('/home/productPage/'. $value['id']); ?>"><button type="button" class="btn button_view_frontend btn-success btn-md">VIEW</button></a>
                    <button data-id="<?php echo $value['id']; ?>" type="button" class="btn add_cart btn-danger btn-md">Add to cart</button>
                </div>
                <div class="price">PRICE: <?php echo $value['price']; ?>$</div>
                <div class="asd"></div>
            </div>
        <?php endforeach; ?>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=1672897846273496";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <div class="fb-like" data-href="https://shop.dev/home" data-layout="standard" data-action="like" data-colorscheme="dark" data-show-faces="true" data-share="true"></div>
    </div>
</body>
</html>