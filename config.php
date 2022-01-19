<?php
define('DB_DRIVER', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'lesson6');
define('DB_USER', 'root');
define('DB_PASS', '');
$connect_str = DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME;

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
$config_path = "faces_users/" . $_FILES['photo_user']['name'];
$config_show_user_photo = strip_tags($_POST['old_photo']);
$config_controller_name = urlencode('user');
$config_in_room = $_SESSION["arr_login"]['email'];
$config_action = $_GET['action'];
