<?php

$host = 'database:3306';
$dbname = 'docker';
$username = 'docker';
$password = 'docker';
$charset = 'utf8mb4';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

ORM::configure("mysql:host=$host;dbname=$dbname;charset=$charset");
ORM::configure("username", $username);
ORM::configure("password", $password);
ORM::configure("driver_options", $options);
ORM::configure('logging', true);
