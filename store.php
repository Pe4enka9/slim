<?php
/** @var PDO $pdo */

$pdo = require 'db.php';

$name = $_POST['name'];
$description = $_POST['description'];

$pdo->prepare("INSERT INTO posts(name, description) VALUES(:name, :description)")
    ->execute([
        'name' => $name,
        'description' => $description
    ]);
 header('Location: index.php');
?>