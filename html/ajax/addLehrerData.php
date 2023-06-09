<?php
require_once "../../mysql.inc.php";

// Get the values from $_POST
$lname = $_POST['Lname'];
$lvname = $_POST['Lvname'];

// Perform the database insert
$sql = "INSERT INTO lehrer (Lname, Lvname) VALUES (:lname, :lvname)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':lname', $lname);
$stmt->bindParam(':lvname', $lvname);
$stmt->execute();

// Handle the success or error response
if ($stmt->rowCount() > 0) {
    // Insert successful
    echo "Insert successful";
} else {
    // Insert failed
    echo "Insert failed";
}
