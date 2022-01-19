<?php
session_start();
include "config.php";
include "model.php";

$user = new User(
    $config_salt1,
    $config_salt2,
    $config_connect,
    $config_auth_login,
    $config_auth_pass,
    $config_get_first_name,
    $config_get_second_name,
    $config_get_age,
    $config_get_phone,
    $config_get_gend,
    $config_get_email,
    $config_get_passw,
    $config_path,
    $config_show_user_photo,
    $config_controller_name,
    $config_in_room,
    $config_action
);

if ($_GET['del']) { //ВЫХОД ИЗ ЛИЧНОГО КАБИНЕТА
    $user->exit();
}
if (!empty($_POST['check_pass'])) { //АВТОРИЗАЦИЯ
    $user->authorization();
}
if (!empty($_POST['updater'])) { //ОБНОВЛЕНИЕ ДАННЫХ ЛИЧНОГО КАБИНЕТА
    $user->update();
}
if (!empty($_POST['email']) && empty($_POST['updater'])) { //РЕГИСТРАЦИЯ
    $user->registration();
}
$arr_vars = $user->render(); // МАРКЕРЫ ССЫЛОК
$reg_way = $arr_vars['reg_way'];
$reg_way_text = $arr_vars['reg_way_text'];
$content = $arr_vars['content'];
$mega_title = $arr_vars['mega_title'];
