<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once 'connect.php';
    $link = db_connect();
    $person = get_id($link, $id);
}
else{
    header("Location: index.php");
    exit;
} 

if(isset($_POST['submit']))
{
    $f_name = $_POST['f_name'];
    $name = $_POST['name'];
    $l_name = $_POST['l_name'];
    
    $query = sprintf("UPDATE `people` SET `f_name` = '$f_name', `name` = '$name', `l_name` = '$l_name' WHERE `people`.`id` = $id");
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
            <input type="text" name="f_name" value="<?=$person['f_name']?>"><br>
            Имя:<br>
            <input type="text" name="name" value="<?=$person['name']?>"><br>
            Отчество:<br>
            <input type="text" name="l_name" value="<?=$person['l_name']?>"><br>
            <input type="submit" name="submit">
        </form>
    </body>
</html>