<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul anzeigen | FST</title>
</head>

<body style="background-color:#1E90FF">
    <?php
    require __DIR__ . "/global/navBar.html"; //NavBar hinzufügen
    require_once "../mysql.inc.php";
    try {
        $dsn = "mysql:host=$db_host;dbname=$db_name;";
        $pdo = new PDO($dsn, $db_user, $db_pwd);
    } catch (PDOException $er) {
        echo "Failed: " . $er;
    }

    $stmt = $pdo->prepare('S');
    ?>
</body>

</html>