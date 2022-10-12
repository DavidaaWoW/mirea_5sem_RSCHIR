<?php
session_start();
include 'protectionScript.php'; ?>

<html lang="en">


<head>
    <title>Hello world page</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<script src='work_with_session.php'></script>

<body style="display: flex; align-items:center; flex-direction: column;" onload="_init()" id="body">
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
        <div class="row" style="margin-top: 5em;">
            <?php
            $mysqli = new mysqli("db", "root", "1", "RSCHIR5");
            $result = $mysqli->query("SELECT * FROM brand");
            foreach ($result as $row) {
                echo "<div class=\"col-sm-6\">";
                echo "<div class=\"card\" style= \"padding:20px; max-width:400px;\">";
                echo "<img src={$row['logo']} class=card-img-top alt=... style=width:300px;>";
                echo "<div class=card-body>";
                echo "<h5 class=card-title>{$row['name']}</h5>";
                echo "<a href=/dynamic2.php?brand={$row['ID']} class=\"btn btn-primary cardListBtn\">Список авто</a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</body>

</html>