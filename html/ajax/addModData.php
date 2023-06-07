<?php
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
<label for="lehrer" class="col-form-label">Lehrer ID:</label>
<input type="number" class="form-control" name="modul-lehrer" id="modul-lehrer" required placeholder="Lehrer ID">
</div>
<div class="mb-3">
<label for="raum-nummer" class="col-form-label">Raum:</label>
<input type="number" class="form-control" name="modul-raum" id="modul-raum" required placeholder="Raumnummer">
</div>';
echo $response;
exit;
