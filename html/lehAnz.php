<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lehrer anzeigen | FST</title>
</head>

<body style="background-color:#1E90FF">
    <?php 
    session_start();
    require __DIR__ . "/global/navBar.php";
    require_once "../mysql.inc.php";

    $filterLname = isset($_GET['lname']) ? $_GET['lname'] : '';

    if (!empty($filterLname)) {
        $stmt = $pdo->prepare('SELECT * FROM lehrer WHERE Lname LIKE :lname');
        $stmt->bindValue(':lname','%'. $filterLname . '%');
    } else {
        $stmt = $pdo->prepare('SELECT * FROM lehrer');
    }

    $stmt->execute();
    ?>
    <div style="margin:25px;">
    
        <form method="GET" class="row g-3" style="margin-bottom: 1em;">
            <div class="col-auto">
                <label for="lname-filter" class="col-form-label fw-bold text-light">Filter nach Nachname (Lehrer):</label>
            </div>
            <div class="col-auto">
                <div class="input-group">
                    <input type="text" id="lname-filter" name="lname" value="<?php echo $filterLname; ?>" class="form-control">
                    <button class="btn btn-dark" type="submit">Filter Anwenden</button>
                </div>
            </div>
        </form>
        <?php
        $html .= '
        <table class="table table-striped table-dark table-hover table-sm rounded">
            <thead>
                <tr>
                    <th>Lid</th>
                    <th>Name</th>
                    <th>Vorname</th>
                </tr>
            </thead>
            <tbody>';
                
                foreach ($stmt as $result) {
                    $html .= "<tr>
                        <td>" . $result['Lid']     . "</td>      
                        <td>" . $result['Lname']   . "</td>      
                        <td>" . $result['Lvname']  . "</td>      
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