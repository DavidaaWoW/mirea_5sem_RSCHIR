<?php session_start() ?>

<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body style="display: flex; align-items:center; flex-direction: column;">
    <h1>Вход</h1>
    <form action="dynamic3.php" method="post" style="max-width: 1000px">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Почта</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="form_mail">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="form_pass">
        </div>
        <button type="submit" class="btn btn-primary" style="margin-right: 4em;">Вход</button> <a href="/dynamic4.php">Регистрация</a>
    </form>
</body>
<?php

$redis = new Redis();
$redis->connect(
    'redis',
    6379
);

include 'protectionScript.php';
$redis->close();
?>

</html>