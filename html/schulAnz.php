<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schüler anzeigen | FST</title>
</head>

<body style="background-color:#1E90FF">
    <?php require __DIR__ . "/global/navBar.html";
    require_once "../mysql.inc.php";
    $stmt = $pdo->prepare('SELECT * FROM schueler');
    $stmt->execute();
    ?>
    <div style="margin:25px;">
        <table class="table table-striped table-dark table-hover table-sm rounded">
            <thead>
                <tr>
                    <th>Snr.</th>
                    <th>Name</th>
                    <th>Vorname</th>
                    <th>Geburtsdatum</th>
                    <th>Straße</th>
                    <th>PLZ</th>
                    <th>Ort</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($stmt as $result) {
                    echo " <tr>
                        <td>" . $result['Snr']     . "</td>      
                        <td>" . $result['Sname']   . "</td>      
                        <td>" . $result['Svname']  . "</td>      
                        <td>" . $result['gebd']    . "</td>      
                        <td>" . $result['Str']     . "</td>      
                        <td>" . $result['PLZ']     . "</td>      
                        <td>" . $result['Ort']     . "</td>      
                    </tr>";
                } ?>
            </tbody>
        </table>
    </div>
</body>

</html>