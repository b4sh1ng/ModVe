<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module bearbeiten | FST</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                    <th>Bearbeiten</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->prepare('SELECT * FROM module');
                $stmt->execute();
                foreach ($stmt as $result) {
                    $resultModnr = $result['Modnr'];
                    echo "<tr>
                        <td>" . $resultModnr . "</td>
                        <td>" . $result['Modu'] . "</td>
                        <td>" . $result['Mstd'] . "</td>
                        <td>" . $result['Lid'] . "</td>
                        <td>" . $result['Rnr'] . "</td>
                        <td>" . '<button class="btn btn-warning modinfo" type="button" data-bs-toggle="modal" data-id="' . $resultModnr . '" data-bs-target="#editModule" style="margin-bottom: .2em; margin-right: .2em;">Bearbeiten</button>' . "</td>
                        </tr>";
                }
                ?>
            </tbody>
            <button class="btn btn-success modadd" type="button" data-bs-toggle="modal" data-bs-target="#addModule" style="margin-bottom: 1em; margin-right: 1em;">Hinzufügen</button>
            <button class="btn btn-danger modremove" type="button" data-bs-toggle="modal" data-bs-target="#removeModule" style="margin-bottom: 1em; margin-right: 1em;">Löschen</button>
        </table>
        <script type='text/javascript'>
            $(document).ready(function() {

                $('.modinfo').click(function() {

                    var modid = $(this).data('id');

                    // AJAX request
                    $.ajax({
                        url: './ajax/loadModData.php',
                        type: 'post',
                        data: {
                            modid: modid
                        },
                        success: function(response) {
                            // Add response in Modal body
                            $('.modal-body').html(response);

                            // Display Modal
                            $('#empModal').modal('show');
                        }
                    });
                });
                $('.modadd').click(function() {

                    var modid = $(this).data('id');

                    // AJAX request
                    $.ajax({
                        url: './ajax/addModData.php',
                        type: 'post',
                        data: {
                            modid: modid
                        },
                        success: function(response) {
                            // Add response in Modal body
                            $('.modal-body').html(response);

                            // Display Modal
                            $('#empModal').modal('show');
                        }
                    });
                });
                $('.modremove').click(function() {

                    var modid = $(this).data('id');

                    // AJAX request
                    $.ajax({
                        url: './ajax/removeModData.php',
                        type: 'post',
                        data: {
                            modid: modid
                        },
                        success: function(response) {
                            // Add response in Modal body
                            $('.modal-body').html(response);

                            // Display Modal
                            $('#empModal').modal('show');
                        }
                    });
                });
            });
        </script>
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
                    <!-- generated within addModData.php -->
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
            <form class="was-validated" action="./form/removeModul.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="removeModuleLabel">Modul löschen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- generated within removeModData.php -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                    <button type="Submit" class="btn btn-danger">Modul löschen</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="editModule" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModuleLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="was-validated" action="./form/editModul.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModuleLabel">Modul bearbeiten</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- generated within loadModData.php -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                    <button type="Submit" class="btn btn-danger">Änderungen speichern</button>
                </div>
            </form>
        </div>
    </div>
</div>

</html>