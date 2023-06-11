<?php
require_once "../../mysql.inc.php";

$lid = $_POST['lid'];

$sql = "DELETE FROM lehrer WHERE Lid=:lid";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':lid', $lid);
$stmt->execute();

// Handle the success or error response
if ($stmt->rowCount() > 0) {
    // Insert successful
    $response = "Löschen Erfolgreich";
} else {
    // Insert failed
    $response = "Löschen Fehlgeschlagen";
}
echo $response;

