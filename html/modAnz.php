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
    require __DIR__ . "/global/navBar.php"; //NavBar hinzufügen
    require_once "../mysql.inc.php";
    $stmt = $pdo->prepare('SELECT * FROM module');
    $stmt->execute();
    ?>
    <div style="margin: 25px; ">
        <?php
        $html =
            '<table class="table table-striped table-dark table-hover table-sm rounded ">
            <thead>
                <tr>
                    <th>Modnr.</th>
                    <th>Modul</th>
                    <th>Modulstunden</th>
                    <th>Lehrer ID</th>
                    <th>Raum</th>
                </tr>
            </thead>
            <tbody>';
        foreach ($stmt as $result) {
            $html .= "<tr>
                        <td>" . $result['Modnr'] . "</td>
                        <td>" . $result['Modu'] . "</td>
                        <td>" . $result['Mstd'] . "</td>
                        <td>" . $result['Lid'] . "</td>
                        <td>" . $result['Rnr'] . "</td>
                        </tr>";
        }
        echo $html;
        $_SESSION['pdf_html'] = $html;
        ?>
        </tbody>
        <form action="./form/download_pdf.php" method="post">
            <button class="btn btn-success" type="submit" name="btn_submit" value="PDF laden..." style="margin-bottom: 1em; margin-right: 1em;">PDF Download</button>
        </form>
        </table>
    </div>
</body>

</html>