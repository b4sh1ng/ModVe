<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modulzuordnung bearbeiten | FST</title>
</head>

<body style="background-color:#1E90FF">
    <?php 
    require __DIR__ . "/global/navBar.php";
    require_once "../mysql.inc.php";
    $stmt = $pdo->prepare('SELECT * FROM module INNER JOIN modulzuordnung on module.Modnr = modulzuordnung.Modnr
    INNER JOIN schueler on modulzuordnung.Snr = schueler.Snr');
    $stmt->execute();
    ?>
    <div style="margin: 25px; ">
    <?php
    $html = '<table class="table table-striped table-dark table-hover table-sm rounded">
            <thead>
                <tr>
                    <th>Modnr.</th>
                    <th>Modul</th>
                    <th>Snr</th>
                    <th>Schüler Vorname</th>
                    <th>Schüler Nachname</th>
                </tr>
            </thead>
            <tbody>';
                
                foreach ($stmt as $result) {
                    $html .= "<tr>
                        <td>" . $result['Modnr'] . "</td>
                        <td>" . $result['Modu'] . "</td>
                        <td>" . $result['Snr'] . "</td>
                        <td>" . $result['Svname'] . "</td>
                        <td>" . $result['Sname'] . "</td>
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