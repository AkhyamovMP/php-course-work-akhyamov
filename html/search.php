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
            <a class="navbar-brand" href="../index.php"><?php echo $_SESSION['username']; ?></a>
            <a class="navbar-brand">PHP course work</a>
            <a type="button" class="mt-4 mb-4 btn btn-primary" data-mdb-toggle="modal" href="./index.php" \>
                Log out
            </a>
        </div>
    </nav>
</header>

<!-- modal window -->
<div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLongTitle">Add message</h5>
                <button type="button" class="close" data-mdb-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="./backend/post_message.php">
                    <h6 class="modal-title" id="ModalLongTitle">message text</h6>
                    <textarea class="form-control mb-2" name="message" id="message-text" style="height:10rem;"
                              placeholder="Simple wine cake. This cake was sent home from our children's school. It is the simplest, best-tasting cake I've ever made. Great to make with the kids, especially for cupcakes."></textarea>
                    <div class="input-wrapper d-flex">
                        <div class="d-flex justify-content-center" style="width: 70px">
                            <label for="tag">tag</label>
                        </div>
                        <input id="tag" list="tags" name="tag" required>
                        <datalist id="tags">

                            <?php

                            $tags = getTags();
                            for ($n = 0; $n < count($tags); $n++) {
                                echo '<option value="' . $tags[$n] . '">'; // Вывод уже существующих тегов
                            }
                            ?>

                        </datalist>
                    </div>
                    <div class="input-wrapper d-flex">
                        <div class="d-flex justify-content-center" style="width: 70px">
                            <label for="channel">channel</label>
                        </div>
                        <input id="channel" list="channels" name="channel" required>
                        <datalist id="channels">

                            <?php
                            $channels = getChannels();
                            for ($n = 0; $n < count($channels); $n++) {
                                echo '<option value="' . $channels[$n] . '">'; // Вывод каналов
                            }
                            ?>

                        </datalist>
                    </div>

                    <div class="form-check my-2">
                        <input class="form-check-input" type="radio" name="message-type" id="public" value="public"
                               checked>
                        <label class="form-check-label" for="public">
                            Public message
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="message-type" id="private"
                               value="private">
                        <label class="form-check-label" for="private">
                            Private message
                        </label>
                    </div>
                    <div class="">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center" style="margin-top: 200px">
    <button type="button" class="mt-2 mb-4 btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#ModalCenter">
        Add message
    </button>
</div>

<main class="container d-flex">
    <div class="container">
        <form method="post" action="./search.php">
            <div class="input-group mt-2 mb-4">
                <input type="search" class="form-control rounded" list="tags" placeholder="type a tag"
                       aria-label="Search" aria-describedby="search-addon" name="tag"/>
                <datalist id="tags">
                    <?php
                    $tags = getTags();
                    for ($n = 0; $n < count($tags); $n++) {
                        echo '<option value="' . $tags[$n] . '">'; // Вывод уже существующих тегов и "областей знаний"
                    }
                    ?>
                </datalist>
            </div>

            <div class="input-group mt-2 mb-4">
                <input type="search" class="form-control rounded" list="topics" placeholder="type a topic"
                       aria-label="Search" aria-describedby="search-addon" name="topic"/>
                <datalist id="topics">
                    <?php
                    $topics = getTopics();
                    for ($n = 0; $n < count($topics); $n++) {
                        echo '<option value="' . $topics[$n] . '">'; // Вывод уже существующих тегов и "областей знаний"
                    }
                    ?>
                </datalist>
            </div>

            <div class="input-group mt-2 mb-4">
                <input type="search" class="form-control rounded" list="channels" placeholder="type a channel"
                       aria-label="Search" aria-describedby="search-addon" name="channel"/>
                <datalist id="channels">

                    <?php
                    $channels = getChannels();
                    for ($n = 0; $n < count($channels); $n++) {
                        echo '<option value="' . $channels[$n] . '">'; // Вывод уже существующих тегов
                    }
                    ?>

                </datalist>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
    </div>
</main>
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
        <div class="mt-3 border border_2 d-flex card" >
            <div class="border border_2 d-flex w-22 card-body">
                <?php echo $messages[$n]['body'] ?>
            </div>
            <div><?php echo 'User: ' . $messages[$n]['username'] ?></div>
            <div><?php echo 'in ' . $messages[$n]['channel'] ?></div>
            <div><?php echo ' #' . $messages[$n]['hashtag'] ?></div>
            <div><?php echo 'at ' . $messages[$n]["dispatch_time"] ?></div>
        </div>
    <?php endfor; ?>
</div>


<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
<script src="./script/script.js"></script>
</body>

</html>