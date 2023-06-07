<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modulzuordnung bearbeiten | FST</title>
</head>

<body style="background-color:#1E90FF">
    <?php require __DIR__ . "/global/navBar.html";
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
            </tbody>
        </table>
    </div>
</body>

</html>