<?php

require '../vendor/autoload.php';

use app\database\Connection;

header("Access-Control-Allow-Origin; *");

echo json_encode('teste');
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

$pdo = Connection::connect();

$prepare = $pdo->prepare("select * from email = :email");
$prepare->execute([
    'email' => $email
]);

$userFound = $prepare->fetch();

echo $userFound;
