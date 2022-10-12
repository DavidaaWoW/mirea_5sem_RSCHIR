<?php
if (isset($_POST['form_mail'])) {
    $connection = new mysqli("db", "root", "1", "RSCHIR5");
    $result = $connection->query("SELECT * FROM user WHERE email=\"{$_POST['form_mail']}\"");
    $row = $result->fetch_assoc();
    $redis = new Redis();
    $redis->connect(
        'redis',
        6379
    );
    if ($row && password_verify($_POST['form_pass'], $row['passwordHash'])) {
        $_SESSION['user_id'] = $row['ID'];
        $sessionData = $redis->get($row['ID']);
        $sessionData = json_decode($sessionData);
        $_SESSION['theme'] = $sessionData->{'theme'};
        $_SESSION['language'] = $sessionData->{'language'};
        //var_dump($_SESSION);
        $location = "Location: http://" . $_SERVER['HTTP_HOST'] . ":82" . ($_SERVER['REQUEST_URI'] == "/dynamic3.php" || "/dynamic4.php" ? "/dynamic1.php" : $_SERVER['REQUEST_URI']);
        header($location);
    } else {
        header("Refresh:0");
    }
    exit;
}

if ($_SERVER['REQUEST_URI'] == "/logout.php") {
    session_start();
    unset($_SESSION['user_id']);
    session_destroy();
    header("Location: http://" . $_SERVER['HTTP_HOST'] . (strpos($_SERVER['HTTP_HOST'], ":82") !== false ? "/dynamic3.php" : ":82/dynamic3.php"));
    exit;
}

if (!isset($_SESSION['user_id']) && ($_SERVER['REQUEST_URI'] != "/dynamic4.php" && $_SERVER['REQUEST_URI'] != "/dynamic3.php")) {
    header("Location: http://" . $_SERVER['HTTP_HOST'] . ":82/dynamic3.php");
    exit;
}
