<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="author" content="Luka Cvrk (www.solucija.com)" />
    <title></title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font: .8em Georgia, "Times New Roman", Serif;
            background: #fff;
            color: #777;
        }

        a {
            color: #D40000;
            text-decoration: none;
        }

        a:hover {
            color: #8F0000;
        }

        p {
            line-height: 1.7em;
            margin: 0 0 15px;
        }

        .wrap {
            max-width: 880px;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin: 80px auto;
            gap: 20px;
        }

        .prd {
            box-shadow: 0px 0px 10px #999;
            width: 200px;
            height: 320px;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-sizing: border-box;
            padding: 10px;
        }

        .disc {
            color: #D40000;
        }
    </style>
</head>

<body>
    <div class="wrap">
        <?php
        include "product.php";
        class Render extends Product
        {
            private $discount;
            private $newPrice;
            public function __construct($title, $image, $price, $discount)
            {
                parent::__construct($title, $image, $price);
                $this->discount = $discount;
                $this->newPrice = $this->price * (100 - $this->discount) / 100;
            }

            public function getInfo()
            {
                if ($this->discount != 0) {
                    echo
                    "<div class=\"prd\">" .
                        parent::getHead()
                        . "<p class=\"disc\">Новая цена $this->newPrice руб.</p><p class=\"disc\">Скидка $this->discount %</p></div>";
                } else echo "<div class=\"prd\">" .
                    parent::getHead() . "</div>";
            }
        }

        $arr = [
            ["Bosch", "https://electrozon.ru/upload/resize/89/89322ebec2ba9a982211910acf9d6a34_300x300.jpg", 16000, 10],
            ["Patriot", "https://instrum96.ru/upload/iblock/c22/c223e21cb77aa2ebf386f1cd9118062a.jpg", 8000, 0],
            ["Makitta", "https://images.ru.prom.st/489883019_w640_h640_drel-makita-6408.jpg", 12000, 10],
            ["Диолд", "https://images.ru.prom.st/681306588_w640_h640_drel-mes-5-01-s.jpg", 7000, 0],
            ["Интерскол", "https://interprogroup.ru/upload/iblock/91b/91b66b240856fdf3af4b972bd3b77e61.JPG", 9600, 0],
            ["Crown", "https://static.price.ru/images/models/-/drel/crown-ct10126c/572299275a32e14632c631dd0ba844e8.JPEG", 8000, 10],
            ["DeWALT", "https://instrument-group.ru/image/cache/catalog/img/shop/2496/DeWalt_DW_236_i_2-380x380.jpg", 18000, 10],
            ["Bosch", "https://avatars.mds.yandex.net/get-marketpic/1584911/market_E1CIiv5w7iIJFpXW6JdSqQ/orig", 11000, 5],
        ];

        foreach ($arr as $item) {
            $oneProduct = new Render($item[0], $item[1], $item[2], $item[3]);
            $oneProduct->getInfo();
        };
        class A
        {
            public function foo()
            {
                static $x = 0;
                echo ++$x;
            }
        }
        $a1 = new A();
        $a2 = new A();
        $a1->foo(); //1 т.к. преинкремент, то первый вывод 1
        $a2->foo(); //2 т.к. $x статичесая переменная, она имеет отношение к классу, а не к объектам,
        $a1->foo(); //3 поэтому выводы от разных объектов дают последовательное увеличение числа,
        $a2->foo(); //4 переменная объявлена в рамках класса один раз, а каждый вызов функции от разных объектов ее увеличивает


        class B
        {
            public function foo()
            {
                static $x = 0;
                echo ++$x;
            }
        }
        class C extends B
        {
        }
        $a1 = new B;
        $b1 = new C;
        $a1->foo(); //1
        $b1->foo(); //1
        $a1->foo(); //2
        $b1->foo(); //2
        //Класс С наследует свойства класса В и его методы, однако Класс В и его наследник С - это разные классы, хоть и с одинаковым содержимым, 
        //поэтому при поседоватьльном обращении к каждому из них $x будет меняться параллельно каждому классу.
        class D
        {
            public function foo()
            {
                static $x = 0;
                echo ++$x;
            }
        }
        class E extends D
        {
        }
        $a1 = new D;
        $b1 = new E;
        $a1->foo(); //1
        $b1->foo(); //1
        $a1->foo(); //2
        $b1->foo(); //2 то же самое
        ?>
    </div>
</body>

</html>