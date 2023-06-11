<?php
require_once "../../mysql.inc.php";

$snr = $_POST['snr'];

$sqlCheck = "SELECT * from modulzuordnung WHERE Snr=:snr";
$stmtCheck = $pdo->prepare($sqlCheck);
$stmtCheck->bindParam(':snr', $snr);
$stmtCheck->execute();

if ($stmtCheck->rowCount() > 0) {
    // There are rows in modulzurodnung table with the specified Snr
    $response = "Löschen nicht möglich: Der Schüler belegt ein oder mehrere Module";
} else {
    $sql = "DELETE FROM schueler WHERE Snr=:snr";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':snr', $snr);
    $stmt->execute();
    $response = "Löschen Erfolgreich";
}
echo $response;
