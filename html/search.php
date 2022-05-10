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


<div class="d-flex justify-content-center add-link">
    <a type="button" class="mt-2 mb-4 btn btn-primary" href="./add_message.php">
        Add message
    </a>
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

            <label for="channel">Channel: </label>
            <input id="channel" list="channels" name="channel" placeholder="default channel">

            <datalist id="channels">

                <?php
                $channels = getChannels();
                for ($n = 0; $n < count($channels); $n++) {
                    echo '<option value="' . $channels[$n] . '">'; // Вывод уже существующих тегов
                }
                ?>

            </datalist>

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