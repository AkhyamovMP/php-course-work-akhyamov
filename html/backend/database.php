<?php

function add_quotes($string)
{
    return '\'' . $string . '\'';
}

function get_connection()
{
    $host = 'mysql';
    $user = 'root';
    $pswd = 'root';
    $db_name = 'sorter';

    $conn = new mysqli($host, $user, $pswd, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function exec_query($sql)
{
    $connection = get_connection();
    $result = $connection->query($sql);
    $connection->close();
    return $result;
}

function print_result($result)
{
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            print_r($row);
            echo('<br>');
        }
    } else {
        echo "0 results";
    }
}
