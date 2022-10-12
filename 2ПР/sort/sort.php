<html lang="en">

<head>
    <title>Hello world page</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>
    <div class="flex">
        <div>
            <h1>Изначальный массив</h1>
            <table>
                <?php

                try {
                    $str = $_GET["array"];
                } catch (Exception $e) {
                    $str = "";
                }

                $arr = explode(",", $str);
                echo "<tr>";
                foreach ($arr as $row) {
                    echo "<td>{$row}</td>";
                }
                echo "</tr>";

                ?>
            </table>
        </div>
        <div>
            <h1>Отсортированный массив</h1>
            <table>
                <?php include 'script.php';

                try {
                    $str = $_GET["array"];
                } catch (Exception $e) {
                    $str = "";
                }

                $arr = explode(",", $str);
                $arr = selectionSort($arr);
                echo "<tr>";
                foreach ($arr as $row) {
                    echo "<td>{$row}</td>";
                }
                echo "</tr>";

                ?>
            </table>
        </div>
    </div>
</body>

</html>