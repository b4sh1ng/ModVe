<?php
require_once "../../mysql.inc.php";

$lid = $_POST['lid'];

$sqlCheck = "SELECT * from module WHERE Lid=:lid";
$stmtCheck = $pdo->prepare($sqlCheck);
$stmtCheck->bindParam(':lid', $lid);
$stmtCheck->execute();

if ($stmtCheck->rowCount() > 0) {
    // There are rows in modulzurodnung table with the specified Snr
    $response = "Löschen nicht möglich: Der Lehrer bietet ein oder mehrere Module an";
} else {
    $sql = "DELETE FROM lehrer WHERE Lid=:lid";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':lid', $lid);
    $stmt->execute();
    $response = "Löschen Erfolgreich";
}
echo $response;
