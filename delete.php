<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once 'connect.php';
    $link = db_connect();
    $query = sprintf("DELETE FROM people WHERE id=%d",(int)$id);
        $result = mysqli_query($link, $query);

        if(!$result)
        {
            die(mysqli_error($link));
        }
    header("Location: index.php");
    exit;
}

