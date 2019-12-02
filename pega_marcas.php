<?php
$conexao = new PDO("mysql:host=localhost;dbname=bdcarros","root","");//2m56ABz5FnAm7N23
$conexao->exec('SET CHARACTER SET utf8');

$pegaModelo = $conexao->prepare("select * from modelo where marca_codigo='".$_POST['codigo']."'");
$pegaModelo->execute();

$fetchAll = $pegaModelo->fetchAll();

echo '<option value=""></option>';
foreach ($fetchAll as $modelos) {
       	echo '<option value="'.$modelos['nome'].'">'.$modelos['nome'].'</option>';
       }      



       
?>