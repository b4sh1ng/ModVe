<?php
require_once "../../mysql.inc.php";

$snr = $_POST['snr'];

$sql = "DELETE FROM schueler WHERE Snr=:snr";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':snr', $snr);
$stmt->execute();

// Handle the success or error response
if ($stmt->rowCount() > 0) {
    // Deletion successful
    echo "Deletion successful";
} else {
    // Deletion failed
    echo "Deletion failed";
}
