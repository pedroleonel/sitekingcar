<?php
session_start();

$con =  new PDO("mysql:host=localhost; dbname=bdcarros","root","");//2m56ABz5FnAm7N23
$sql = $con->prepare("SELECT * FROM usuario WHERE email=? AND senha=?");
$sql->execute( array($_POST['email'], md5($_POST['senha']) ) );

$row = $sql->fetchObject();  // devolve um único registro

// Se o usuário foi localizado
if ($row){
    $_SESSION['usuario'] = $row;
     header("Location: index.php");   
}else{
    header("Location: conta.php");
    echo "<script> alert('Login ou Senha Incorretos!!'); window.location.href='index.php';</script>";
}


?>