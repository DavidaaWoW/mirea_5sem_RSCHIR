<?php
session_start();
$redis = new Redis();
$redis->connect(
    'redis',
    6379
);

$form_mail = $_POST['form_mail'];
$form_pass = $_POST['form_pass'];

$hashPass = password_hash($form_pass, PASSWORD_DEFAULT);


if ($form_mail && $form_pass) {
    $id = uniqid();
    $mysqli = new mysqli("db", "root", "1", "RSCHIR5");
    $query = "INSERT INTO user (ID, email, passwordHash) VALUES (\"{$id}\", \"{$form_mail}\", \"{$hashPass}\")";
    $result = $mysqli->query($query);
    $json = json_encode(array('mail' => $form_mail, 'pass' => $hashPass, 'theme' => "light", 'language' => "russian"));
    $redis->set($id, $json);
}
include 'protectionScript.php';
$redis->close();
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body style="display: flex; align-items:center; flex-direction: column;">
    <h1>Регистрация</h1>
    <form action="dynamic3.php" method="post" style="max-width: 1000px">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Почта</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="form_mail" id="mail">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="form_pass" id="pass">
        </div>
        <button type="submit" class="btn btn-primary" style="margin-right: 4em;" onclick="register()">Регистрация</button> <a href="/dynamic4.php">Вход</a>
    </form>
</body>

</html>