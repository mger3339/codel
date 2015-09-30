<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>ADMIN</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet"/>
    <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url('assets/css/font-awesome.css'); ?>" rel="stylesheet"/>
    <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url('assets/css/custom.css'); ?>" rel="stylesheet"/>
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/js/category.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/category_validation.js'); ?>"></script>
</head>
<body>
<div id="wrapper">
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="button_category">
                <a href="<?php echo base_url('admin/areas/addArea'); ?>"><button type="button" class="btn btn-primary add_category_button">ADD COUNTRY</button></a>
                <a href="<?php echo base_url('admin/areas/editArea'); ?>"><button type="button" class="btn btn-success edit_category_button">EDIT COUNTRY</button></a>
                <a href="<?php echo base_url('admin/areas/deleteArea'); ?>"><button type="button" class="btn btn-danger delete_category_button">DELETE COUNTRY</button></a>
            </div>
            <div class="category">
                <form action="<?php echo base_url('admin/areas/saveArea'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="country_name">Enter Product name</label>
                        <input type="text" name="area_name" class="form-control add_input" id="country_name" placeholder="Country Name"><div class="country_name_error"></div>
                    </div>
                    <div class="form-group coordinates">
                        <label class="label_latitude">Enter Coordinates(Latitude)</label>
                        <div class="div_latitude">
                            <input type="text" name="latitude" class="form-control latitude_input" id="latitude"  placeholder="Latitude"><div class="latitude_error"></div>
                        </div>
                        <label class="label_longitude">Enter Coordinates(Longitude)</label>
                        <div class="div_longitude">
                            <input type="text" name="longitude" class="form-control longitude_input" id="longitude"  placeholder="Longitude"><div class="longitude_error"></div>
                        </div>
                    </div><br>
                    <input type="submit" name="area_save" class="btn btn-success save_add_area" value="Save"/>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
