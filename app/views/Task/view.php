<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img src="/<?php echo $task['image'] ?>" alt="img" width="100%">
        </div>
        <div class="col-md-8">
            <h4>Пользователь: <?=$task['username']?></h4>
            <h4>Email пользователя: <?=$task['email']?></h4>
            <h3>Задача</h3>
            <?php
            if ($_SESSION['login'] == 'admin')
            {
            ?>
                <form action="/task/view" method="post">
                    <div class="form-group">
                        <textarea name="text" rows="10" class="form-control"><?=$task['text']?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="chek">Решено</label>
                        <input type="checkbox" id="check" name="check">
                        <input type="hidden" name="id" value="<?=$task['id']?>">
                        <button type="submit" class="btn btn-success text-right" name="edit">Изменить</button>
                    </div>
                </form>
            <?php
            }
            else
            {
                echo "<p>{$task['text']}</p>";
            }
            ?>

        </div>
    </div>
</div>