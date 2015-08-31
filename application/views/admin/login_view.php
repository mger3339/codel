<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link href="<?php echo base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/custom.css'); ?>" rel="stylesheet" />
</head>
<body style="background-color: #bce8f1">
    <div id="login">
            <form class="form-inline" method="post" action="<?php echo base_url('index.php/admin/admin') ?>">
                <div class="form-group">
                    <label class="login_label" for="exampleInputName2">LOGIN</label><br>
                    <input type="text" name="login" class="form-control login_input" id="exampleInputName2" placeholder="LOGIN">
                </div> <br><br>
                <div class="form-group">
                    <label class="login_label" for="exampleInputEmail2">PASSWORD</label><br>
                    <input type="password" name="password" class="form-control login_input" id="exampleInputEmail2">
                </div><br><br>
                <button type="submit" name="submit" class="btn login_button btn-primary">Log In</button>
            </form>
    </div>
</body>
</html>