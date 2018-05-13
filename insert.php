<?php
if(isset($_POST['submit'])){
        $f_name = $_POST['f_name'];
        $name = $_POST['name'];
        $l_name = $_POST['l_name'];
        require_once 'connect.php';
        $link = db_connect();
        $query = sprintf("INSERT INTO `people` (`id`, `f_name`, `name`, `l_name`) VALUES (NULL, '$f_name', '$name', '$l_name');");
            $result = mysqli_query($link, $query);

            if(!$result)
            {
                die(mysqli_error($link));
            }
        header("Location: index.php");
        exit;
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="post">
            Фамилия:<br>
            <input type="text" name="f_name"><br>
            Имя:<br>
            <input type="text" name="name"><br>
            Отчество:<br>
            <input type="text" name="l_name"><br>
            <input type="submit" name="submit">
        </form>
    </body>
</html>
