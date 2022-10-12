<html lang="en">

<head>
    <title>Hello world page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body style="display: flex; align-items:center; flex-direction: column;">
    <div class="container" style="max-width: 1000px;">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Супер Авто</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="static1.html">О нас</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="dynamic1.php">Бренды</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="static2.html">Контакты</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row" style="margin-top: 5em;">
            <?php
            $mysqli = new mysqli("db", "root", "1", "RSCHIR3");
            $result = $mysqli->query("SELECT * FROM car WHERE brandId={$_GET['brand']}");
            foreach ($result as $row) {
                echo "<div class=\"col-sm-6\">";
                echo "<div class=\"card\" style= \"padding:20px; max-width:400px;\">";
                echo "<img src={$row['image']} class=card-img-top alt=... style=width:300px;>";
                echo "<div class=card-body>";
                echo "<h5 class=card-title>{$row['name']}</h5>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }

            ?>
        </div>
    </div>
</body>

</html>