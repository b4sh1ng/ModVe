<?php
require_once "../../mysql.inc.php";
$response = '<div class="mb-3">
<label for="remove-modul" class="col-form-label">Modul:</label>
<select name="remove-modul" id="remove-modul">';

$stmt = $pdo->prepare("SELECT * FROM module");
$stmt->execute();
foreach ($stmt as $result) {
    $response .= ' "<option value=' . $result['Modnr'] . '>' . $result['Modu'] . '</option>"';
}
$response .= '</select></div>';
echo $response;
exit;
