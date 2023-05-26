<?php
$db_host = "localhost";
$db_user = "inf21";
$db_pwd = "test1";
$db_name = "ot";

try {
        $dsn = "mysql:host=$db_host;dbname=$db_name;";
        $pdo = new PDO($dsn, $db_user, $db_pwd);
    } catch (PDOException $er) {
        echo "Failed: " . $er;
    }
?>