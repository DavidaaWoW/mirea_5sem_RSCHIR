<?php
session_start();
$connection = new mysqli("db", "root", "1", "RSCHIR5");
$result = ($connection->query("SELECT * FROM user WHERE ID=\"{$_SESSION['user_id']}\""))->fetch_assoc();

header("Content-length: {$result['size']}");
header("Content-type: {$result['filetype']}");
header("Content-Disposition: attachment; filename={$result['filename']}");
ob_clean();
flush();
echo $result['driversLicencePDF'];
