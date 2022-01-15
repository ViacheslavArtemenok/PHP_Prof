<?php
session_start();
include "config.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THE BRAND OF LUXERIOUS FASHION</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/logo.svg" type="image/x-icon">
</head>

<body>
    <?php
    if (!empty($_POST['order'])) { //ОФОРМЛЕНИЕ ЗАКАЗА С ОТПРАВКОЙ В БД И ФАЙЛ JSON
        $temp_arr = json_decode($_POST['order'], true);
        array_unshift($temp_arr, ['id' => $_SESSION['id'], 'first_name' => $_SESSION['first_name'], 'second_name' => $_SESSION['second_name'], 'age' => $_SESSION['age'], 'phone' => $_SESSION['phone'], 'email' => $_SESSION['email']]);
        $user_id = $_SESSION['id'];
        $sql_pay = "INSERT INTO `orders` (`id`, `user_id`, `status`) VALUES (NULL, '$user_id', '1');";
        if (mysqli_query($connect, $sql_pay)) {
            $sql_pay_get = "SELECT `id` FROM `orders` WHERE `user_id` = '$user_id';";
        }
        $res = mysqli_query($connect, $sql_pay_get);
        while ($data = mysqli_fetch_assoc($res)) {
            $arr_num[] = $data['id'];
        }
        $number = array_pop($arr_num);
        file_put_contents("orders/order_$number.json", json_encode($temp_arr, JSON_UNESCAPED_UNICODE));
        header("Location: info.php");
    } elseif (empty($_POST['order']) && empty($_POST['more_goods'])) {
        header("Location: index.php");
    }

    if (!empty($_POST['good_name']) && empty($_POST['good_product'])) {
        header("Location: catalog.php?type={$_POST['good_number_g']}");
    }
    ?>

    <?php
    if ($_GET['del']) {
        session_destroy();
        header("Location: registration.php?action=1");
    }
    ?>
    <?php
    $salt1 = "6fbhg7BUU&vvys6g";
    $salt2 = "BbJb787yHH7h&uh7uyYh77hbkkdndhgd";
    if (!empty($_POST['name']) && $_POST['answer'] == $_POST['correct']) { //Добавление корректного отзыва в БД
        $get_name = strip_tags($_POST['name']);
        $get_city = strip_tags($_POST['city']);
        $path = "faces/" . $_FILES['photo']['name'];
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $path)) {
            $show_info =  $_FILES['photo']['name'];
            echo $show_info;
        } else $show_info = "test.jpg";
        $sql_set = "INSERT INTO `reviews` (`id`, `name`, `city`, `photo_name`) VALUES (NULL, '$get_name', '$get_city', '$show_info');";
        $res = mysqli_query($connect, $sql_set);
        $file = file_get_contents('data.json');  // Открыть файл data.json
        $text_set = json_decode($file, true);
        $text_set[] = $_POST['text_review'];        // Представить новую переменную как элемент массива, в формате 'ключ'=>'имя переменной' и добавить в массив
        file_put_contents('data.json', json_encode($text_set, JSON_UNESCAPED_UNICODE));
        header("Location: reviews.php?rev=1");
    }
    ?>

    <?php
    if (!empty($_POST['check_pass'])) { // ЗАПРОС АВТОРИЗАЦИИИ
        $get_check_login = strip_tags($_POST['check_login']);
        $get_check_pass = $salt1 . md5(strip_tags($_POST['check_pass'])) . $salt2;
        $sql_auth = "SELECT `id`, `first_name`, `second_name`, `age`, `phone`, `gend`, `email`, `user_photo` from users WHERE `email`='$get_check_login' and `passw`='$get_check_pass';";
        $res_auth = mysqli_query($connect, $sql_auth);
        if (mysqli_num_rows($res_auth)) {
            $data_auth = mysqli_fetch_assoc($res_auth);
            foreach ($data_auth as $index => $item) {
                $_SESSION["$index"] = $item;
            }
            header("Location: registration.php?action=4");
        } else {
            header("Location: registration.php?action=1");
        }
    } ?>
    <?php
    if (!empty($_POST['admin_name'])) { //ОБНОВЛЕНИЕ КАТАЛОГА ТОВАРОВ
        $get_admin_gender = $_POST['admin_number_g'];
        $get_admin_id = strip_tags($_POST['admin_id']);
        $get_admin_name = strip_tags($_POST['admin_name']);
        $get_admin_price = strip_tags($_POST['admin_price']);
        $path = "img/" . $_FILES['admin_new_photo_name']['name'];
        if (move_uploaded_file($_FILES['admin_new_photo_name']['tmp_name'], $path)) {
            $show_admin_photo =  $_FILES['admin_new_photo_name']['name'];
        } else $show_admin_photo = $_POST['admin_photo_name'];
        if ($get_admin_gender == 1) {
            $sql_admin = "UPDATE `men` SET `name` = '$get_admin_name', `price` = '$get_admin_price', `photo_name` = '$show_admin_photo' WHERE `id` = '$get_admin_id';";
        } elseif ($get_admin_gender == 2) {
            $sql_admin = "UPDATE `women` SET `name` = '$get_admin_name', `price` = '$get_admin_price', `photo_name` = '$show_admin_photo' WHERE `id` = '$get_admin_id';";
        } elseif ($get_admin_gender == 3) {
            $sql_admin = "UPDATE `kids` SET `name` = '$get_admin_name', `price` = '$get_admin_price', `photo_name` = '$show_admin_photo' WHERE `id` = '$get_admin_id';";
        }
        if (mysqli_query($connect, $sql_admin)) {
            header("Location: catalog.php?type=$get_admin_gender");
        } else $info_error = '<h3 class="pink_tittle">ADMIN EDIT ERROR</h3>'; ?>
        <header>
            <?php include "header.php"; ?>
        </header>

        <article>
            <div class="main_tittle_box">
                <div class="main_tittle_mini">
                    <?= $info_error ?>
                </div>
            </div>
        </article>
    <?php
    }
    ?>
    <?php
    if (!empty($_POST['email'])) { //ОБНОВЛЕНИЕ И ДОБАВЛЕНИЕ ЮЗЕРА В БД
        $get_first_name = strip_tags($_POST['first_name']);
        $get_second_name = strip_tags($_POST['second_name']);
        $get_age = strip_tags($_POST['age']);
        $get_phone = strip_tags($_POST['phone']);
        $get_gend = strip_tags($_POST['gend']);
        $get_email = strip_tags($_POST['email']);
        $get_passw = $salt1 . md5(strip_tags($_POST['passw'])) . $salt2;
        $path = "faces_users/" . $_FILES['photo_user']['name'];
        if (move_uploaded_file($_FILES['photo_user']['tmp_name'], $path)) {
            $show_user_photo =  $_FILES['photo_user']['name'];
        } else $show_user_photo = "test.jpg";
        if (!empty($_POST['updater'])) {
            $sql_user = "UPDATE `users` SET `first_name` = '$get_first_name', `second_name` = '$get_second_name', `age` = '$get_age', `phone` = '$get_phone', `gend` = '$get_gend', `user_photo` = '$show_user_photo' WHERE `email` = '$get_email' and `passw` = '$get_passw';";
        } else $sql_user = "INSERT INTO `users` (`first_name`, `second_name`, `age`, `phone`, `gend`, `email`, `passw`, `user_photo`) 
        VALUES ('$get_first_name', '$get_second_name', '$get_age', '$get_phone', '$get_gend', '$get_email', '$get_passw', '$show_user_photo');";
        if (mysqli_query($connect, $sql_user)) {
            header("Location: registration.php?action=3");
        } else $info_error = '<h3 class="pink_tittle">REGISTRATION ERROR</h3>'; ?>
        <header>
            <?php include "header.php"; ?>
        </header>

        <article>
            <div class="main_tittle_box">
                <div class="main_tittle_mini">
                    <?= $info_error ?>
                </div>
            </div>
        </article>
    <?php
    }
    ?>

    <?php
    if ($_POST['correct'] && $_POST['answer'] != $_POST['correct']) { //НЕВЕРНО ВВЕДЕНА КАПЧА
        $info_error = '<h3 class="pink_tittle">CAPTURE ERROR</h3>'; ?>
        <header>
            <?php include "header.php"; ?>
        </header>

        <article>
            <div class="main_tittle_box">
                <div class="main_tittle_mini">
                    <?= $info_error ?>
                </div>
            </div>
        </article>
    <?php
    }
    ?>

    <?php
    if (isset($_POST['more_goods']) && $_SESSION['first_name'] != 'admin') { ////////////РЕНДЕРИНГ КАТАЛОГА ТОВАРОВ
        $get_gender = $_POST['type'];
        $down = $_POST['more_goods'];
        $up = $_POST['more_goods'] + 4;
        if ($get_gender == 1) {
            $sql_get = "SELECT * FROM `men` WHERE `id`>$down AND `id`<$up";
            $sql_get_last = "SELECT MAX(`id`) FROM `men`";
            $some_gender = "men";
        } elseif ($get_gender == 2) {
            $sql_get = "SELECT * FROM `women` WHERE `id`>$down AND `id`<$up";
            $sql_get_last = "SELECT MAX(`id`) FROM `women`";
            $some_gender = "women";
        } elseif ($get_gender == 3) {
            $sql_get = "SELECT * FROM `kids` WHERE `id`>$down AND `id`<$up";
            $sql_get_last = "SELECT MAX(`id`) FROM `kids`";
            $some_gender = "kids";
        }
        $res = mysqli_query($connect, $sql_get);
        $res_last = mysqli_query($connect, $sql_get_last);
        $data_res_last = mysqli_fetch_assoc($res_last);
        foreach ($data_res_last as $item) {
            $last_final = $item;
        }
        //$data - ассоциативный массив, содержащий информацию о каждой ячейке в таблице. Название ключа
        //это название столбца
        $file = file_get_contents("data_" . $get_gender . ".json");  // Открыть файл data.json
        $taskList = json_decode($file, true);        // Декодировать в массив 
        while ($data_get = mysqli_fetch_assoc($res)) {
            $data_arr[] = $data_get;
        };
        if ($data_arr[0]) {
            foreach ($data_arr as $data) { //РЕНДЕР КАТАЛОГА
    ?>
                <div class="product_item">
                    <div class="box_pict">
                        <img class="pict_img" src="img/<?= $data['photo_name'] ?>" alt="product">
                        <div class="bord_add_to_cart" onclick="addToCart(`<?= $get_gender ?>`, `<?= $data['id'] ?>`, `<?= $data['name'] ?>`, ``, `<?= $data['price'] ?>`, `<?= $data['photo_name'] ?>`, 1)">
                            <div class="add_to_cart">
                                <img class="add_to_cart_img" src="img/cart.svg" alt="cart">
                                <p class="add_to_cart_text">Add to Cart</p>
                            </div>
                        </div>
                    </div>
                    <form action="product.php" method="POST" enctype="multipart/form-data">
                        <input hidden name="number_g" type="text" value="<?= $get_gender ?>">
                        <input hidden name="gender" type="text" value="<?= $some_gender ?>">
                        <input hidden name="id" type="text" value="<?= $data['id'] ?>">
                        <input hidden name="name" type="text" value="<?= $data['name'] ?>">
                        <input hidden name="price" type="text" value="<?= $data['price'] ?>">
                        <input hidden name="number_g" type="text" value="<?= $get_gender ?>">
                        <input hidden name="photo_name" type="text" value="<?= $data['photo_name'] ?>">
                        <input hidden name="about" type="text" value="<?= $taskList[$data['id']] ?>">
                        <input id="prd_sub_<?= $some_gender ?>_<?= $data['id'] ?>" class="hide" type="submit">
                        <label for="prd_sub_<?= $some_gender ?>_<?= $data['id'] ?>">
                            <h3 class="pd_tittle"><?= $data['name'] ?></h3>
                            <p class="pd_text"><?= mb_substr($taskList[$data['id']], 0, 87, 'UTF-8') ?>...</p>
                            <p class="pd_price">$<?= $data['price'] ?></p>
                        </label>
                    </form>
                    <input class="uniq_input" value="<?= $last_final ?>" hidden>
                </div>
    <?php
            }
        }
    }
    ?>
    <script src="main.js"></script>
</body>

</html>