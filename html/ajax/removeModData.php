<?php
require_once "../../mysql.inc.php";
$response = '<div class="mb-3">
<label for="remove-modul" class="col-form-label">Modul:</label>
<select name="remove-modul" id="remove-modul">';

$stmt = $pdo->prepare("SELECT * FROM module");
$stmt->execute();
$delete_stmt = $pdo->prepare("SELECT module.Modnr from module INNER JOIN modulzuordnung on module.Modnr = modulzuordnung.Modnr");
$delete_stmt->execute();
$res = $delete_stmt->fetchAll();
$isFound = 0;
foreach ($stmt as $result) {
    foreach ($res as $deleteable) {
        if ($result['Modnr'] == $deleteable['Modnr']) {
            $isFound = true;
        }
    }
    if (!$isFound) {
        $response .= ' "<option value=' . $result['Modnr'] . '>' . $result['Modu'] . '</option>"';
    }
    $isFound = false;
}
$response .= '</select></div>';
$response .= '<a class="d-flex" style="color: red;">Nur Module ohne Belegung lassen sich löschen!</a>';
echo $response;
exit;
