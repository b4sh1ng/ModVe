<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Modulverwaltung | FST</title>

</head>

<body style="background-color:#1E90FF">
    <?php require __DIR__ . "/global/navBar.php";
    require_once('../mysql.inc.php');
    if(isset($_SESSION['data'])){
        session_destroy();
        header("Location: ./index.php");
    }
    ?>
    <div style="margin:25px;">
        <div>
            <form method="post" class="row g-3" style="margin-bottom: 1em;">
                <div class="d-flex justify-content-evenly">
                    <div>
                        <div class="col-auto">
                            <label class="col-form-label fw-bold text-light">Login</label>

                            <input class="form-control" type="text" name="loginId" value="<?php echo isset($_POST['value']) ? htmlspecialchars($_POST['value']) : null ?>">

                            <label class="col-form-label fw-bold text-light">Passwort</label>
                            <input class="form-control" type="password" name="passwd" value="<?php echo isset($_POST['value']) ? htmlspecialchars($_POST['value']) : null ?>">

                            <label class=" col-form-label fw-bold text-light">2FA Key</label>
                            <input class="form-control" type="password" name="2fa_key" value="<?php echo isset($_POST['value']) ? htmlspecialchars($_POST['value']) : null ?>">

                            <input class="btn btn-dark" type="submit" Name="btn_login" style="margin-top: 1em;" value="Einloggen" />
                        </div>
                        <?php
            if (isset($_POST['btn_login'])) {
                $stmt = $pdo->prepare('SELECT * from verw where name=:name');
                $stmt->bindValue(':name', $_POST['loginId']);
                $stmt->execute();
                while ($item = $stmt->fetch()) {
                    $userid = $item['name'];
                    $password = $item['passw'];
                    $access_lvl = $item['access'];
                    $fakey =  $item['2fakey'];
                }
                $current_code_2fa = trim(shell_exec("oathtool --base32 --totp $fakey"));
                $pwdVerify = password_verify($_POST['passwd'], $password);

                if ($_POST['loginId'] == $userid && $pwdVerify && ($access_lvl >= 10) && ($_POST['2fa_key'] == $current_code_2fa)) {
                    //Start the session                    
                    $_SESSION['data'] = $userid;
                    echo "<script>window.location.href = 'index.php';</script>";
                    exit;
                } else {
                    echo "Login versuch gescheitert!<br>Überprüfe ID und Passwort!";
                }
            }            
            ?>
                    </div>
                </div>
            </form>           
        </div>
    </div>
</body>

</html>