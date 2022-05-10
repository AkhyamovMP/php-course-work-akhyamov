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
                    <textarea class="form-control modal-message-text" style="height: 200px" id="message-text name="message"
                              v-model="newImageSource"
                              placeholder="Simple wine cake. This cake was sent home from our children's school. It is the simplest, best-tasting cake I've ever made. Great to make with the kids, especially for cupcakes."></textarea>
                    <div class="input-wrapper d-flex">
                        <div class="d-flex justify-content-center" style="width: 70px">
                            <label for="tag">tag</label>
                        </div>
                        <input id="tag" list="tags" name="tag">
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
                        <input id="channel" list="channels" name="channel">
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
                        <button type="submit" class="btn btn-primary" data-mdb-dismiss="modal">Add</button>
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
        <form method="post" action="./results.php">
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

<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
<script src="./script/script.js"></script>
</body>

</html>