<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="text-center">
                <img src="<?php echo base_url('assets/img/find_user.png'); ?>" class="user-image img-responsive"/>
            </li>
            <li>
                <a href="<?php echo base_url('index.php/admin/products/index');?>"><i class="fa fa-dashboard fa-3x"></i> PRODUCTS</a>
            </li>
            <li>
                <a  href="<?php echo base_url('index.php/admin/categories/getCategories');?>"><i class="fa fa-desktop fa-3x"></i> CATEGORIES</a>
            </li>
            <li>
                <a  href="<?php echo base_url('index.php/admin/areas/getAreas');?>"><i class="fa fa-square-o fa-3x"></i> AREAS</a>
            </li>
        </ul>
    </div>
</nav>
</body>
</html>