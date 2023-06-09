<?php
require_once "../../mysql.inc.php";
$response = '<div class="mb-3">
<label for="remove-modulzu" class="col-form-label">Modul:</label>
<select name="remove-modulzu" id="remove-modulzu">';
$stmt = $pdo->prepare("SELECT DISTINCT modulzuordnung.Modnr, module.Modu FROM modulzuordnung INNER JOIN module on modulzuordnung.Modnr = module.Modnr");
$stmt->execute();
foreach ($stmt as $result) {
    $response .= ' "<option value=' . $result['Modnr'] . '>' . $result['Modu'] . '</option>"';
}
$response .= '</select></div>';
$response .= '<div class="mb-3">
<label for="remove-snr" class="col-form-label">Schüler ID:</label>
<select name="remove-snr" id="remove-snr">';
$stmt = $pdo->prepare("SELECT DISTINCT schueler.Snr FROM modulzuordnung INNER JOIN schueler on modulzuordnung.Snr = schueler.Snr");
$stmt->execute();
foreach ($stmt as $result) {
    $response .= ' "<option value=' . $result['Snr'] . '>' . $result['Snr'] . '</option>"';
}
$response .= '</select></div>';
echo $response;
exit;
