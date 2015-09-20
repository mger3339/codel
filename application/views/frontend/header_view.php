<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <div id="header">
        <div class="user_data">
            <?php echo $user_data['first_name']; ?>
            <?php echo $user_data['last_name']; ?>
        </div>
        <div id="menu">
            <div class="menu_list"><a href="<?php echo base_url('/home'); ?>">HOME</a></div>
            <div class="menu_list"><a href="<?php echo base_url('/home/'); ?>">PRODUCTS</a></div>
            <div class="menu_list"><a href="<?php echo base_url('/home/about'); ?>">ABOUT</a></div>
            <div class="menu_list"><a href="<?php echo base_url('/home/contacts'); ?>">CONTACTS</a></div>
            <div class="menu_list"><a href="<?php echo base_url('/login/logOut'); ?>"><button type="button" class="btn btn-danger log_out btn-md">LogOut</button></a></div>
        </div>
    </div>
</body>
</html>