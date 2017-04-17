<div class="container">
    <h2>Список задач</h2>
    <div class="table-responsive">
        <table class="table table-striped task-table tablesorter" id="myTable">
            <thead>
            <tr>
                <th>Имя</th>
                <th>Email</th>
                <th>Статус</th>
                <th>Просмотр</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($task as $k => $v)
            {
                echo "<tr>
                <td>{$v['username']}</td>
                <td>{$v['email']}</td>
                <td>{$v['status']}</td>
                <td><a href='/task/view?task={$v['id']}'>Посмотреть</a></td>
            </tr>
                ";
            }
            ?>

            </tbody>
        </table>
    </div>
    <div class="text-center pagin">
    <?php
    for ($i=1; $i<=$total; $i++)
    {
        echo "<a href='/main?page={$i}' class='link'>{$i}</a>";
    }
    ?>
    </div>
</div>