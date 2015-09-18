<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="<?php echo base_url('/assets/css/bootstrap.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('/assets/css/style_frontend.css'); ?>" rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="content">
        <div class="panel panel-default reg_form_div">
            <div class="panel-heading reg_title_div">
                <h3 class="panel-title">REGISTRATION</h3>
            </div>
            <div class="panel-body panel_body">
                <form role="form" action="<?php echo base_url('login/registration') ?>" method="post">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group input_div">
                                <input type="text" name="first_name" id="first_name" class="form-control input-sm input" placeholder="First Name">
                            </div>
                            <div class="error"></div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group input_div">
                                <input type="text" name="last_name" id="last_name" class="form-control input-sm input" placeholder="Last Name">
                            </div>
                            <div class="error"></div>
                        </div>
                    </div>

                    <div class="form-group input_div">
                        <input type="text" name="email" id="email" class="form-control input-sm input" placeholder="Email Address">
                        <div class="error"></div>
                    </div>

                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group input_div">
                                <input type="password" name="password" id="password" class="form-control input-sm input" placeholder="Password">
                            </div>
                            <div class="error"></div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group input_div">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm input" placeholder="Confirm Password">
                            </div>
                            <div class="error"></div>
                        </div>
                    </div>
                    <input type="submit" value="Register" class="btn btn-primary btn-block reg_button">
                </form>
            </div>
        </div>
    </div>
</body>
</html>