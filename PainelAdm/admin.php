
<?php
session_start();
     $user = utf8_encode($_SESSION['usuario']->nome);;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KingCar - Painel Administrativo</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fontello/css/fontello.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/kingcar.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="assets/bootstrap/css/bootstrap.min.js"></script>
  <script src="assets/fontawesome/js/all.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row bg-dark text-white">
            <div class="col-lg-6" style="height:5vh;">
            <strong>Painel Administrativo</strong>
            </div>
            <div class="col-lg-6 text-right">
            <i class="icone-user"></i> <strong> <?php echo $user; ?></strong>
            <a href="logout.php" class="text-white"> <i class="icone-logout"></i>  Sair</a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-2 bg-secondary" style="height:95vh; padding:2px;">
            <div class="vertical-menu">
                <a href="dashboard.php" target="conteudo"><i class="icone-home"></i>        <label>Home    </label></a>
                <a href="#"><i class="icone-user"></i>        <label>Usuários</label></a>
                <a href="#"><i class="fas fa-car"></i>        <label>Carros  </label></a>
                <a href="#"><i class="icone-newspaper-2"></i> <label>Publicidades</label></a>
                <a href="#"><i class="icone-question"></i>    <label>Sobre   </label></a>
            </div>
            </div>
            <div class="col-lg-10" style="padding:0px;">
                <iframe name="conteudo" id="conteudo" src="dashboard.php" style="height:94vh; width:100%;" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</body>
</html>