<?php
$database = 'mysql:host=database:3306;dbname=docker';

return new PDO($database, 'docker', 'docker');