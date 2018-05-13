<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require_once 'connect.php';
            $link = db_connect();
            $query = "SELECT * FROM people ORDER BY id DESC";
            $result = mysqli_query($link, $query);
            if (!$result) 
            {
                die(mysqli_error($link));
            }
            
            $n = mysqli_num_rows($result);
            $people = array();
            
            for($i = 1; $i <= $n; $i++)
            {
                $row = mysqli_fetch_assoc($result);
                $people[] = $row;
            }
            
        ?>
            <a href="insert.php">Добавить</a>
        <?php
            foreach ($people as $p)
            {
        ?>
        <div style="border-bottom: 1px solid black">
            <b>ID:</b> <?=$p['id']?><br>
            <b>Фамилия:</b> <?=$p['f_name']?><br>
            <b>Имя:</b> <?=$p['name']?><br>
            <b>Отчество:</b> <?=$p['l_name']?><br>
            
            <a href="delete.php?id=<?=$p['id']?>">Удалить</a>
            <a href="update.php?id=<?=$p['id']?>">Изменить</a>
        </div>
        <?php
            }
        ?>
    </body>
</html>
