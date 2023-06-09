<?php
require_once "../mysql.inc.php";
$stmt = $pdo->prepare("SELECT * FROM module");
$stmt->execute();
$delete_stmt = $pdo->prepare("SELECT module.Modnr from module INNER JOIN modulzuordnung on module.Modnr = modulzuordnung.Modnr");
$delete_stmt->execute();
$res = $delete_stmt->fetchAll();
$isFound = 0;
foreach ($stmt as $result) {
     foreach ($res as $deleteable) {
          if ($result['Modnr'] == $deleteable['Modnr']) {
               $isFound = true;
          }
     }
     if (!$isFound) {
          echo $result['Modu'] . " ";
     }
     $isFound = 0;
}
