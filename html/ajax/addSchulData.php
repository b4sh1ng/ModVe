<?php
require_once "../../mysql.inc.php";

// Get the values from $_POST
$name = $_POST['sname'];
$vorname = $_POST['svname'];
$gebd = $_POST['gebd'];
$str = $_POST['str'];
$plz = $_POST['plz'];
$ort = $_POST['ort'];

// Perform the database insert
$sql = "INSERT INTO schueler (Sname, Svname, gebd, Str, PLZ, Ort) VALUES (:name, :vorname, :gebd, :str, :plz, :ort)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':vorname', $vorname);
$stmt->bindParam(':gebd', $gebd);
$stmt->bindParam(':str', $str);
$stmt->bindParam(':plz', $plz);
$stmt->bindParam(':ort', $ort);
$stmt->execute();

// Handle the success or error response
if ($stmt->rowCount() > 0) {
    // Insert successful
    echo "Insert successful";
} else {
    // Insert failed
    echo "Insert failed";
}
