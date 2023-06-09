<?php
require_once "../../mysql.inc.php";
$response = '
<div class="mb-3">
<label for="modul-name" class="col-form-label">Modul:</label>
<input type="text" class="form-control" name="modul-name" id="modul-name" required placeholder="Modulname">
</div>
<div class="mb-3">
<label for="modul-stunden" class="col-form-label">Modulstunden:</label>
<input type="number" class="form-control" name="modul-stunden" id="modul-stunden" required placeholder="Stundenanzahl">
</div>
<div class="mb-3">
<label for="modul-name" class="col-form-label">Lehrer:</label>
<select name="modul-lehrer" id="modul-lehrer" required>';
$stmt = $pdo->prepare("SELECT * FROM module INNER JOIN lehrer ON module.Lid = lehrer.Lid");
$stmt->execute();
foreach ($stmt as $result) {
    $response .= ' "<option value=' . $result['Lid'] . '>' . $result['Lname'] . '</option>"';
}
$response .= '</select></div>
<div class="mb-3">
    <label for="modul-name" class="col-form-label">Raum:</label>
    <select name="modul-raum" id="modul-raum" required>';
$stmt = $pdo->prepare("SELECT Rnr FROM module");
$stmt->execute();
foreach ($stmt as $result) {
    $response .= ' "<option value=' . $result['Rnr'] . '>' . $result['Rnr'] . '</option>"';
}
$response .= '</select></div>';
echo $response;
exit;
