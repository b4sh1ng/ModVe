<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Modulzuordnung bearbeiten | FST</title>
</head>

<body style="background-color:#1E90FF">
    <?php require __DIR__ . "/global/navBar.html";
    require_once "../mysql.inc.php";
    $stmt = $pdo->prepare('SELECT * FROM module INNER JOIN modulzuordnung on module.Modnr = modulzuordnung.Modnr
    INNER JOIN schueler on modulzuordnung.Snr = schueler.Snr');
    $stmt->execute();
    ?>

    <div style="margin: 25px; ">
        <table class="table table-striped table-dark table-hover table-sm rounded">
            <thead>
                <tr>
                    <th>Modnr.</th>
                    <th>Modul</th>
                    <th>Snr</th>
                    <th>Schüler Vorname</th>
                    <th>Schüler Nachname</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($stmt as $result) {
                    $resultModnr = $result['Modnr'];
                    echo "<tr>
                        <td>" . $resultModnr . "</td>
                        <td>" . $result['Modu'] . "</td>
                        <td>" . $result['Snr'] . "</td>
                        <td>" . $result['Svname'] . "</td>
                        <td>" . $result['Sname'] . "</td>
                        </tr>";
                }
                ?>
            </tbody>
            <button class="btn btn-success modzuadd" type="button" data-bs-toggle="modal" data-bs-target="#addModulzu" style="margin-bottom: 1em; margin-right: 1em;">Hinzufügen</button>
            <button class="btn btn-danger modzuremove" type="button" data-bs-toggle="modal" data-bs-target="#removeModulzu" style="margin-bottom: 1em; margin-right: 1em;">Löschen</button>
        </table>
        <script type='text/javascript'>
            $(document).ready(function() {

                $('.modzuadd').click(function() {

                    //var modid = $(this).data('id');

                    // AJAX request
                    $.ajax({
                        url: './ajax/addModzuData.php',
                        type: 'post',
                        data: {
                            // modid: modid
                        },
                        success: function(response) {
                            // Add response in Modal body
                            $('.modal-body').html(response);

                            // Display Modal
                            $('#empModal').modal('show');
                        }
                    });
                });
                $('.modzuremove').click(function() {

                    var modid = $(this).data('id');

                    // AJAX request
                    $.ajax({
                        url: './ajax/removeModzuData.php',
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
<div class="modal fade" id="addModulzu" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addModulzuLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="was-validated" action="./form/addModulzu.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModulzuLabel">Modulzuordnung hinzufügen</h5>
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
<div class="modal fade" id="removeModulzu" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="removeModulzuLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="was-validated" action="./form/removeModulzu.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="removeModulzuLabel">Modulzuordnung löschen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- generated within removeModData.php -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                    <button type="Submit" class="btn btn-danger">Löschen</button>
                </div>
            </form>
        </div>
    </div>
</div>

</html>

</html>