<?php
session_start();
require 'protectionScript.php';
$redis = new Redis();
$redis->connect(
    'redis',
    6379
);
if (isset($_GET['theme_set'])) {
    $_SESSION['theme'] = $_GET['theme_set'];
    $data = json_decode($redis->get($_SESSION['user_id']));
    $data->{'theme'} = $_SESSION['theme'];
    $redis->set($_SESSION['user_id'], json_encode($data));
}
if (isset($_GET['language_set'])) {
    $_SESSION['language'] = $_GET['language_set'];
    $data = json_decode($redis->get($_SESSION['user_id']));
    $data->{'language'} = $_SESSION['language'];
    $redis->set($_SESSION['user_id'], json_encode($data));
}
if (isset($_FILES['formFile'])) {
    $connection = new mysqli("db", "root", "1", "RSCHIR5");

    $filename = $_FILES['formFile']['name'];
    $tmpname = $_FILES['formFile']['tmp_name'];
    $file_size = $_FILES['formFile']['size'];
    $file_type = $_FILES['formFile']['type'];

    $fp      = fopen($tmpname, 'r');
    $content = fread($fp, filesize($tmpname));
    $content = addslashes($content);
    fclose($fp);
    $sql = "UPDATE user SET filename=\"$filename\", filetype=\"$file_type\", size=\"$file_size\", driversLicencePDF=\"$content\" WHERE ID=\"{$_SESSION['user_id']}\"";

    $i = mysqli_query($connection, $sql);
    // $connection->query("SELECT * FROM user WHERE ID=\"{$_SESSION['user_id']}\"")->fetch_assoc();
}
//var_dump($_SESSION);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<script src='work_with_session.php'></script>

<body style="display: flex; align-items:center; flex-direction: column;" id="body" onload="profileInit()">
    <div class="container" style="max-width: 1000px;">
        <nav class="navbar navbar-expand-lg" style="background-color: lightGrey;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#" id="navbarBrand">Супер Авто</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="static1.html" id="navbarAbout">О нас</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="dynamic1.php" id="navbarBrands">Бренды</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="static2.html" id="navbarContacts">Контакты</a>
                        </li>
                    </ul>
                </div>
                <a href="/profile.php"><button class="btn btn-info"><i class="bi bi-person-circle"></i></button></a>
            </div>
        </nav>
        <div id="licence">
            <h1 style="margin:1em;">Ваши водительские права: </h1>
            <a href="/download.php"><button class="btn btn-info" style="margin-left:5em;">Скачать
                </button></a>
        </div>
        <h1 style="margin:1em;" id="setTheme">Set theme:</h1>
        <button class="btn btn-dark" id="btn_dark" style="margin: 1em; margin-left:5em;" onclick="setDarkTheme()"><i class="bi bi-moon"></i></button>
        <button class="btn btn-light" id="btn-white" style="margin: 1em;" onclick="setLightTheme()"><i class="bi bi-brightness-high"></i></button>
        <h1 style="margin: 1em;" id="setLanguage">Set language:</h1>
        <button class="btn btn-secondary" style="margin: 1em; margin-left:5em;" onclick="setRussian()">Русский</button>
        <button class="btn btn-secondary" style="margin: 1em;" onclick="setEnglish()">English</button> <br></br>
        <h1 style="margin: 1em">Загрузить PDF файл с водительской лицензией</h1>
        <form action="profile.php" enctype="multipart/form-data" method="post" style="max-width: 20em; margin-left: 5em">
            <label for="formFile" class="form-label">Default file input example</label>
            <input class="form-control" type="file" id="formFile" name="formFile" style="margin-bottom: 1em;">
            <input type="submit" class="btn btn-success" value="Отправить">
        </form>
        <a href="/logout.php"><button class="btn btn-danger" id="logout" style="margin: 1em; margin-left:5em; margin-top: 5em">Выйти</button></a>
    </div>
</body>

<script>
    let profileInit = () => {
        _init();
        <?php
        $connection = new mysqli("db", "root", "1", "RSCHIR5");
        $responce = ($connection->query("SELECT * FROM user WHERE ID=\"{$_SESSION['user_id']}\""))->fetch_assoc();
        ?>
        let hiddenDiv = document.getElementById("licence");
        if (eval(<?php echo $responce['size'] ?>)) {
            hiddenDiv.style.display = 'block';

        } else {
            hiddenDiv.style.display = 'none';
        }
    }

    let setDarkTheme = () => {
        window.location.href = location.protocol + '//' + location.host + location.pathname + "?theme_set=dark";
    }
    let setLightTheme = () => {
        window.location.href = location.protocol + '//' + location.host + location.pathname + "?theme_set=light";
    }
    let setRussian = () => {
        window.location.href = location.protocol + '//' + location.host + location.pathname + "?language_set=russian";
    }
    let setEnglish = () => {
        window.location.href = location.protocol + '//' + location.host + location.pathname + "?language_set=english";
    }
</script>

</html>