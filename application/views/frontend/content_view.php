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
</head>
<body>
        <div id="content">
            <div class="col-md-12 search_div">
                <form class="form-inline form_search">
                    <div class="form-group select_div">
                        <select class="form-control" name="areas">
                            <option>Areas</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group select_div">
                        <select class="form-control" name="areas">
                            <option>Category</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="label_price">From - </div>
                    <div class="form-group from_div">
                        <input type="text" name="from" class="form-control price_input" placeholder="Price $"/>
                    </div>
                    <div class="label_price">Before - </div>
                    <div class="form-group from_div">
                        <input type="text" name="from" class="form-control price_input" placeholder="Price $" />
                    </div>
                    <div class="form-group search_input_div">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <input type="submit" name="submit" class="btn btn-success" value="Search">
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
           <div class="pagin"><?php echo $this->pagination->create_links(); ?></div>
     </div>
</body>
</html>