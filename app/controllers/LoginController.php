<?php

namespace app\controllers;
use app\models\Main;
use R;
use vendor\core\App;
use vendor\core\base\View;

class LoginController extends AppController
{
    public function indexAction()
    {
        if (isset($_POST['enter'])){
            if ($_POST['login'] == 'admin' && $_POST['pass'] == '123')
            {
                $_SESSION['login'] = 'admin';

                header('Location: /');
            }
        }
    }

    public function logoutAction()
    {
        unset($_SESSION['login']);
        header('Location: /');
    }
}