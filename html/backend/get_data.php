<?php

include_once 'database.php';


function getTopics()
{
    $result = exec_query('SELECT title FROM Topics;');
    $res = [];
    while ($row = $result->fetch_assoc()) {
        $res[] = $row['title'];
    }
    return $res;
}


function getChannels()
{
    $result = exec_query('SELECT name from Channels;');
    $res = [];
    while ($row = $result->fetch_assoc()) {
        $res[] = $row['name'];
    }
    return $res;
}


function getTags()
{
    $result = exec_query('SELECT name FROM Hashtags;');
    $res = [];
    while ($row = $result->fetch_assoc()) {
        $res[] = $row['name'];
    }

    return $res;
}


function getMessages($channel = '', $tag = '', $topic = '')
{
    $result = '';
    $mainRequest = '
SELECT body, username, C.name AS channel, H.name AS hashtag, title AS topic, T.id AS topic_id, dispatch_time
FROM Messages
         JOIN Hashtags H ON Messages.hashtag = H.id
         JOIN Users U ON Messages.owner = U.id
         JOIN Channels C ON Messages.channel = C.id
         JOIN TopicHashtags TH ON Messages.hashtag = TH.hashtag
         JOIN Topics T ON TH.topic = T.id '; //Пробел в конце очень важен

    $mainRequestSmall = '
SELECT body, username, C.name AS channel, H.name AS hashtag, dispatch_time
FROM Messages
         JOIN Hashtags H ON Messages.hashtag = H.id
         JOIN Users U ON Messages.owner = U.id
         JOIN Channels C ON Messages.channel = C.id '; //Пробел в конце очень важен

    $res = [];
    if (!$channel && !$tag && !$topic) { // Пустой запрос - вывод всех сообщений
        $result = ($mainRequestSmall);

    } elseif ($channel && !$tag && !$topic) { //Поиск только по каналу
        $result = $mainRequestSmall .
            'WHERE C.id = ' . getChannelByName($channel)->fetch_assoc()['id'];

    } elseif ($channel && $tag && $topic) { //Поиск по каналу, тегу и топику
        $result = $mainRequest .
            'WHERE C.id = ' . getChannelByName($channel)->fetch_assoc()['id'] .
            ' AND T.id = ' . getTopicByName($topic)->fetch_assoc()['id'] .
            ' AND H.id = ' . getTagByName($tag)->fetch_assoc()['id'];

    } elseif ($channel && $tag && !$topic) { //Поиск по каналу и тегу
        $result = $mainRequestSmall .
            'WHERE C.id = ' . getChannelByName($channel)->fetch_assoc()['id'] .
            ' AND H.id = ' . getTagByName($tag)->fetch_assoc()['id'];

    } elseif ($channel && !$tag && $topic) { //Поиск по каналу и топику
        $result = $mainRequest .
            'WHERE C.id = ' . getChannelByName($channel)->fetch_assoc()['id'] .
            ' AND T.id = ' . getTopicByName($topic)->fetch_assoc()['id'];
    } elseif ($tag && !$topic && !$channel) { //Поиск только по тегу
        $result = $mainRequestSmall .
            'WHERE Messages.hashtag = ' . getTagByName($tag)->fetch_assoc()['id'];

    } elseif (!$tag && $topic && !$channel) { //Поиск только по топику
        $result = $mainRequest .
            ' WHERE T.id = ' . getTopicByName($topic)->fetch_assoc()['id'];

    } elseif ($tag && $topic && !$channel) { //Поиск только по топику и тегу
        $result = $mainRequest .
            'WHERE T.id = ' . getTopicByName($topic)->fetch_assoc()['id'] .
            ' AND H.id = ' . getTagByName($tag)->fetch_assoc()['id'];
    }


    if ($result) {
        $result = exec_query($result . ' ORDER BY dispatch_time DESC');
        while ($row = $result->fetch_assoc()) {
            $res[] = $row;
        }
    } else {
        return 0;
    }

    return $res;
}


function addUser($username, $login, $password)
{
    $connection = get_connection();
    $prep = $connection->prepare('INSERT INTO Users (email, username, password) VALUES (?, ?, ?);');
    $prep->bind_param('sss', $login, $username, $password);
    $prep->execute();
    $connection->close();
}

/**
 * @throws Exception
 */
function post_message($body, $hashtag, $owner, $channel, $private = false)
{
    $datetime = (new DateTime("now", new DateTimeZone('Europe/Moscow')))->format('Y-m-d H:i:s');
    $connection = get_connection();
    $prep = $connection->prepare('INSERT INTO Messages (body, dispatch_time, private, hashtag, owner, channel) VALUES (?, ?, ?, ?, ?, ?);');
    $prep->bind_param('ssisss', $body, $datetime, $private, $hashtag, $owner, $channel);
    $prep->execute();
    $connection->close();
}


function getUserById($id)
{
    return exec_query(sprintf('SELECT * FROM Users WHERE id = %d', $id));
}


function getUserByName($name)
{
    return exec_query(sprintf('SELECT * FROM Users WHERE username = \'%s\'', $name));
}


function getChannelByName($name)
{
    return exec_query(sprintf('SELECT * FROM Channels WHERE name = \'%s\'', $name));
}


function getTopicByName($name)
{
    return exec_query(sprintf('SELECT * FROM Topics WHERE title = \'%s\'', $name));
}


function getTagByName($name)
{
    return exec_query(sprintf('SELECT * FROM Hashtags WHERE name = \'%s\'', $name));
}


function createChannel($channel, $userId)
{
    $connection = get_connection();
    $prep = $connection->prepare('INSERT INTO Channels (name, description, owner) VALUES (?, ?, ?);');
    $str = 'Channel without description';
    $prep->bind_param('sss', $channel, $str, $userId);
    $prep->execute();
    $connection->close();
}


function createTag($tag)
{
    $connection = get_connection();
    $prep = $connection->prepare('INSERT INTO Hashtags (name) VALUES (?);');
    $prep->bind_param('s', $tag);
    $prep->execute();
    $connection->close();
}

?>