<?php
require_once "../../mysql.inc.php";

// Get the updated values from $_POST
$snr = $_POST['snr'];
$name = $_POST['sname'];
$vorname = $_POST['svname'];
$gebd = $_POST['gebd'];
$str = $_POST['str'];
$plz = $_POST['plz'];
$ort = $_POST['ort'];

// Perform the database update
$sql = "UPDATE schueler SET Sname = :name, Svname = :vorname, gebd = :gebd, Str = :str, PLZ = :plz, Ort = :ort WHERE Snr = :snr";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':vorname', $vorname);
$stmt->bindParam(':gebd', $gebd);
$stmt->bindParam(':str', $str);
$stmt->bindParam(':plz', $plz);
$stmt->bindParam(':ort', $ort);
$stmt->bindParam(':snr', $snr);
$stmt->execute();

// Handle the success or error response
if ($stmt->rowCount() > 0) {
    // Insert successful
    $response = "Bearbeiten Erfolgreich";
} else {
    // Insert failed
    $response = "Bearbeiten Fehlgeschlagen";
}
echo $response;
