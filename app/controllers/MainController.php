<?php

namespace app\controllers;
use app\models\Main;
use R;
use vendor\core\App;
use vendor\core\base\View;

class MainController extends AppController
{

    public function indexAction()
    {
        $task = new Main();

        $num = 3;
        if (isset($_GET['page'])) $page = (int)$_GET['page'];
        $count = R::count('task');
        if ($count > 0)
        {
            $total = ceil($count / $num);
            if (empty($page) OR $page < 0) $page = 1;
            if ($page > $total) $page = $total;
            $start = $page * $num - $num;
            $paginat = " LIMIT $start, $num";
        }




        $task = R::findAll('task', $paginat);

        $this->set(['task'=>$task,'total'=>$total]);
    }
}
