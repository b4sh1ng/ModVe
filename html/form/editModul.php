<?php
echo $_POST['modul-name'];
echo $_POST['modul-stunden'];
echo $_POST['modul-lehrer'];
echo $_POST['modul-raum'];

require_once "../../mysql.inc.php";

try {
    $stmt = $pdo->prepare('UPDATE `module` SET `Modu` = :modname, `Mstd` = :modstd, `Lid` = :lehrer, `Rnr` = :raum WHERE `Modnr` = :modnr');
    $stmt->bindParam(':modnr', $_POST['modul-nummer']);
    $stmt->bindParam(':modname', $_POST['modul-name']);
    $stmt->bindParam(':modstd', $_POST['modul-stunden']);
    $stmt->bindParam(':lehrer', $_POST['modul-lehrer']);
    $stmt->bindParam(':raum', $_POST['modul-raum']);
    $stmt->execute();
} catch (PDOException $ex) {
    echo $ex;
}

header("Location: ../modBea.php");
