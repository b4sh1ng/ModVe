<?php
require_once "../../mysql.inc.php";

// Get the values from $_POST
$lname = $_POST['lname'];
$lvname = $_POST['lvname'];

// Perform the database insert
$sql = "INSERT INTO lehrer (Lname, Lvname) VALUES (:lname, :lvname)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':lname', $lname);
$stmt->bindParam(':lvname', $lvname);
$stmt->execute();

// Handle the success or error response
if ($stmt->rowCount() > 0) {
    // Insert successful
    $response = "Hinzufügen Erfolgreich";
} else {
    // Insert failed
    $response = "Hinzufügen Fehlgeschlagen";
}
echo $response;
