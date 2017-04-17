<div class="container">
    <div id="add-task">
        <h2>Добавить задачу</h2>

        <form action="/task" method="post" enctype="multipart/form-data" id="form-task">
            <div class="form-group">
                <label for="name">Имя:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name']?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']?>">
            </div>
            <div class="form-group">
                <label for="text">Условие задачи:</label>
                <textarea name="text" id="text" class="form-control" rows="5"> <?php if (isset($_POST['text'])) echo $_POST['text']?></textarea>
            </div>
            <div class="upload-file-container form-group">
                <img id="image" src="#" alt="" width="200px" />
                <div class="upload-file-container-text">
                    <input type="file" name="pic" class="photo" id="img" />
                </div>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-default" id="review">Просмотреть</button>
                <button type="submit" class="btn btn-success" name="task">Добавить</button>
            </div>
        </form>
    </div>

    <div id="block-review"></div>
</div>

<?php if (isset($res)) echo $res; ?>
