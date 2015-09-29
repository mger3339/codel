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
</head>
<body>
<div id="wrapper">
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="button_category">
                <button type="button" class="btn btn-primary add_category_button">ADD COUNTRY</button>
                <button type="button" class="btn btn-success edit_category_button">EDIT COUNTRY</button>
                <button type="button" class="btn btn-danger delete_category_button">DELETE COUNTRY</button>
            </div>
            <div class="category">
                <div class="add_category">
                    <form action="<?php echo base_url('admin/areas/saveProduct'); ?>" method="post"
                          enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="country_name">Enter Product name</label>
                            <input type="text" name="area_name" class="form-control add_input" id="country_name"
                                   placeholder="Country Name">
                        </div>
                        <div class="form-group coordinates">
                            <label class="label_latitude">Enter Coordinates(Latitude)</label>
                            <div class="div_latitude">
                                <input type="text" name="latitude" class="form-control latitude_input" id="latitude"  placeholder="Latitude"><div class="latitude_error"><?php echo form_error('latitude'); ?></div>
                            </div>
                            <label class="label_longitude">Enter Coordinates(Longitude)</label>
                            <div class="div_longitude">
                                <input type="text" name="longitude" class="form-control longitude_input" id="longitude"  placeholder="Longitude"><div class="longitude_error"><?php echo form_error('longitude'); ?></div>
                            </div>
                        </div><br>
                        <input type="submit" name="area_save" class="btn btn-success" value="Save"/>
                    </form>
                </div>
                <div class="edit_category">
                    <div class="edit_category_name">
                        <form action="<?php echo base_url('admin/areas/saveArea'); ?>" method="post"
                              enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="edit_country_name">Enter Product name</label>
                                <input type="hidden" name="hidden" value="<?php echo $data['0']['id']; ?>">
                                <input type="text" name="area_name" value="<?php echo $data['0']['country']; ?>"
                                       class="form-control add_input" id="edit_country_name"
                                       placeholder="Country Name">
                            </div>
                            <div class="form-group coordinates">
                                <label class="label_latitude">Enter Coordinates(Latitude)</label>
                                <div class="div_latitude">
                                    <input type="text" name="latitude" class="form-control latitude_input" id="latitude"  placeholder="Latitude"><div class="latitude_error"><?php echo form_error('latitude'); ?></div>
                                </div>
                                <label class="label_longitude">Enter Coordinates(Longitude)</label>
                                <div class="div_longitude">
                                    <input type="text" name="longitude" class="form-control longitude_input" id="longitude"  placeholder="Longitude"><div class="longitude_error"><?php echo form_error('longitude'); ?></div>
                                </div>
                            </div><br>
                            <input type="submit" name="area_save" class="btn btn-success" value="Save"/>
                        </form>
                    </div>
                    <br><br>
                    <?php foreach ($area as $value) : ?>
                        <a href="<?php echo base_url('index.php/admin/areas/getArea/' . $value['id']); ?>">
                            <button type="button"
                                    class="btn btn-primary category_button"><?php echo $value['country']; ?></button>
                        </a>
                    <?php endforeach; ?>
                </div>
                <div class="delete_category">
                    <?php foreach ($area as $value) : ?>
                        <a href="<?php echo base_url('index.php/admin/areas/deleteArea/' . $value['id']); ?>">
                            <button type="button"
                                    class="btn btn-danger category_button"><?php echo $value['country']; ?></button>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
