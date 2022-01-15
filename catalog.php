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
    $get_gender = $_GET['type'];
    if ($get_gender == 1) {
        $some_gender = "men";
    } elseif ($get_gender == 2) {
        $some_gender = "women";
    } elseif ($get_gender == 3) {
        $some_gender = "kids";
    }
    ?>
    <header>
        <?php include "header.php"; ?>
    </header>

    <nav>
        <div class="main_tittle_box">
            <div class="main_tittle">
                <h3 class="pink_tittle">NEW ARRIVALS </h3>
                <div class="way">
                    <a class="way_text" href="index.php">HOME&nbsp;</a>
                    <a class="way_text" href="catalog.php?type=<?= $get_gender ?>"><?= $some_gender ?>&nbsp;</a>
                    <a class="way_text" href="catalog.php?type=<?= $get_gender ?>">NEW ARRIVALS</a>
                </div>
            </div>
        </div>
        <div class="product_menu">
            <details class="filter_box">
                <summary class="filter_click">
                    <span class="filter_text">FILTER</span>
                    <svg class="filter_svg" width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="filter_svg" d="M0.833333 10H4.16667C4.625 10 5 9.625 5 9.16667C5 8.70833 4.625 8.33333 4.16667 8.33333H0.833333C0.375 8.33333 0 8.70833 0 9.16667C0 9.625 0.375 10 0.833333 10ZM0 0.833333C0 1.29167 0.375 1.66667 0.833333 1.66667H14.1667C14.625 1.66667 15 1.29167 15 0.833333C15 0.375 14.625 0 14.1667 0H0.833333C0.375 0 0 0.375 0 0.833333ZM0.833333 5.83333H9.16667C9.625 5.83333 10 5.45833 10 5C10 4.54167 9.625 4.16667 9.16667 4.16667H0.833333C0.375 4.16667 0 4.54167 0 5C0 5.45833 0.375 5.83333 0.833333 5.83333Z" fill="#EF5B70" />
                    </svg>
                </summary>
                <details class="categ_box">
                    <summary class="categ">
                        <span class="categ_text">CATEGORY</span>
                    </summary>
                    <a class="categ_item" href="#">Accessories</a>
                    <a class="categ_item" href="#">Bags</a>
                    <a class="categ_item" href="#">Denim</a>
                    <a class="categ_item" href="#">Hoodies & Sweatshirts</a>
                    <a class="categ_item" href="#">Jackets & Coats</a>
                    <a class="categ_item" href="#">Polos</a>
                    <a class="categ_item" href="#">Shirts</a>
                    <a class="categ_item" href="#">Shoes</a>
                    <a class="categ_item" href="#">Sweaters & Knits</a>
                    <a class="categ_item" href="#">T-Shirts</a>
                    <a class="categ_item" href="#">Tanks</a>
                </details>
                <details class="categ_box categ_box_margin">
                    <summary class="categ">
                        <span class="categ_text">BRAND</span>
                    </summary>
                    <a class="categ_item" href="#">Accessories</a>
                    <a class="categ_item" href="#">Bags</a>
                    <a class="categ_item" href="#">Denim</a>
                    <a class="categ_item" href="#">Hoodies & Sweatshirts</a>
                    <a class="categ_item" href="#">Jackets & Coats</a>
                    <a class="categ_item" href="#">Polos</a>
                    <a class="categ_item" href="#">Shirts</a>
                    <a class="categ_item" href="#">Shoes</a>
                    <a class="categ_item" href="#">Sweaters & Knits</a>
                    <a class="categ_item" href="#">T-Shirts</a>
                    <a class="categ_item" href="#">Tanks</a>
                </details>
                <details class="categ_box categ_box_margin">
                    <summary class="categ">
                        <span class="categ_text">DESIGNER</span>
                    </summary>
                    <a class="categ_item" href="#">Accessories</a>
                    <a class="categ_item" href="#">Bags</a>
                    <a class="categ_item" href="#">Denim</a>
                    <a class="categ_item" href="#">Hoodies & Sweatshirts</a>
                    <a class="categ_item" href="#">Jackets & Coats</a>
                    <a class="categ_item" href="#">Polos</a>
                    <a class="categ_item" href="#">Shirts</a>
                    <a class="categ_item" href="#">Shoes</a>
                    <a class="categ_item" href="#">Sweaters & Knits</a>
                    <a class="categ_item" href="#">T-Shirts</a>
                    <a class="categ_item" href="#">Tanks</a>
                </details>
            </details>

            <div class="product_menu_right">
                <details class="collection_select trending">
                    <summary>
                        TRENDING NOW
                        <svg width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.00214 5.00214C4.83521 5.00247 4.67343 4.94433 4.54488 4.83782L0.258102 1.2655C0.112196 1.14422 0.0204417 0.969958 0.00302325 0.781035C-0.0143952 0.592112 0.0439493 0.404007 0.165221 0.258101C0.286493 0.112196 0.460759 0.0204417 0.649682 0.00302327C0.838605 -0.0143952 1.02671 0.043949 1.17262 0.165221L5.00214 3.36602L8.83167 0.279536C8.90475 0.220188 8.98884 0.175869 9.0791 0.149125C9.16937 0.122382 9.26403 0.113741 9.35764 0.1237C9.45126 0.133659 9.54198 0.162021 9.6246 0.207156C9.70722 0.252292 9.7801 0.313311 9.83906 0.386705C9.90449 0.460167 9.95405 0.546351 9.98462 0.639855C10.0152 0.733359 10.0261 0.83217 10.0167 0.930097C10.0073 1.02802 9.97784 1.12296 9.93005 1.20895C9.88227 1.29494 9.81723 1.37013 9.73904 1.42982L5.45225 4.88068C5.32002 4.97036 5.16154 5.01312 5.00214 5.00214Z" fill="#6F6E6E" />
                        </svg>
                    </summary>
                    <div class="input_box">
                        <label><input class="check_box" id="in_men" type="checkbox"> Men</label>
                        <label><input class="check_box" id="in_women" type="checkbox"> Women</label>
                        <label><input class="check_box" id="in_kids" type="checkbox"> Kids</label>
                    </div>
                </details>
                <details class="collection_select size">
                    <summary>
                        SIZE<svg width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.00214 5.00214C4.83521 5.00247 4.67343 4.94433 4.54488 4.83782L0.258102 1.2655C0.112196 1.14422 0.0204417 0.969958 0.00302325 0.781035C-0.0143952 0.592112 0.0439493 0.404007 0.165221 0.258101C0.286493 0.112196 0.460759 0.0204417 0.649682 0.00302327C0.838605 -0.0143952 1.02671 0.043949 1.17262 0.165221L5.00214 3.36602L8.83167 0.279536C8.90475 0.220188 8.98884 0.175869 9.0791 0.149125C9.16937 0.122382 9.26403 0.113741 9.35764 0.1237C9.45126 0.133659 9.54198 0.162021 9.6246 0.207156C9.70722 0.252292 9.7801 0.313311 9.83906 0.386705C9.90449 0.460167 9.95405 0.546351 9.98462 0.639855C10.0152 0.733359 10.0261 0.83217 10.0167 0.930097C10.0073 1.02802 9.97784 1.12296 9.93005 1.20895C9.88227 1.29494 9.81723 1.37013 9.73904 1.42982L5.45225 4.88068C5.32002 4.97036 5.16154 5.01312 5.00214 5.00214Z" fill="#6F6E6E" />
                        </svg>
                    </summary>
                    <div class="input_box">
                        <label><input class="check_box" id="in_xs" type="checkbox"> XS</label>
                        <label><input class="check_box" id="in_s" type="checkbox"> S</label>
                        <label><input class="check_box" id="in_m" type="checkbox"> M</label>
                        <label><input class="check_box" id="in_l" type="checkbox"> L</label>
                    </div>
                </details>
                <details class="collection_select price">
                    <summary>
                        PRICE<svg width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.00214 5.00214C4.83521 5.00247 4.67343 4.94433 4.54488 4.83782L0.258102 1.2655C0.112196 1.14422 0.0204417 0.969958 0.00302325 0.781035C-0.0143952 0.592112 0.0439493 0.404007 0.165221 0.258101C0.286493 0.112196 0.460759 0.0204417 0.649682 0.00302327C0.838605 -0.0143952 1.02671 0.043949 1.17262 0.165221L5.00214 3.36602L8.83167 0.279536C8.90475 0.220188 8.98884 0.175869 9.0791 0.149125C9.16937 0.122382 9.26403 0.113741 9.35764 0.1237C9.45126 0.133659 9.54198 0.162021 9.6246 0.207156C9.70722 0.252292 9.7801 0.313311 9.83906 0.386705C9.90449 0.460167 9.95405 0.546351 9.98462 0.639855C10.0152 0.733359 10.0261 0.83217 10.0167 0.930097C10.0073 1.02802 9.97784 1.12296 9.93005 1.20895C9.88227 1.29494 9.81723 1.37013 9.73904 1.42982L5.45225 4.88068C5.32002 4.97036 5.16154 5.01312 5.00214 5.00214Z" fill="#6F6E6E" />
                        </svg>
                    </summary>
                    <div class="input_box">
                        <label><input class="check_box" id="in_price_1" type="checkbox"> 1$-100$</label>
                        <label><input class="check_box" id="in_price_2" type="checkbox"> 100$-500$</label>
                        <label><input class="check_box" id="in_price_3" type="checkbox"> 500$-1000$</label>
                        <label><input class="check_box" id="in_price_4" type="checkbox"> 1000$.....</label>
                    </div>
                </details>
            </div>
        </div>
    </nav>

    <div id="box_for_goods" class="wrap_product">
        <?php include "render.php" ?>
    </div>
    <form id="more_goods" class='box_btn'>
        <input type="text" id="more_goods_input" name="more_goods" value="3" hidden>
        <input type="text" name="type" value="<?= $get_gender ?>" hidden>
        <input type="submit" id="more_goods_submit" hidden>
        <label for="more_goods_submit" class='btn'>More goods</label>
    </form>
    <div class="pages">
        <a class="number_page" href="#">
            <svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.995 2L3.995 7L8.995 12L7.995 14L0.994995 7L7.995 0L8.995 2Z" fill="black" />
            </svg>
        </a>
        <a class="number_page_ch" href="#">1</a>
        <a class="number_page" href="#">2</a>
        <a class="number_page" href="#">3</a>
        <a class="number_page" href="#">4</a>
        <a class="number_page" href="#">5</a>
        <a class="number_page" href="#">6.....20</a>
        <a class="number_page" href="#"><svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.994995 12L5.995 7L0.994995 2L1.995 0L8.995 7L1.995 14L0.994995 12Z" fill="black" />
            </svg>
        </a>
    </div>

    <footer>
        <div class="footer_up">
            <div class="wrap_foot">
                <div class="foot_item">
                    <img class="foot_img" src="img/truck.svg" alt="truck">
                    <h3 class="foot_h3 foot_h3_mrg1">Free Delivery</h3>
                    <p class="foot_p">Worldwide delivery on all. Authorit tively morph next-generation innov tion with
                        extensive models.</p>
                </div>
                <div class="foot_item">
                    <img class="foot_img" src="img/percent.svg" alt="percent">
                    <h3 class="foot_h3 foot_h3_mrg2">Sales & discounts</h3>
                    <p class="foot_p">Worldwide delivery on all. Authorit tively morph next-generation innov tion with
                        extensive models.</p>
                </div>
                <div class="foot_item">
                    <img class="foot_img" src="img/crown.svg" alt="crown">
                    <h3 class="foot_h3 foot_h3_mrg3">Quality assurance</h3>
                    <p class="foot_p">Worldwide delivery on all. Authorit tively morph next-generation innov tion with
                        extensive models.</p>
                </div>
            </div>
        </div>
        <?php include "footer.php" ?>
    </footer>
    <script src="main.js"></script>
</body>

</html>