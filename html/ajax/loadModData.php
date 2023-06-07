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
    <input type="text" class="form-control" name="modul-lehrer" id="modul-lehrer" required placeholder="Lehrer ID" value="' . $result['Lid'] . '">
    </div>
    <div class="mb-3">
    <label for="modul-name" class="col-form-label">Raum:</label>
    <input type="text" class="form-control" name="modul-raum" id="modul-raum" required placeholder="Raumnummer" value="' . $result['Rnr'] . '">
    </div>';
}

echo $response;
exit;
