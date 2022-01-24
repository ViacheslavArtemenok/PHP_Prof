<?php
session_start();

abstract class Cart_template
{
    abstract function get_content_cart();
    abstract function get_content_cart_success();
    abstract function send_order();
}

class Cart extends Cart_template
{
    public function __construct(
        $content,
        $data_cart,
        $data_user


    ) {
        $this->content = $content;
        $this->data_cart = $data_cart;
        $this->data_user = $data_user;
    }
    public function get_content_cart()
    {
        $this->content = "views/cart.php";
        return $this->content;
    }
    public function get_content_cart_success()
    {
        $this->content = "views/success.php";
        return $this->content;
    }
    public function send_order()
    {
        $temp_arr = json_decode($this->data_cart, true);
        array_unshift($temp_arr, ['id' => $this->data_user['id'], 'first_name' => $this->data_user['first_name'], 'second_name' => $this->data_user['second_name'], 'age' => $this->data_user['age'], 'phone' => $this->data_user['phone'], 'email' => $this->data_user['email']]);
        $user_id = $this->data_user['id'];
        $cart_table = "`orders`";
        $cart_columns = "`user_id`, `status`";
        $cart_values = "'$user_id', '1'";
        $data_reg = PdoM::Instance()->Insert($cart_table, $cart_columns, $cart_values);
        if ($data_reg != 0000) {
            header("Location: index.php?c=cart&state=error");
        }

        $cart_str = "`id`";
        $cart_where = " WHERE `user_id`= :user_id";
        $cart_bind = [':user_id' => $user_id];
        $cart_get_order = PdoM::Instance()->Select($cart_table, $cart_str, $cart_where, $cart_bind);
        $number = $cart_get_order['id'];
        file_put_contents("orders/order_$number.json", json_encode($temp_arr, JSON_UNESCAPED_UNICODE));
        header("Location: index.php?c=cart&state=success");
    }
}
