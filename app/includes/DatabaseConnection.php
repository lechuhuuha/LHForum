<?php

$pdo = new PDO('mysql:host=localhost;dbname=LHForum;
charset=utf8', 'root', '');
$pdo->setAttribute(
    PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION
);
$secondPdo = new PDO('mysql:host=localhost;dbname=mvc-backup;charset=utf8', 'root', '');
$secondPdo->setAttribute(
    PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION
);
