<?php
    session_start();
    include_once 'get_data.php';

    $message = $_POST['message'];
    $channel = $_POST['channel'];
    $messageType = $_POST['message-type'];
    $tag = $_POST['tag'];

    if (exec_query('SELECT * FROM Channels WHERE name = ' . add_quotes($channel))->num_rows == 0)
    {
        createChannel($channel, $_SESSION['userId']);
    }
    if (exec_query('SELECT * FROM Hashtags WHERE name = ' . add_quotes($tag))->num_rows == 0)
    {
        createTag($tag);
    }
    $channelId = exec_query('SELECT * FROM Channels WHERE name = ' . add_quotes($channel))->fetch_assoc()['id'];
    $tagId = exec_query('SELECT * FROM Hashtags WHERE name = ' . add_quotes($tag))->fetch_assoc()['id'];
    $isPrivate = 0;
    if ($messageType == 'private')
        $isPrivate = 1;
    try {
        post_message($message, $tagId, $_SESSION['userId'], $channelId, $isPrivate);
    } catch (Exception $e) {
    }
    header('Location: ../search.php');
