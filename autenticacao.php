<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
<?php
session_start();

$con =  new PDO("mysql:host=localhost; dbname=kingcar","root","root");//2m56ABz5FnAm7N23
$sql = $con->prepare("SELECT * FROM usuario WHERE email=? AND senha=?");
$sql->execute( array($_POST['email'], md5($_POST['senha']) ) );

$row = $sql->fetchObject();  // devolve um único registro

// Se o usuário foi localizado
if ($row){
    $_SESSION['usuario'] = $row;
     header("Location: PainelAdm/admin.php");   
}else{
    header("Location: conta.php");
    echo "<script> alert('Login ou Senha Incorretos!!'); window.location.href='index.php';</script>";
}


?>
</body>
</html>
