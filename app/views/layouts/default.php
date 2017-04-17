<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php \vendor\core\base\View::getMeta() ?>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="/js/jquery-latest.js"></script>
    <script src="/js/jquery.tablesorter.min.js"></script>
    <script src="/js/script.js"></script>

</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="/">Главная</a></li>
                <li><a href="/task">Добавить задачу</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (isset($_SESSION['login']))
                {
                    echo "<li style='color: #fff;'>Привет {$_SESSION['login']} <a href='/login/logout' class='exit'>Выход</a></li>";
                }
                else
                {
                    echo '<li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Вход</a></li>';
                }
                ?>

            </ul>
        </div>
    </div>
</nav>

    <? echo $content ?>


<script>
    $(document).ready(function(){
        $("#myTable").tablesorter();
    });
</script>
<?php
foreach ($scripts as $script)  //цикл выводит все скрипты перед закрывающим тегом body, которые находятся в виде(сделано для того чтобы скрипты вставлялись после jQuery и других скриптов)
{
    echo $script;
}
?>
</body>
</html>