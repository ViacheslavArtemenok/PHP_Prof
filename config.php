<?php
define('DB_DRIVER', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'lesson6');
define('DB_USER', 'root');
define('DB_PASS', '');
$connect_str = DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME;

$reg_way = 1;
$reg_way_text = 'Authorization';
$content = "views/ind_tmp.php";
$mega_title = "Authorization";
$config_salt1 = "6fbhg7BUU&vvys6g";
$config_salt2 = "BbJb787yHH7h&uh7uyYh77hbkkdndhgd";
$config_connect =  new PDO($connect_str, DB_USER, DB_PASS);
$config_auth_login = strip_tags($_POST['check_login']);
$config_auth_pass = strip_tags($_POST['check_pass']);
$config_get_first_name = strip_tags($_POST['first_name']);
$config_get_second_name = strip_tags($_POST['second_name']);
$config_get_age = strip_tags($_POST['age']);
$config_get_phone = strip_tags($_POST['phone']);
$config_get_gend = strip_tags($_POST['gend']);
$config_get_email = strip_tags($_POST['email']);
$config_get_passw = strip_tags($_POST['passw']);
$config_path = "img/faces_users/";
$config_show_user_photo = strip_tags($_POST['old_photo']);
$config_controller_name = urlencode('user');
$config_action = $_GET['action'];
$config_way_for_login_in_account = $_SESSION["arr_login"]['email'];

$config_type = $_GET['type'];
$config_more_counter = $_POST['more_goods'];
$config_some_gender = 'all goods';
$config_for_where = ":r1, :r2, :r3, :r4, :r5, :r6";
$cat_max_i = 7;

$config_data_cart = $_POST['order'];
$config_data_user = $_SESSION["arr_login"];
$config_way_to_cart = "index.php?c=user&action=1";

$config_get_name = strip_tags($_POST['name_rev']);
$config_get_city = strip_tags($_POST['city_rev']);
$config_rev_user_photo = "test.jpg";
$config_rev_path = "img/faces/";
$config_rev_text = $_POST['text_review'];
