<?php
include "config.php";
$get_gender = rand(1, 3);
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
$file = file_get_contents("data_" . $get_gender . ".json");
$taskList = json_decode($file, true);
while ($data = mysqli_fetch_assoc($res)) {
    if ($data['id'] != 3 &&  $data['id'] != 6 && $data['id'] != 7) { ?>
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
}
?>