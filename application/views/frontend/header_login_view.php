<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/js/user_login.js'); ?>"></script>
</head>
<body>
    <div id="header">
        <div class="container login_form">
            <form class="form-inline " role="form" action="<?php echo base_url('login/entry') ?>" method="post">
                <div class="form-group login_div">
                    <label>E-mail</label><br>
                    <input type="text" name="email_login" class="form-control input_login" id="login" placeholder="Enter email">
                </div>
                <div class="form-group password_div">
                    <label>Password</label><br>
                    <input type="password" name="password_login" class="form-control input_password" id="password_login" placeholder="Enter password">
                </div>
                <button type="submit" class="btn btn-primary button_login">Log In</button>
            </form>
        </div>
    </div>
</body>
</html>