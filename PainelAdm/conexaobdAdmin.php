<?php
define("server", "mysql:host=localhost;dbname=kingcar");
define('user', 'root');
define('senha', 'root');



function Select($sql)
{
    $pdo = new PDO(server, user, senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $smtp = $pdo->prepare($sql);
    $smtp->execute();

    if ($smtp->rowCount() > 0) {
        return $result = $smtp->fetchAll(PDO::FETCH_CLASS);
    }
}


function Update($sql)
{
    $pdo = new PDO(server, user, senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $smtp = $pdo->prepare($sql);

    $smtp->execute();

    if ($smtp->rowCount() > 0) {
        return $result = $smtp->fetchAll(PDO::FETCH_CLASS);
    }
}

function Insert($sql)
{
    $pdo = new PDO(server, user, senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $smtp = $pdo->prepare($sql);

    $smtp->execute();

    if ($smtp->rowCount() > 0) {
        return $result = $smtp->fetchAll(PDO::FETCH_CLASS);
    }
}


function Delete($sql)
{
    $pdo = new PDO(server, user, senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $smtp = $pdo->prepare($sql);

    $smtp->execute();

    if ($smtp->rowCount() > 0) {
        return $result = $smtp->fetchAll(PDO::FETCH_CLASS);
    }
}
