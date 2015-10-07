<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <link href="<?php echo base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet"/>
    <link href="<?php echo base_url('assets/css/custom.css'); ?>" rel="stylesheet"/>
    <link href="<?php echo base_url('/assets/css/style_admin.css'); ?>" rel='stylesheet' type='text/css' />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/js/admin_login.js'); ?>"></script>
</head>
<body>
    <div class="alert alert-danger alert_empty">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Missed login or password!!!</strong>
    </div>
    <div class="alert alert-danger alert_wrong">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Wrong login or password!!!</strong>
    </div>
<div id="login">
    <form class="form-inline" method="post" data-url="<?php echo base_url('admin/admin/checkLogin') ?>" action="<?php echo base_url('admin/admin/signIn') ?>">
        <div class="form-group">
            <label class="login_label" for="admin_login">LOGIN</label><br>
            <input type="text" name="login" class="form-control login_input" id="admin_login" placeholder="LOGIN">
        </div>
        <br><br>

        <div class="form-group">
            <label class="login_label" for="admin_password">PASSWORD</label><br>
            <input type="password" name="password" class="form-control login_input" id="admin_password" placeholder="PASSWORD">
        </div>
        <br><br>
        <button type="button" name="submit" url-redirect="<?php echo base_url('admin/home') ?>" class="btn login_button btn-primary">Log In</button>
    </form>
</div>
</body>
</html>