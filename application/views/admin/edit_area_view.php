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
    <link href="<?php echo base_url('/assets/css/style_admin.css'); ?>" rel='stylesheet' type='text/css' />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/js/area.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/category_validation.js'); ?>"></script>
</head>
<body>
<?php //var_dump($areas);die; ?>
<div id="wrapper">
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="button_category">
                <a href="<?php echo base_url('admin/areas/addArea'); ?>">
                    <button type="button" class="btn btn-primary add_category_button">ADD COUNTRY</button>
                </a>
            </div>
            <div class="category_edit">
                <form action="<?php echo base_url('admin/areas/saveArea'); ?>" data-validate="<?php echo base_url('admin/areas/checkArea'); ?>" class="edit_area_form" method="post">
                    <input type="hidden" name="hidden_id_area" class="hidden_id" value="<?= $areas[0]['id']; ?>">
                    <div class="form-group">
                        <label for="country_name">Enter Product name</label>
                        <input type="text" name="area_name" class="form-control add_input" id="country_edit_name" value="<?= $areas['0']['country']; ?>">
                        <div class="country_name_error"></div>
                    </div>
                    <div class="form-group coordinates">
                        <label class="label_latitude">Enter Coordinates(Latitude)</label>
                        <div class="div_latitude">
                            <input type="text" name="latitude" class="form-control latitude_input" id="edit_latitude" value="<?=$coordinates[0]['latitude'];?>">
                            <div class="latitude_error"></div>
                        </div>
                        <label class="label_longitude">Enter Coordinates(Longitude)</label>
                        <div class="div_longitude">
                            <input type="text" name="longitude" class="form-control longitude_input" id="edit_longitude" value="<?=$coordinates[0]['longitude'];?>">
                            <div class="longitude_error"></div>
                        </div>
                    </div>
                    <input type="submit" name="area_save" class="btn btn-success save_edit_area" value="Save"/>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
