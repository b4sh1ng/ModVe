<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module anzeigen | FST</title>
</head>

<body style="background-color:#1E90FF">
    <?php
    require __DIR__ . "/global/navBar.html"; //NavBar hinzufügen
    require_once "../mysql.inc.php";
    $stmt = $pdo->prepare('SELECT * FROM module');
    $stmt->execute();
    ?>
    <div style="margin: 25px; ">
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
        </table>
    </div>


</body>

</html>