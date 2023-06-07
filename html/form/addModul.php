<?php
require_once "../../mysql.inc.php";

try {
    $stmt = $pdo->prepare('INSERT INTO `module` (`Modu`, `Mstd`, `Lid`, `Rnr`) VALUES (:name, :stunden, :lehrer, :raum)');
    $stmt->bindParam(':name', $_POST['modul-name']);
    $stmt->bindParam(':stunden', $_POST['modul-stunden']);
    $stmt->bindParam(':lehrer', $_POST['modul-lehrer']);
    $stmt->bindParam(':raum', $_POST['modul-raum']);
    $stmt->execute();
} catch (PDOException $ex) {
    echo $ex;
}

header("Location: ../modBea.php");
