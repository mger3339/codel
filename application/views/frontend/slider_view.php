<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <div id="div_car">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
                <li data-target="#myCarousel" data-slide-to="5"></li>
            </ol>

            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img  class="img_slider" src="<?php echo base_url('/assets/img_slider/'. $product[0]['img'])?>" >
                </div>
                <?php foreach($product as $img):?>
                <div class="item">
                    <img  class="img_slider" src="<?php echo base_url('/assets/img_slider/'. $img['img'])?>" alt="Chania">
                </div>
                <?php endforeach; ?>
            </div>
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</body>
</html>