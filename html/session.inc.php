<?php
session_start();
if (!isset($_SESSION['data'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}
