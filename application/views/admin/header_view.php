<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link href="<?php echo base_url('/assets/css/bootstrap.css'); ?>" rel="stylesheet"/>
    <link href="<?php echo base_url('/assets/css/custom.css'); ?>" rel='stylesheet' type='text/css'/>
    <title></title>
</head>
<body>
<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo base_url('admin/home'); ?>">ADMINISTRATOR</a>
    </div>
    <div id="logout">
        <a href="<?php echo base_url('admin/admin/logOut') ?>">
            <button class="btn btn-info">Log Out</button>
        </a>
    </div>
</nav>
</body>
</html>