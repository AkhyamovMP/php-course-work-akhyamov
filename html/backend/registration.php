<?php

    session_start();

    include_once 'db_tools.php';
    include_once 'data.php';

    $type = $_POST['type'];
    $username = $_POST['username'];
    $login = $_POST['email'];
    $pswd= $_POST['password'];

    if ($type == 'reg')
    {
        if (exec_query('SELECT * FROM Users WHERE email = ' . add_quotes($login))->num_rows > 0)
            header('Location: ../index.php');
        else
        {
            addUser($username, $login, $pswd);
            $_SESSION['userId'] = exec_query('SELECT * FROM Users WHERE email = ' . add_quotes($login))->fetch_assoc()['id'];
            $_SESSION['username'] = $username;
            $_SESSION['login'] = $login;
            header('Location: ../main.php');
        }
    }
    else
    {
        $userInDb = exec_query('SELECT * FROM Users WHERE email = ' . add_quotes($login));
        if ($userInDb->num_rows < 1)
            header('Location: ../index.php');
        else
        {
            $row = $userInDb->fetch_assoc();
            if ($pswd != $row['password'])
            header('Location: ../index.php');
            else{
                $_SESSION['userId'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['login'] = $login;
                header('Location: ../main.php');
            }
        }
    }
