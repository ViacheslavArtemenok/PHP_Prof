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
    if (isset($_GET['type']) && $_SESSION['first_name'] == 'admin') { ////////////РЕНДЕРИНГ АДМИНКИ//////////////////////////////////////
        $get_gender = $_GET['type'];
        if ($get_gender == 1) {
            $sql_get = "SELECT * FROM `men`";
            $some_gender = "men";
        } elseif ($get_gender == 2) {
            $sql_get = "SELECT * FROM `women`";
            $some_gender = "women";
        } elseif ($get_gender == 3) {
            $sql_get = "SELECT * FROM `kids`";
            $some_gender = "kids";
        }
        $res = mysqli_query($connect, $sql_get);
        //$data - ассоциативный массив, содержащий информацию о каждой ячейке в таблице. Название ключа
        //это название столбца
        $file = file_get_contents("data_" . $get_gender . ".json");  // Открыть файл data.json
        $taskList = json_decode($file, true);        // Декодировать в массив 
        while ($data = mysqli_fetch_assoc($res)) {
    ?>
            <div class="product_item">

                <div class="box_pict">
                    <img class="pict_img" src="img/<?= $data['photo_name'] ?>" alt="product">

                    <label for="fly_to_cart_<?= $some_gender ?>_<?= $data['id'] ?>" class="bord_add_to_cart">
                        <div class="add_to_cart">
                            <svg class="add_to_cart_img" width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="logo_svg" d="M14.5 19.937C19 19.937 22.656 15.464 22.656 9.968C22.656 4.472 19 0 14.5 0C13.3631 0.0217413 12.2463 0.303398 11.2351 0.823397C10.2239 1.34339 9.34507 2.08794 8.66602 3C7.12663 4.99573 6.30819 7.45381 6.34399 9.974C6.34399 15.465 10 19.937 14.5 19.937ZM14.5 1.813C18 1.813 20.844 5.472 20.844 9.969C20.844 14.466 17.998 18.125 14.5 18.125C11.002 18.125 8.15603 14.465 8.15503 9.969C8.15403 5.473 11 1.813 14.5 1.813ZM20.844 18.125C20.6036 18.125 20.373 18.2205 20.203 18.3905C20.033 18.5605 19.9375 18.7911 19.9375 19.0315C19.9375 19.2719 20.033 19.5025 20.203 19.6725C20.373 19.8425 20.6036 19.938 20.844 19.938C22.526 19.9399 24.1386 20.6088 25.3279 21.7982C26.5172 22.9875 27.1861 24.6 27.188 26.282C27.1875 26.5221 27.0918 26.7523 26.922 26.9221C26.7522 27.0918 26.5221 27.1875 26.282 27.188H2.71997C2.47985 27.1875 2.24975 27.0918 2.07996 26.9221C1.91016 26.7523 1.81449 26.5221 1.81396 26.282C1.81608 24.6001 2.48517 22.9877 3.67444 21.7985C4.86371 20.6092 6.47608 19.9401 8.15796 19.938C8.39824 19.938 8.62868 19.8425 8.79858 19.6726C8.96849 19.5027 9.06396 19.2723 9.06396 19.032C9.06396 18.7917 8.96849 18.5613 8.79858 18.3914C8.62868 18.2215 8.39824 18.126 8.15796 18.126C5.99541 18.1279 3.92201 18.9875 2.39258 20.5164C0.863144 22.0453 0.00264777 24.1185 0 26.281C0.000794067 27.0019 0.287502 27.693 0.797241 28.2027C1.30698 28.7125 1.99811 28.9992 2.71899 29H26.282C27.0027 28.9989 27.6936 28.7121 28.2031 28.2024C28.7126 27.6927 28.9992 27.0017 29 26.281C28.9974 24.1187 28.1372 22.0457 26.6083 20.5168C25.0793 18.9878 23.0063 18.1276 20.844 18.125Z" fill="#E8E8E8" />
                            </svg>
                            <p class="add_to_cart_text">EDIT GOOD</p>
                        </div>
                    </label>
                </div>
                <form action="server.php" method="POST" enctype="multipart/form-data">
                    <input name="admin_id" type="text" value="<?= $data['id'] ?>" hidden>
                    <input name="admin_number_g" type="text" value="<?= $get_gender ?>" hidden>
                    <div class="admin_inputs">
                        <p>Name of good</p>
                        <input name="admin_name" type="text" value="<?= $data['name'] ?>">
                    </div>
                    <div class="admin_inputs">
                        <p>Price $</p>
                        <input name="admin_price" type="text" value="<?= $data['price'] ?>">
                    </div>
                    <div class="admin_inputs">
                        <p>Name of photo</p>
                        <input name="admin_photo_name" type="text" value="<?= $data['photo_name'] ?>">
                    </div>
                    <div class="admin_inputs">
                        <p>New photo</p>
                        <input name="admin_new_photo_name" type="file" accept="image/*">
                    </div>
                    <input id="fly_to_cart_<?= $some_gender ?>_<?= $data['id'] ?>" type="submit" hidden>
                </form>
                <form action="product.php" method="POST" enctype="multipart/form-data">
                    <input hidden name="number_g" type="text" value="<?= $get_gender ?>">
                    <input hidden name="gender" type="text" value="<?= $some_gender ?>">
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
            </div>
    <?php
        }
    }
    ?>



    <?php
    if (isset($_GET['type']) && $_SESSION['first_name'] != 'admin') { ////////////РЕНДЕРИНГ КАТАЛОГА ТОВАРОВ
        $get_gender = $_GET['type'];

        if ($get_gender == 1) {
            $sql_get = "SELECT * FROM `men` WHERE `id`>0 AND `id`<4";
            $some_gender = "men";
        } elseif ($get_gender == 2) {
            $sql_get = "SELECT * FROM `women` WHERE `id`>0 AND `id`<4";
            $some_gender = "women";
        } elseif ($get_gender == 3) {
            $sql_get = "SELECT * FROM `kids` WHERE `id`>0 AND `id`<4";
            $some_gender = "kids";
        }
        $res = mysqli_query($connect, $sql_get);
        //$data - ассоциативный массив, содержащий информацию о каждой ячейке в таблице. Название ключа
        //это название столбца
        $file = file_get_contents("data_" . $get_gender . ".json");  // Открыть файл data.json
        $taskList = json_decode($file, true);        // Декодировать в массив 
        while ($data_get = mysqli_fetch_assoc($res)) {
            $data_arr[] = $data_get;
        };
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
            </div>
    <?php
        }
        $more_url = "server.php?type=$get_gender&more=3";
        $more_page =
            "<div class='box_btn'>
        <button type='button' class='btn' onClick=\"showMore($more_url)\">More goods</button>
    </div>";
    }
    ?>
    <?php
    if (isset($_GET['rev'])) { //РЕНДЕРИНГ ОТЗЫВОВ В ФАЙЛЕ reviews.php
        $sql_get = "SELECT * FROM `reviews`";
        $res = mysqli_query($connect, $sql_get);
        //$data - ассоциативный массив, содержащий информацию о каждой ячейке в таблице. Название ключа
        //это название столбца
        $file = file_get_contents('data.json');  // Открыть файл data.json
        $taskList = json_decode($file, true);
        $i = 1;      // Декодировать в массив 
        while ($data = mysqli_fetch_assoc($res)) { ?>
            <div class="review_block">
                <div class="review_left">
                    <img class="img_reviews" src="faces/<?= $data['photo_name'] ?>" alt="k">
                    <p><?= $data['name'] ?></p>
                    <p><?= $data['city'] ?></p>
                </div>
                <div>
                    <p class="text_right"><?= $taskList[$i] . "<br>" . "<br>" ?><?= date("H:i", strtotime($data['date'])) . "<br>" ?><?= date("d.m.Y", strtotime($data['date'])) ?></p>
                </div>
            </div>
    <?php
            $i++;
        }
    }
    ?>

    <?php
    if ($_GET['action'] == 1 || $_GET['action'] == 3) { //АВТОРИЗАЦИЯ
    ?>
        <form class="reg_block_left" action="server.php" method="POST" enctype="multipart/form-data">
            <p class="reg_tittle_name">Login details</p>
            <input class="reg_inp" name="check_login" type="email" required placeholder="Email">
            <input class="reg_inp" name="check_pass" type="password" required placeholder="Password">
            <p class="instr">Please use 8 or more characters, with at least 1 number and a mixture of uppercase and
                lowercase letters</p>
            <div class="button_box"> <button class="reg_gend_btn" type="submit">
                    JOIN NOW
                    <svg width="17" height="10" viewBox="0 0 17 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.54 0.208095C11.6058 0.142131 11.684 0.0897967 11.77 0.0540883C11.8561 0.01838 11.9483 0 12.0415 0C12.1347 0 12.2269 0.01838 12.313 0.0540883C12.399 0.0897967 12.4772 0.142131 12.543 0.208095L16.7929 4.458C16.8589 4.5238 16.9112 4.60196 16.9469 4.68802C16.9826 4.77407 17.001 4.86632 17.001 4.95949C17.001 5.05266 16.9826 5.14491 16.9469 5.23097C16.9112 5.31702 16.8589 5.39518 16.7929 5.46098L12.543 9.71089C12.41 9.84389 12.2296 9.91861 12.0415 9.91861C11.8534 9.91861 11.673 9.84389 11.54 9.71089C11.407 9.57788 11.3323 9.39749 11.3323 9.2094C11.3323 9.0213 11.407 8.84091 11.54 8.70791L15.2898 4.95949L11.54 1.21107C11.474 1.14528 11.4217 1.06711 11.386 0.981059C11.3503 0.895005 11.3319 0.802752 11.3319 0.709584C11.3319 0.616415 11.3503 0.524162 11.386 0.438109C11.4217 0.352055 11.474 0.273891 11.54 0.208095Z" fill="white" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 4.95948C0 4.77162 0.0746263 4.59146 0.207462 4.45862C0.340297 4.32579 0.52046 4.25116 0.708318 4.25116H15.583C15.7708 4.25116 15.951 4.32579 16.0838 4.45862C16.2167 4.59146 16.2913 4.77162 16.2913 4.95948C16.2913 5.14734 16.2167 5.3275 16.0838 5.46033C15.951 5.59317 15.7708 5.6678 15.583 5.6678H0.708318C0.52046 5.6678 0.340297 5.59317 0.207462 5.46033C0.0746263 5.3275 0 5.14734 0 4.95948Z" fill="white" />
                    </svg>
                </button>
                <a class="reg_reg_btn" href="registration.php?action=2">Registration</a>
            </div>
        </form>
    <?php
    }
    ?>

    <?php
    if ($_GET['action'] == 2) { //РЕГИСТРАЦИЯ

    ?>
        <form class="reg_block_left" action="server.php" method="POST" enctype="multipart/form-data">
            <p class="reg_tittle_name">Add new information</p>
            <input class="reg_inp" name="first_name" type="text" required placeholder="First Name">
            <input class="reg_inp" name="second_name" type="text" required placeholder="Last Name">
            <input class="reg_inp" name="age" type="number" required placeholder="Age">
            <input class="reg_inp" name="phone" type="tel" required placeholder="Phone: +0-000-000-0000">
            <div class="gender_box">
                <input class="reg_radio" name="gend" value="m" type="radio" required name="gender">
                <p class="gender">Male</p>
                <input class="reg_radio" name="gend" value="f" type="radio" required name="gender">
                <p class="gender">Female</p>
            </div>
            <p class="reg_tittle_name">Login details</p>
            <input class="reg_inp" name="email" type="email" required placeholder="Email">
            <input class="reg_inp" name="passw" type="password" required placeholder="Password">
            <input class="reg_inp" type="file" name="photo_user" accept="image/*">
            <p class="instr">Please use 8 or more characters, with at least 1 number and a mixture of uppercase and
                lowercase letters</p>
            <div class="button_box"> <button class="reg_gend_btn" type="submit">
                    JOIN NOW
                    <svg width="17" height="10" viewBox="0 0 17 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.54 0.208095C11.6058 0.142131 11.684 0.0897967 11.77 0.0540883C11.8561 0.01838 11.9483 0 12.0415 0C12.1347 0 12.2269 0.01838 12.313 0.0540883C12.399 0.0897967 12.4772 0.142131 12.543 0.208095L16.7929 4.458C16.8589 4.5238 16.9112 4.60196 16.9469 4.68802C16.9826 4.77407 17.001 4.86632 17.001 4.95949C17.001 5.05266 16.9826 5.14491 16.9469 5.23097C16.9112 5.31702 16.8589 5.39518 16.7929 5.46098L12.543 9.71089C12.41 9.84389 12.2296 9.91861 12.0415 9.91861C11.8534 9.91861 11.673 9.84389 11.54 9.71089C11.407 9.57788 11.3323 9.39749 11.3323 9.2094C11.3323 9.0213 11.407 8.84091 11.54 8.70791L15.2898 4.95949L11.54 1.21107C11.474 1.14528 11.4217 1.06711 11.386 0.981059C11.3503 0.895005 11.3319 0.802752 11.3319 0.709584C11.3319 0.616415 11.3503 0.524162 11.386 0.438109C11.4217 0.352055 11.474 0.273891 11.54 0.208095Z" fill="white" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 4.95948C0 4.77162 0.0746263 4.59146 0.207462 4.45862C0.340297 4.32579 0.52046 4.25116 0.708318 4.25116H15.583C15.7708 4.25116 15.951 4.32579 16.0838 4.45862C16.2167 4.59146 16.2913 4.77162 16.2913 4.95948C16.2913 5.14734 16.2167 5.3275 16.0838 5.46033C15.951 5.59317 15.7708 5.6678 15.583 5.6678H0.708318C0.52046 5.6678 0.340297 5.59317 0.207462 5.46033C0.0746263 5.3275 0 5.14734 0 4.95948Z" fill="white" />
                    </svg>
                </button>
                <a class="reg_reg_btn" href="registration.php?action=1">Authorization</a>
            </div>
        </form>
    <?php
    }
    ?>

    <?php
    if ($_GET['action'] == 4) { //РЕДАКТИРОВАНИЕ
    ?>
        <form class="reg_block_left" action="server.php?del=1" method="POST" enctype="multipart/form-data">
            <img class="foot_img_middle" src="faces_users/<?= $_SESSION['user_photo'] ?>" alt="photo">
            <input type="hidden" name="updater" value="1">
            <input class="reg_inp" name="first_name" type="text" value="<?= $_SESSION['first_name'] ?>" required placeholder="<?= $_SESSION['first_name'] ?>">
            <input class="reg_inp" name="second_name" type="text" value="<?= $_SESSION['second_name'] ?>" required placeholder="<?= $_SESSION['second_name'] ?>">
            <input class="reg_inp" name="age" type="number" value="<?= $_SESSION['age'] ?>" required placeholder="<?= $_SESSION['age'] ?>">
            <input class="reg_inp" name="phone" type="tel" value="<?= $_SESSION['phone'] ?>" required placeholder="<?= $_SESSION['phone'] ?>">
            <p class="reg_inp">Gender: <?= $_SESSION['gend'] == "m" ? "Male" : "Female" ?></p>
            <div class="gender_box">
                <input class="reg_radio" name="gend" value="m" type="radio" required name="gender">
                <p class="gender">Male</p>
                <input class="reg_radio" name="gend" value="f" type="radio" required name="gender">
                <p class="gender">Female</p>
            </div>
            <p class="reg_tittle_name">Login details</p>
            <input name="email" type="hidden" value="<?= $_SESSION['email'] ?>" required>
            <p class="reg_inp"><?= $_SESSION['email'] ?></p>
            <input class="reg_inp" name="passw" type="password" required placeholder="Enter your password">
            <input class="reg_inp" type="file" name="photo_user" accept="image/*">
            <p class="instr">Please use 8 or more characters, with at least 1 number and a mixture of uppercase and
                lowercase letters</p>
            <div class="button_box"> <button class="reg_gend_btn" type="submit">
                    EDIT NOW
                    <svg width="17" height="10" viewBox="0 0 17 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.54 0.208095C11.6058 0.142131 11.684 0.0897967 11.77 0.0540883C11.8561 0.01838 11.9483 0 12.0415 0C12.1347 0 12.2269 0.01838 12.313 0.0540883C12.399 0.0897967 12.4772 0.142131 12.543 0.208095L16.7929 4.458C16.8589 4.5238 16.9112 4.60196 16.9469 4.68802C16.9826 4.77407 17.001 4.86632 17.001 4.95949C17.001 5.05266 16.9826 5.14491 16.9469 5.23097C16.9112 5.31702 16.8589 5.39518 16.7929 5.46098L12.543 9.71089C12.41 9.84389 12.2296 9.91861 12.0415 9.91861C11.8534 9.91861 11.673 9.84389 11.54 9.71089C11.407 9.57788 11.3323 9.39749 11.3323 9.2094C11.3323 9.0213 11.407 8.84091 11.54 8.70791L15.2898 4.95949L11.54 1.21107C11.474 1.14528 11.4217 1.06711 11.386 0.981059C11.3503 0.895005 11.3319 0.802752 11.3319 0.709584C11.3319 0.616415 11.3503 0.524162 11.386 0.438109C11.4217 0.352055 11.474 0.273891 11.54 0.208095Z" fill="white" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 4.95948C0 4.77162 0.0746263 4.59146 0.207462 4.45862C0.340297 4.32579 0.52046 4.25116 0.708318 4.25116H15.583C15.7708 4.25116 15.951 4.32579 16.0838 4.45862C16.2167 4.59146 16.2913 4.77162 16.2913 4.95948C16.2913 5.14734 16.2167 5.3275 16.0838 5.46033C15.951 5.59317 15.7708 5.6678 15.583 5.6678H0.708318C0.52046 5.6678 0.340297 5.59317 0.207462 5.46033C0.0746263 5.3275 0 5.14734 0 4.95948Z" fill="white" />
                    </svg>
                </button>
                <a class="reg_reg_btn" href="server.php?del=1">EXIT</a>
            </div>
        </form>
    <?php
    }
    ?>

    <script src="main.js"></script>
</body>

</html>