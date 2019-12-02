<?php
  header("Content-type:text/html; charset=utf8");

  require_once('conexaobd.php');



  $carro = new Carros();

  $listacarro = $carro->listarAll($inicio = 1, $maximo = 12);
  $listacodigo = $carro->listarMarca();

  $carros = new Carros();
  if(isset($_GET['salvarEmail'])){
    $carros->receberanuncio();
  }

  if(isset($_GET['filtrar'])){
    $listacarro = $codigo->listarCarro();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Página Inicial</title>
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/sobre.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="//code.jivosite.com/widget.js" data-jv-id="M8AgwKTtAZ" async></script>



  <style>
    body{
      background: black;
      background-image: linear-gradient(black, #595959);
      background-repeat: no-repeat;
    }

    .navbar{
      background: black;
      margin-bottom: 10px;
      border-radius: 0;
    }

    .jumbotron{
      margin-bottom: 0;
    }

    select{
      margin-bottom: 10px;
      background: black;
    }

    #myfooster{
      background-color: #595959;
      bottom:0;
      left:0;
      right: 0;
    }

    .estilo{
      -webkit-appearance: none;
      background: #d3d3d3;
      outline: none;
      width: 100%;
      height: 5px;
      border-radius: 0px;   
    }

    .estilo::-webkit-slider-thumb {
      -webkit-appearance: none;
      appearance: none;
      width: 25px;
      height: 25px;
      border-radius: 50%;
      background: red;
      cursor: pointer;
    }

    .estilo::-moz-range-thumb {
      width: 25px;
      height: 25px;
      border-radius: 50%;
      background: #2796ee;
      cursor: pointer;
    }

    #sair{      
      margin: 10px;
    }
  </style>
</head>
<body>

 <!-- navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">
        <img src="img/logo.png" alt="logo" style="width:8vh;">
      </a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
   
        <ul class="nav navbar-nav">      
          <li><a href="index.php">Inicio</a></li>
          <li><a href="carros.php">Carros</a></li>
          <li><a href="anunciar.php">Anuncie</a></li>
          <li><a href="sobre.php">Sobre</a></li>
          <li><a href="faleconosco.php">Contato</a></li>
        </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Pesquisar">
        </div>
        <button type="Pesquisar" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="conta.php"><span class="glyphicon glyphicon-user"></span>
          <?php if(isset($_SESSION['usuario'])) {
              echo utf8_encode($_SESSION['usuario']->nome);
            }else{
              echo " Minha Conta";
            }
          ?>
          </a>
        </li>        
        <li><a href="#"><span class="glyphicon glyphicon-earphone"></span> (031) 3671 - 0000</a></li>
        <li>
          <?php 
            if(isset($_SESSION['usuario'])) {
            ?>
            <form action="index.php">
            <button id='sair' name="sair" type="submit" class="btn btn-dark">Sair</button></form>
            <?php
            }
          ?>
        </li>
      </ul>
    </div>
  </div>
</nav>        

  


     
<div class="container-right">

  <!-- Carousel container -->
  <div id="carousel-example-generic" data-interval="2500" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators hidden-xs">
      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <!-- tamanho img 1600 x 400-->
        <img class="img-responsive img-full" src="img/slide1.jpg" alt="">
      </div>
      <div class="item">
        <!-- tamanho img 1600 x 400-->
        <img class="img-responsive img-full" src="img/slide2.jpg" alt="">
      </div>
      <div class="item">
        <!-- tamanho img 1600 x 400-->
        <img class="img-responsive img-full" src="img/slide3.jpg" alt="">
      </div>
    </div>

    <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="icon-prev"></span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="icon-next"></span>
      </a>
  </div>
  <div class="col-sm-4" >
  <label for="Sel_Marca_Codigo">Marca</label>
  <select class="form-control form-control-sm" >
  <option><!--Banco de Dados--></option>
</select>
  </div>
  <div class="col-sm-2">
        <div class="form-group" id="modelos" >
            <label for="modelo">Modelo</label>
            <select name="nome" id="modelo" class="form-control">
              <option><!--Banco de Dados--></option>                
            </select>
          </div>     
        </div>
       
        <div class="col-sm-1">
        
        <div class="form-group" id="modelos" >
            <label for="modelo">Ano</label>
            <select name="nome" id="ano" class="form-control">
              <option><!--Banco de Dados--></option>                
            </select>
          </div>     
        </div>
       
        <div class="col-sm-1" >
        <div class="form-group" id=""" margin>
            <label for=""></label>
            <select name="nome" id="" class="form-control">
              <option><!--Banco de Dados--></option>                
            </select>
          </div>     
        </div>
        
        
       


<!-- div pai -->
<div class="container" style="margin-top: 10px;">
  <div class="row">
    <div class="col-sm-10">    
      <div class="row">
    
        <?php if($listacarro) : ?>
          <?php foreach($listacarro as $carros) : ?>
          <div class="col-sm-4">
            <div class="panel panel-primary">
        
              <div class="panel-heading"><a href="detalhescarro.php?id=<?php echo $carros->id; ?>" style="color:black ;"><?php echo utf8_encode($carros->nome); ?></a>
              </div>
              <!--img 150x80-->        
              <div class="panel-body"><a href="detalhescarro.php?id=<?php echo $carros->id; ?>"><img src="img/<?php echo $carros->foto; ?>" class="img-responsive" style="height: 180px; width: 300px;" alt="Image"></a>
              <!--<div class="panel-body"><a href="detalhescarro.php?id=<?php //echo $carros->id; ?>"><img src="img/<?php //echo $carros->id; ?>/<?php //echo $carros->foto; ?>" class="img-responsive" style="height: 180px; width: 300px;" alt="Image"></a>-->
              </div>
              <div class="panel-footer"><?php echo "R$ ".$carros->preco; ?></div>
            </div>
          </div>
          <?php endforeach;?>
          <?php else : ?>
          <label> Nenhum Registro Encontrado! </label>
        <?php endif; ?>
      </div><br>
    </div>

    <!-- menu a direita -->
    <div class="col-sm-2">
      <!-- largura 370 -->
      <img src="img/test2.jpg" class="img-responsive" height="100%;" alt="HB20">
    </div>

  </div>
  <div style="margin: 100px;"></div>
</div>

<footer class="container-fluid text-center" id="myfooster">
  <p style="color:white;">KING CAR SEMINOVOS</p>  

  <form action="index.php" method="get" class="form-inline">

    <label style="color:white;">Receber novidades:  </label>
    <input type="email" name="email" class="form-control" size="50" placeholder="email@usuario.com" >
    <button type="submit" class="btn btn-success " name="salvarEmail" >Salvar </button>

  </form>
</footer>

</body>
</html>
<script>
  $("#marcas").on("change",function(){
    var CodMarca = $("#marcas").val();
    //alert(CodMarca);

    $.ajax({
      url: 'pega_marcas.php',
      type: 'POST',
      data:{codigo:CodMarca},
      beforeSend: function(){
        $("#modelo").html("Carregando..");
      },
      success: function(data){
        $("#modelo").html(data);
      },
      error: function(data){
        $("#modelo").html("Houve um erro ao carregar!");
      }
    });

  });
</script>