<?php
$setting  = $koneksi->query("SELECT * FROM cf_setting")->fetch_assoc();
$title    = $setting['set_app_name'];
$author   = $setting['set_app_author'];
$desc     = $setting['set_app_desc'];
$app_year = $setting['set_app_year'];
$icon     = $setting['set_app_icon'];
$favicon  = $setting['set_app_favicon'];
$vers     = $setting['set_app_vers'];

// $data = explode(" ", $title);
// $array1 = $data[0];
// $array2 = $data[1];
