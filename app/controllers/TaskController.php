<?php

namespace app\controllers;
use app\models\Main;
use R;
use vendor\core\App;
use vendor\core\base\View;

class TaskController extends AppController
{

    public function indexAction()
    {
        $task = new Main();

        if (isset($_POST['task']))
        {
            if ( ($_FILES['pic']['type'] == 'image/jpeg') || ($_FILES['pic']['type'] == 'image/gif') || ($_FILES['pic']['type'] == 'image/png'))
            {
                if (is_uploaded_file($_FILES['pic']['tmp_name']))
                {
                    $path = 'public/images/'.$_FILES['pic']['name'];
                    move_uploaded_file($_FILES['pic']['tmp_name'], ROOT.'/public/images/'.$_FILES['pic']['name']);
                    imageresize(ROOT.'/public/images/'.$_FILES['pic']['name'], ROOT.'/public/images/'.$_FILES['pic']['name'], 320, 240, 750, 'image/jpeg');

                }

                $task = R::dispense('task');
                $task->username = $_POST['name'];
                $task->email = $_POST['email'];
                $task->text = $_POST['text'];
                $task->image = $path;
                $id = R::store($task);

                $res = "<div class='container text-center alert-success'>Добавлено!</div>";
            }
            else
            {
                $res = "<div class='container text-center alert-danger'>Не поддерживаемый формат изображений!</div>";
            }
            $this->set(['res'=>$res]);
        }


    }
    
    public function viewAction()
    {
        $task = new Main();

        if (isset($_GET['task']))
        {
            $task = R::findOne('task', "WHERE id='{$_GET['task']}'");
        }

        if (isset($_POST['edit']))
        {
            $task = R::load('task', $_POST['id']);
            $task->text = $_POST['text'];
            if ($_POST['check'] == 'on') $task->status = 'Решено';
            if ($_POST['check'] == '') $task->status = 'Не решено';
            $id = R::store($task);

            echo "<div class='text-center alert-success'>Изменено!</div>";
        }

        $this->set(['task'=>$task]);
    }

    public function reviewAction()
    {
        $task = new Main();

            $res = "
                <hr>
                <h1>Предварительный просмотр</h1><br><br>
                <div class='col-md-4'>
                    <img src='{$_POST['img']}' alt='img' width='100%'>
                </div>
                <div class='col-md-8'>
                    <h4>Пользователь: {$_POST['name']}</h4>
                    <h4>Email пользователя: {$_POST['email']}</h4>
                    <h3>Задача</h3>
                    <p>{$_POST['text']}</p>
                </div>
            ";

        $this->loadView('index', ['res'=>$res]);
        die;
    }


}