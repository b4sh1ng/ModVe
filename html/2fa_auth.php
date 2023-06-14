<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2FA Key | FST</title>
</head>

<body style="background-color:#1E90FF">
    <?php require __DIR__ . "/global/navBar.html"; ?>
    <div class="d-flex justify-content-evenly">
        <div class="col-auto">
            <h3 class="fw-bold text-light" style="margin: 1em;">Dein 2FA Key</h3>
            <br>
            <div>
                <img src="2fakey/2fa_key.png" style="margin: 1em;">
            </div>
            <form method="post">
                <input class="btn btn-success" type="submit" value="Go back!" name="btn_back" style="margin: 1em;">
                <?php

                if (isset($_POST['btn_back'])) {
                    unlink("2fakey/2fa_key.png");
                    echo "<script> location.replace(\"index.php\"); </script>";
                } ?>
            </form>
        </div>
    </div>
</body>

</html>