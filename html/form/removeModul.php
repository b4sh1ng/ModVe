<?php
require_once "../../mysql.inc.php";

try {
    $stmt = $pdo->prepare('DELETE FROM `module` WHERE `Modnr` = :modnr');
    $stmt->bindParam(':modnr', $_POST['remove-modul']);

    $stmt->execute();
} catch (PDOException $ex) {
    echo $ex;
}

header("Location: ../modBea.php");
