<?php
require_once "../../mysql.inc.php";

// Get the updated values from $_POST
$lid = $_POST['lid'];
$lname = $_POST['lname'];
$lvname = $_POST['lvname'];

// Perform the database update
$sql = "UPDATE lehrer SET Lname = :lname, Lvname = :lvname WHERE Lid = :lid";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':lname', $lname);
$stmt->bindParam(':lvname', $lvname);
$stmt->bindParam(':lid', $lid);
$stmt->execute();

// Handle the success or error response
if ($stmt->rowCount() > 0) {
    // Update successful
    echo "Update successful";
} else {
    // Update failed
    echo "Update failed";
}
