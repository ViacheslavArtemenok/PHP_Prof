<?php
session_start();

abstract class User_template
{
    function __construct(
        $salt1,
        $salt2,
        $connect,
        $auth_login,
        $auth_pass,
        $get_first_name,
        $get_second_name,
        $get_age,
        $get_phone,
        $get_gend,
        $get_email,
        $get_passw,
        $path,
        $show_user_photo,
        $controller_name,
        $room,
        $action
    ) {
        $this->salt1 = $salt1;
        $this->salt2 = $salt2;
        $this->connect = $connect;
        $this->auth_login = $auth_login;
        $this->auth_pass = $auth_pass;
        $this->get_first_name = $get_first_name;
        $this->get_second_name = $get_second_name;
        $this->get_age = $get_age;
        $this->get_phone = $get_phone;
        $this->get_gend = $get_gend;
        $this->get_email = $get_email;
        $this->get_passw = $get_passw;
        $this->path = $path;
        $this->show_user_photo = $show_user_photo;
        $this->controller_name = $controller_name;
        $this->room = $room;
        $this->action = $action;
    }

    abstract function authorization();
    abstract function registration();
    abstract function update();
    abstract function exit();
    abstract function render();
}

class User extends User_template
{
    public function __construct(
        $salt1,
        $salt2,
        $connect,
        $auth_login,
        $auth_pass,
        $get_first_name,
        $get_second_name,
        $get_age,
        $get_phone,
        $get_gend,
        $get_email,
        $get_passw,
        $path,
        $show_user_photo,
        $controller_name,
        $room,
        $action
    ) {
        parent::__construct(
            $salt1,
            $salt2,
            $connect,
            $auth_login,
            $auth_pass,
            $get_first_name,
            $get_second_name,
            $get_age,
            $get_phone,
            $get_gend,
            $get_email,
            $get_passw,
            $path,
            $show_user_photo,
            $controller_name,
            $room,
            $action
        );
    }

    public function authorization()
    {
        try {

            $get_check_login = $this->auth_login;
            $get_check_pass = $this->salt1 . md5($this->auth_pass) . $this->salt2;
            $db = $this->connect;
            $sth = $db->prepare("SELECT `id`, `first_name`, `second_name`, `age`, `phone`, `gend`, `email`, `user_photo` from users WHERE `email`= :login and `passw`= :passw");
            $sth->execute([':login' => $get_check_login, ':passw' => $get_check_pass]);
            $data_auth = $sth->fetch();
            if (!empty($data_auth)) {
                foreach ($data_auth as $index => $item) {
                    $_SESSION["arr_login"]["$index"] = $item;
                }
                header("Location: index.php?c=$this->controller_name&action=4");
            } else {
                header("Location: index.php?c=$this->controller_name&action=8");
            }
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
    public function registration()
    {
        try {
            if (move_uploaded_file($_FILES['photo_user']['tmp_name'], $this->path)) {
                $this->show_user_photo =  $_FILES['photo_user']['name'];
            } else $this->show_user_photo = "test.jpg";
            $get_password = $this->salt1 . md5($this->get_passw) . $this->salt2;
            $db = $this->connect;
            $sth = $db->prepare("INSERT INTO `users` (`first_name`, `second_name`, `age`, `phone`, `gend`, `email`, `passw`, `user_photo`) 
                VALUES ('$this->get_first_name', '$this->get_second_name', '$this->get_age', '$this->get_phone', '$this->get_gend', '$this->get_email', '$get_password', '$this->show_user_photo');");
            $sth->execute();
            if ($db->errorCode() == 0000) {
                header("Location: index.php?c=$this->controller_name&action=3");
            } else header("Location: index.php?c=$this->controller_name&action=6");
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
    public function update()
    {
        try {
            if (move_uploaded_file($_FILES['photo_user']['tmp_name'], $this->path)) {
                $this->show_user_photo =  $_FILES['photo_user']['name'];
            }
            $get_password = $this->salt1 . md5($this->get_passw) . $this->salt2;
            $db = $this->connect;
            $sth = $db->prepare("UPDATE `users` SET `first_name` = '$this->get_first_name', 
            `second_name` = '$this->get_second_name', 
            `age` = '$this->get_age', 
            `phone` = '$this->get_phone', 
            `gend` = '$this->get_gend', 
            `passw` = '$get_password', 
            `user_photo` = '$this->show_user_photo' WHERE `email` = :login;");
            $sth->execute([':login' => $this->auth_login]);
            if ($db->errorCode() == 0000) {
                header("Location: index.php?c=$this->controller_name&action=5");
            } else header("Location: index.php?c=$this->controller_name&action=7");
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
    public function exit()
    {
        session_destroy();
        header("Location: index.php?c=$this->controller_name&action=1");
    }
    public function render()
    {
        if ($this->room) {
            $reg_way = 4;
            $reg_way_text = 'Login';
        } else {
            $reg_way = 1;
            $reg_way_text = 'Authorization';
        }

        switch ($this->action) {
            case 1:
                $content = "views/authorization.php";
                $mega_title = "Authorization";
                break;
            case 2:
                $content = "views/registration.php";
                $mega_title = "Registration";
                break;
            case 3:
                $content = "views/authorization.php";
                $mega_title = "Registration is successful!!!";
                break;
            case 4:
                $content = "views/login.php";
                $mega_title = "Account";
                break;
            case 5:
                $content = "views/authorization.php";
                $mega_title = "Update data is successful!!!";
                break;
            case 6:
                $content = "views/authorization.php";
                $mega_title = "Registration error";
                break;
            case 7:
                $content = "views/authorization.php";
                $mega_title = 'Update data error';
                break;
            case 8:
                $content = "views/authorization.php";
                $mega_title = 'Authorization error (check your login or password)';
                break;
            default:
                $content = "views/ind_tmp.php";
                $mega_title = "Authorization";
        }
        return ['reg_way' => $reg_way, 'reg_way_text' => $reg_way_text, 'content' => $content, 'mega_title' => $mega_title];
    }
}
