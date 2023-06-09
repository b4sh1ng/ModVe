<?php
require_once "../../mysql.inc.php";
$response = '<div class="mb-3">
<label for="add-modulzu" class="col-form-label">Modul:</label>
<select name="add-modulzu" id="add-modulzu">';

$stmt = $pdo->prepare("SELECT * FROM module");
$stmt->execute();
foreach ($stmt as $result) {
    $response .= ' "<option value=' . $result['Modnr'] . '>' . $result['Modu'] . '</option>"';
}
$response .= '</select></div>';
$response .= '<div class="mb-3">
<label for="add-modulzu-snr" class="col-form-label">Schülernr:</label>
<select name="add-modulzu-snr" id="add-modulzu-snr">';

$stmt = $pdo->prepare("SELECT * FROM schueler");
$stmt->execute();
foreach ($stmt as $result) {
    $response .= ' "<option value=' . $result['Snr'] . '>' . $result['Snr'] . '</option>"';
}
$response .= '</select></div>';
echo $response;
exit;
