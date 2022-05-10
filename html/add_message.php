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
    <link rel="stylesheet" href="./style.scss">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet">
    <title>Docker PHP template</title>
</head>



<body>
    <header class="px-2">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid d-flex justify-content-between">
                <div class="d-flex">
                    <a class="navbar-brand" href="../index.php"><?php echo $_SESSION['username']; ?></a>
                    <a type="button" class="mt-3 mb-3 btn btn-primary" href="./search.php">back to all messages</a>
                </div>
                <a type="button" class="mt-4 mb-4 btn btn-primary" data-mdb-toggle="modal" href="./index.php" \>
                    Log out
                </a>
            </div>
        </nav>
    </header>


    <main class="container d-flex mt-10">

        <div class="container">

            <h2>Add message</h2>

            <form method="post" action="./backend/post_message.php">
                <!-- Поставить то, что нужно -->
                <label for="message-text" class="mt-2">message text</label>
                <textarea class="form-control mb-2" name="message" id="message-text" style="height:10rem;" placeholder="Simple wine cake. This cake was sent home from our children's school. It is the simplest, best-tasting cake I've ever made. Great to make with the kids, especially for cupcakes."></textarea>
                <label for="tag">tag</label>
                <input id="tag" list="tags" name="tag" placeholder="cake">

                <datalist id="tags">

                    <?php

                    $tags = getTags();
                    for ($n = 0; $n < count($tags); $n++) {
                        echo '<option value="' . $tags[$n] . '">'; // Вывод уже существующих тегов
                    }
                    ?>

                </datalist>

                <label for="channel">channel</label>
                <input id="channel" list="channels" name="channel" placeholder="default channel">

                <datalist id="channels">

                    <?php
                    $channels = getChannels();
                    for ($n = 0; $n < count($channels); $n++) {
                        echo '<option value="' . $channels[$n] . '">'; // Вывод каналов
                    }
                    ?>

                </datalist>

                <div class="form-check my-2">
                    <input class="form-check-input" type="radio" name="message-type" id="public" value="public" checked>
                    <label class="form-check-label" for="public">
                        Public message
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="message-type" id="private" value="private">
                    <label class="form-check-label" for="private">
                        Private message
                    </label>
                </div>
                <div class="">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
    </main>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>

    <script src="./script/script.js"></script>
</body>

</html>