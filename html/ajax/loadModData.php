<?php
require_once "../../mysql.inc.php";
$modid = 0;
if (isset($_POST['modid'])) {
    $modid = $_POST['modid'];
}
$stmt = $pdo->prepare("SELECT * FROM module WHERE Modnr =" . $modid);
$stmt->execute();

foreach ($stmt as $result) {
    $response = '
    <input type="hidden" class="form-control" name="modul-nummer" id="modul-nummer" value="' . $modid . '">
    <div class="mb-3">
    <label for="modul-name" class="col-form-label">Modul:</label>
    <input type="text" class="form-control" name="modul-name" id="modul-name" required placeholder="Modulname" value="' . $result['Modu'] . '">
    </div>
    <div class="mb-3">
    <label for="modul-name" class="col-form-label">Modulstunden:</label>
    <input type="text" class="form-control" name="modul-stunden" id="modul-stunden" required placeholder="Stundenanzahl" value="' . $result['Mstd'] . '">
    </div>
    <div class="mb-3">
    <label for="modul-name" class="col-form-label">Lehrer ID:</label>
    <select name="modul-lehrer" id="modul-lehrer" required>';
    $stmt = $pdo->prepare("SELECT Lid FROM module");
    $stmt->execute();
    foreach ($stmt as $result) {
        $response .= ' "<option value=' . $result['Lid'] . '>' . $result['Lid'] . '</option>"';
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
}

echo $response;
exit;
