<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schüler anzeigen | FST</title>
</head>

<body style="background-color:#1E90FF">
    <?php 
    require __DIR__ . "/global/navBar.php";
    require_once "../mysql.inc.php";

    $filterPlz = isset($_GET['plz']) ? $_GET['plz'] : '';

    if (!empty($filterPlz)) {
        $stmt = $pdo->prepare('SELECT * FROM schueler WHERE PLZ LIKE :plz');
        $stmt->bindValue(':plz', $filterPlz . '%');
    } else {
        $stmt = $pdo->prepare('SELECT * FROM schueler');
    }

    $stmt->execute();
    ?>
    <div style="margin:25px;">
        <form method="GET" class="row g-3" style="margin-bottom: 1em;">
            <div class="col-auto">
                <label for="plz-filter" class="col-form-label fw-bold text-light">Filter nach PLZ:</label>
            </div>
            <div class="col-auto">
                <div class="input-group">
                    <input type="text" id="plz-filter" name="plz" value="<?php echo $filterPlz; ?>" class="form-control">
                    <button class="btn btn-dark" type="submit">Filter Anwenden</button>
                </div>
            </div>
        </form>
        <?php
        $html = '
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
            <tbody>';                
                foreach ($stmt as $result) {
                    $html .= " <tr>
                        <td>" . $result['Snr']     . "</td>      
                        <td>" . $result['Sname']   . "</td>      
                        <td>" . $result['Svname']  . "</td>      
                        <td>" . $result['gebd']    . "</td>      
                        <td>" . $result['Str']     . "</td>      
                        <td>" . $result['PLZ']     . "</td>      
                        <td>" . $result['Ort']     . "</td>      
                    </tr>";
                } 
                echo $html;
                $_SESSION['pdf_html'] = $html;?>
            </tbody>
            <form action="./form/download_pdf.php" method="post">
            <button class="btn btn-success" type="submit" name="btn_submit" value="PDF laden..." style="margin-bottom: 1em; margin-right: 1em;">PDF Download</button>
        </form>
        </table>
    </div>
</body>

</html>