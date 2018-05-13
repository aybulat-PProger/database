<?php
define('MYSQL_SERVER', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', '');
define('MYSQL_DB', 'database');

function db_connect()
{
    $link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB)
            or die("Error: ". mysqli_error($link));
    if(!mysqli_set_charset($link, "utf8")){
        printf("Error: ".mysqli_error($link));
    }
    return $link;
}

function get_id($link, $id)
{
    $query = sprintf("SELECT * FROM people WHERE id=%d",(int)$id);
    $result = mysqli_query($link, $query);

    if(!$result)
    {
        die(mysqli_error($link));
    }

    $person = mysqli_fetch_assoc($result);

    return $person;
}