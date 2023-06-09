<?php
require_once "../../mysql.inc.php";

try {
    $stmt = $pdo->prepare('DELETE FROM `modulzuordnung` WHERE `Modnr` = :modnr AND `Snr` = :snr');
    $stmt->bindParam(':modnr', $_POST['remove-modulzu']);
    $stmt->bindParam(':snr', $_POST['remove-snr']);
    $stmt->execute();
} catch (PDOException $ex) {
    echo $ex;
}

header("Location: ../modZuBea.php");
