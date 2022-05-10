<?php
session_start();
include './backend/get_data.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet">

    <title>Docker PHP template</title>
</head>

<body>

<header class="px-2">
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <div class="d-flex">
                <a class="navbar-brand" href="../index.php">PHP course work</a>
                <a type="button" class="mt-3 mb-3 btn btn-primary" href="./search.php">back to all messages</a>
            </div>
            <a type="button" class="mt-4 mb-4 btn btn-primary" data-mdb-toggle="modal" href="./index.php" \>
                Log out
            </a>
        </div>
    </nav>
</header>


<div class="mt-7 ps-3 container">
    <?php


    $errors = 0;
    if ($_POST['channel']) { // Если канал существует/несуществует
        $channels = getChannels();
        if (in_array($_POST['channel'], $channels)) {
            $channelInfo = getChannelByName($_POST['channel'])->fetch_assoc();
            echo '<div class="mt-3  border border_2"><p> Hi there, this is channel named</p><h3>' . $channelInfo['name']
                . '</h3></p>' . '<p>Channel description:</p><h4>' . $channelInfo['description'] . '</h4></div>';
        } else {
            echo '<div class="mt-3  border border_2"><h3>There is no channel named "' . $_POST['channel'] .
                '"</h3><p>maybe you made a mistake in your request</p></div>';
            $errors++;
        }
    }

    if ($_POST['tag']) { //Если тега не существует
        $tags = getTags();
        if (!in_array($_POST['tag'], $tags)) {
            echo '<div class="mt-3  border border_2"><h3>There is no tag named "' . $_POST['tag'] .
                '"</h3><p>maybe you made a mistake in your request</p></div>';
            $errors++;
        }
    }

    if ($_POST['topic']) { // Если топик существует
        $topics = getTopics();
        if (in_array($_POST['topic'], $topics)) {
            $topicInfo = getTopicByName($_POST['topic'])->fetch_assoc();
            echo '<div class="mt-3  border border_2"><p>Topic: ' . $topicInfo['title'] . '</p>'
                . '<p>Topic description: ' . $topicInfo['description'] . '</p></div>';
        } else {
            echo '<div class="mt-3  border border_2"><h3>There is no topic named "' . $_POST['topic'] .
                '"</h3><p>maybe you made a mistake in your request</p></div>';
            $errors++;
        }
    }

    if ($errors) {
        return 0;
    }

    $messages = getMessages($_POST['channel'], $_POST['tag'], $_POST['topic']);
    if (!$messages) {
        return 0;
    }
    for ($n = 0; $n < count($messages); $n++): ?>
        <div class="mt-3 border border_2 d-flex">
            <div class="border border_2 d-flex flex-column w-22">
                <div><?php echo 'in ' . $messages[$n]['channel'] ?></div>
                <div><?php echo 'User: ' . $messages[$n]['username'] ?></div>
                <div><?php echo 'at ' . $messages[$n]["dispatch_time"] ?></div>
                <div><?php echo ' #' . $messages[$n]['hashtag'] ?></div>
            </div>
            <div class=" "><?php echo $messages[$n]['body'] ?></div>
        </div>
    <?php endfor; ?>
</div>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
<script src="./script/script.js"></script>
</body>

</html>