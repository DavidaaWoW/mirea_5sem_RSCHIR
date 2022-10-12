<html lang="en">

<head>
    <title>Hello world page</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<script src="car-service.js"></script>

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
            $mysqli = new mysqli("db", "root", "1", "RSCHIR5");
            $result = $mysqli->query("SELECT * FROM car WHERE brandId={$_GET['brand']}");
            foreach ($result as $row) {
                echo "<div class=\"col-sm-6\">";
                echo "<div class=\"card text-center\" style= \"padding:20px; max-width:400px; margin-bottom: 50px;\">";
                echo "<img src={$row['image']} class=\"card-img-top mx-auto\" alt=... style=\"width:300px; height: 200px;\">";
                echo "<div class=card-body>";
                echo "<h5 class=card-title>{$row['name']}</h5>";
                echo "<button onclick=\"edit({$row['ID']}, '{$row['name']}')\" class=\"btn btn-success\" style=\"height: 40px; margin-left: 5px\" data-bs-toggle=\"modal\" data-bs-target=\"#staticBackdrop\"> <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-pencil-square\" viewBox=\"0 0 16 16\">
                <path d=\"M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z\" />
                <path fill-rule=\"evenodd\" d=\"M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z\" />
            </svg></button>";
                echo "<button onclick=\"delete_({$row['ID']})\" class=\"btn btn-danger\" style=\"height: 40px; margin-left: 5px\"> <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-trash3-fill\" viewBox=\"0 0 16 16\">
                <path d=\"M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z\"/>
              </svg> </button>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }

            ?>
        </div>
    </div>
    <div class="sub-container" style="display: flex; justify-content: center; align-items:center; margin-top: 50px;">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="margin-right: 10px" onclick="edit()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
            </svg>
            Add
        </button>
        <button type="button" class="btn btn-outline-danger" onclick="deleteAll_()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill align-middle" viewBox="0 0 16 16">
                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
            </svg>
            Delete all
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Новое название</h5>
                    <input type="text" id="inp1" class="input-group" style="max-width: 300px; margin-bottom: 10px">
                    <h5>Новое изображение</h5>
                    <input type="text" id="inp2" class="input-group" style="max-width: 300px;">
                    <div id="text_"></div>
                </div>
                <div class="modal-footer mx-auto">
                    <button type="button" id="accept" class="btn btn-primary" onclick="submit()">Обновить</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Отмена</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        let id_ = "";
        let name_ = "";
        let state = 0;

        function edit(id, name) {
            let label = document.getElementById("staticBackdropLabel");
            let btn = document.getElementById("accept");
            if (id) {
                label.innerHTML = "Изменить " + name;
                btn.innerHTML = "Изменить";
                id_ = id;
                name_ = name;
                state = 1;
            } else {
                label.innerHTML = "Добавить машину";
                btn.innerHTML = "Добавить";
                state = 0;
            }
        }

        function submit() {
            let text_ = document.getElementById("text_");
            let newName = document.getElementById("inp1");
            let newLogo = document.getElementById("inp2");
            const QueryString = window.location.search;
            const urlParams = new URLSearchParams(QueryString);
            if (state == 1) {
                text_.innerHTML = updateCar(id_, newName.value, newLogo.value);
            } else if (state == 0) {
                text_.innerHTML = addCar(newName.value, newLogo.value, urlParams.get("brand"));
            }
            window.location.reload();

        }

        function delete_(id) {
            deleteCar(id);
            window.location.reload();
        }

        function deleteAll_() {
            deleteAll();
            window.location.reload();
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>