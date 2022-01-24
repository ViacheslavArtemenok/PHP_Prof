<?php
session_start();
include "config.php";
include "models/pdo.php";
include "models/user.php";
include "models/catalog.php";
include "models/cart.php";
include "models/reviews.php";
$user = new User(
    $reg_way,
    $reg_way_text,
    $content,
    $mega_title,
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
    $config_action,
    $config_way_for_login_in_account
);
if ($_POST['type']) { ///SUBMIT КНОПКИ "MORE", POST ПРИХОДИТ ОТ AJAX
    $config_type = $_POST['type'];
}
if ($_GET['move'] == 'product') { ///РЕНДЕРИНГ РЕКЛАМНЫХ КАРТОЧЕК ВНИЗУ PRODUCT
    $config_for_where = ":r1, :r2, :r3";
    $cat_max_i = 4;
}
$catalog = new Catalog($content, $config_type, $config_more_counter, $config_some_gender, $config_for_where, $cat_max_i);

$cart = new Cart($content, $config_data_cart, $config_data_user);
$reviews = new Reviews($content, $config_get_name, $config_get_city, $config_rev_user_photo, $config_rev_path, $config_rev_text);

$arr_vars = $user->get_vars(); // МАРКЕРЫ ССЫЛОК
$reg_way = $arr_vars['reg_way'];
$reg_way_text = $arr_vars['reg_way_text'];
$content = $arr_vars['content'];
$mega_title = $arr_vars['mega_title'];

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

if ($_GET['c'] == 'catalog' && $_GET['move'] != 'product') { ///РЕНДЕРИНГ КАТАЛОГА ТОВАРОВ
    $arr = $catalog->get_content_cat();
    $content = $arr['content'];
    $config_some_gender = $arr['gender'];
}

if ($_GET['move'] == 'product') { ///РЕНДЕРИНГ СТРАНИЧКИ PRODUCT
    $content = $catalog->get_content_prd();
}


if (!empty($_GET['c'] == 'cart' && $_GET['state'] == 'show')) { ///РЕНДЕРИНГ КОРЗИНЫ ТОВАРОВ
    $content = $cart->get_content_cart();
}

if (!empty($_POST['order'])) { ////ОТПРАВКА ЗАКАЗА В БАЗУ ДАННЫХ 
    $cart->send_order();
}

if (!empty($_GET['c'] == 'cart' && $_GET['state'] == 'success')) { ///РЕНДЕРИНГ УВЕДОМЛЕНИЯ ОБ ОТПРАВКЕ ЗАКАЗА
    $content = $cart->get_content_cart_success();
}

if ($_GET['c'] == 'reviews' && $_GET['status'] != 'success') { ///РЕНДЕРИНГ СТРАНИЧКИ ОТЗЫВОВ
    $content = $reviews->get_content_rev();
}
if ($_GET['c'] == 'reviews' && $_GET['status'] == 'success') { ///ОТЗЫВ УСПЕШНО ДОБАВЛЕН
    $content = $reviews->get_content_rev_success();
}

if (!empty($_POST['name_rev']) && $_POST['answer'] == $_POST['correct']) { //ДОБАВЛЕНИЕ ОТЗЫВА В БД
    $content = $reviews->add_review();
}
if ($_POST['answer'] != $_POST['correct']) { //НЕВЕРНАЯ КАПЧА
    $content = $reviews->get_content_rev_error();
}
