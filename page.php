<?php
/** @var PDO $pdo */

$pdo = require 'db.php';
$id = $_GET['id'];
$post = $pdo->query("SELECT * FROM posts where id = $id")->fetch(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1><?=$post['name']?></h1>
    <p><?=$post['description']?></p>
</body>
</html>
