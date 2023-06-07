<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module bearbeiten | FST</title>
    <script src="extensions/editable/bootstrap-table-editable.js"></script>
</head>

<body style="background-color:#1E90FF">
    <?php require __DIR__ . "/global/navBar.html";
    require_once "../mysql.inc.php";
    ?>

    <div style="margin: 25px;">
        <table class="table table-striped table-dark table-hover table-sm rounded">
            <thead>
                <tr>
                    <th>Modnr.</th>
                    <th>Modul</th>
                    <th>Modulstunden</th>
                    <th>Lehrer ID</th>
                    <th>Raum</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->prepare('SELECT * FROM module');
                $stmt->execute();
                foreach ($stmt as $result) {
                    echo "<tr>
                        <td>" . $result['Modnr'] . "</td>
                        <td>" . $result['Modu'] . "</td>
                        <td>" . $result['Mstd'] . "</td>
                        <td>" . $result['Lid'] . "</td>
                        <td>" . $result['Rnr'] . "</td>
                        </tr>";
                }
                ?>
            </tbody>
            <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#addModule" style="margin-bottom: 1em; margin-right: 1em;">Hinzufügen</button>
            <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#removeModule" style="margin-bottom: 1em; margin-right: 1em;">Löschen</button>
        </table>
    </div>
</body>
<div class="modal fade" id="addModule" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addModuleLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="was-validated" action="./form/addModul.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModuleLabel">Modul hinzufügen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="modul-name" class="col-form-label">Modul:</label>
                        <input type="text" class="form-control" id="modul-name" required placeholder="Modulname">
                    </div>
                    <div class="mb-3">
                        <label for="modul-stunden" class="col-form-label">Modulstunden:</label>
                        <input type="number" class="form-control" id="modul-name" required placeholder="Stundenanzahl">
                    </div>
                    <div class="mb-3">
                        <label for="lehrer" class="col-form-label">Lehrer ID:</label>
                        <input type="number" class="form-control" id="lehrer" required placeholder="Lehrer ID">
                    </div>
                    <div class="mb-3">
                        <label for="raum-nummer" class="col-form-label">Raum:</label>
                        <input type="number" class="form-control" id="raum-nummer" required placeholder="Raumnummer">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                    <button type="Submit" class="btn btn-primary">Hinzufügen</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="removeModule" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="removeModuleLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="was-validated" action="./form/removeModul.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="removeModuleLabel">Modul löschen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="remove-modul" class="col-form-label">Modul:</label>
                        <select name="remove-modul" id="remove-modul">
                            <?php
                            $stmt = $pdo->prepare('SELECT * FROM module');
                            $stmt->execute();
                            foreach ($stmt as $result) {
                                echo "<option value='" . $result['Modnr'] . "'>" . $result['Modu'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                    <button type="Submit" class="btn btn-danger">Modul löschen</button>
                </div>
            </form>
        </div>
    </div>
</div>

</html>