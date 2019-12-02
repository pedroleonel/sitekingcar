<?php

require_once 'conexaobd.php';

$id = $_GET["id"];
$pdo = new PDO(server, user, senha);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$smtp = $pdo->prepare("update carro set status = 'R' where id = '$id'");


$smtp->execute();

header("location:conta.php");

?>