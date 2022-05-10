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
    <title>PHP course work login page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./style/style.css">
</head>

<body class="container">
    <header class="px-2">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid d-flex justify-content-center">
                <span class="navbar-brand">PHP course work</span>
            </div>
        </nav>
    </header>


    <section class="login-section">
        <!-- Pills navs -->
        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                <form method="post" action="./backend/registration.php">

                    <div class="form-outline mb-4">
                        <input type="email" id="loginUsername" name="email" class="form-control" />
                        <label class="form-label" for="loginUsername">Login (email)</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="password" id="loginPassword" name="password" class="form-control" />
                        <label class="form-label" for="loginPassword">Password</label>
                    </div>
                    <input type="text" name="type" value="log" style="display: none;">
                    <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

                </form>
            </div>
            <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                <form method="post" action="./backend/registration.php">

                    <div class="form-outline mb-4">
                        <input type="text" id="registerUsername" name="username" class="form-control" />
                        <label class="form-label" for="registerUsername">New username</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="email" id="registerUsername" name="email" class="form-control" />
                        <label class="form-label" for="registerUsername">Email</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="password" id="registerPassword" name="password" class="form-control" />
                        <label class="form-label" for="registerPassword">Create password</label>
                    </div>

                    <input type="text" name="type" value="reg" style="display: none;">
                    <button type="submit" class="btn btn-primary btn-block mb-3">Sign Up</button>
                </form>
            </div>
        </div>
    </section>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>

</body>

</html>