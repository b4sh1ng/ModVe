<?php
require_once "../../mysql.inc.php";

try {
    $stmt = $pdo->prepare('INSERT INTO `modulzuordnung` (`Modnr`, `Snr`) VALUES (:modnr, :snr)');
    $stmt->bindParam(':modnr', $_POST['add-modulzu']);
    $stmt->bindParam(':snr', $_POST['add-modulzu-snr']);
    $stmt->execute();
} catch (PDOException $ex) {
    echo $ex;
}

header("Location: ../modZuBea.php");
