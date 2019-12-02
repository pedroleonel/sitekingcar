<?php
  header("Content-type:text/html; charset=utf8");

  require_once('conexaobd.php');

  $codigo = new Carros();

  if(!isset($_GET['pesquisar'])){
    $pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
    $maximo = 15;
    $inicio = (($maximo * $pagina) - $maximo);
    $listacarro = $codigo->listarAll($inicio,$maximo);
    $listacodigo = $codigo->listarMarca();
  }
  

  $carros = new Carros();
  if(isset($_GET['salvarEmail'])){
    $carros->receberanuncio();
  }

  if(isset($_GET['pesquisar'])){
    $pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
    $maximo = 15;
    $inicio = (($maximo * $pagina) - $maximo);
    $listacarro = $codigo->listarCarro($inicio,$maximo);
  }

  if(isset($_GET['filtrar'])){
    $pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
    $maximo = 15;
    $inicio = (($maximo * $pagina) - $maximo);
    $listacarro = $codigo->listarCarro($inicio,$maximo);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Carros</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/sobre.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="//code.jivosite.com/widget.js" data-jv-id="M8AgwKTtAZ" async></script>

  
  <style>
    .fundo{

      background: transparent;
    }

    .navbar {
    background: black;
    border-radius: 0;
  }   
    
    .jumbotron {

      margin-bottom: 0;
    }
   
    .select {
      margin-bottom: 10px;
      background: black;
    }

    #myfooster{
      background-color: #595959;
      padding: 15px;
      bottom:0;
      left:0;
      right: 0;
    }
    
    #sair{    
      
      margin: 10px;
    }
  </style>
</head>
<body>
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
          
        </div>
 

<div class="container">
  <div class="row fundo">
    <div class="col-sm-10">     
      <div class="row">
        <form method="get">
          <?php if($listacarro) : ?>
          <?php foreach($listacarro as $carros) : ?>
          <div class="col-sm-4">
            <div class="panel panel-primary">
        
              <div class="panel-heading"><a href="detalhescarro.php?id=<?php echo $carros->id; ?>" style="color:white ;"><?php echo $carros->nome; ?></a></div>

              <!--img 150x80-->

              <div class="panel-body"><a href="detalhescarro.php?id=<?php echo $carros->id; ?>"><img src="imgBD/<?php echo $carros->id; ?>/<?php echo $carros->foto; ?>" class="img-responsive" style="height: 180px; width: 300px;" alt="Image"></a></div>

              <div class="panel-footer"><?php echo "R$ ".$carros->preco; ?></div>
            </div>
          </div>
          <?php endforeach;?>
          <?php else : ?>
          <label> Nenhum Registro Encontrado! </label>
          <?php endif; ?>
        </form>
      </div>
      <br>
      
    </div>
    <div class="col-sm-2 ">
      <img src="img/test2.jpg" class="img-responsive" height="100%;" alt="HB20">
    </div>
    <div style="margin-top: 100px; position: bottom;">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
          <?php $paginacao = new Carros();
            $total = $paginacao->listar();
            $total_pags = ceil($total/$maximo);
            $maxlinks = 2;
            if($total > $maximo){
                echo 
                  '<nav>
                    <ul class="pagination justify-content-center">
                      <li class="page-item">
                        <a class="page-link" href="?pagina=1">Primeira Página</a>
                      </li>';

                    for($i = $pagina - $maxlinks; $i <= $pagina -1; $i++){
                      if($i >= 1){
                        echo
                          '<li class="page-item">
                            <a class="page-link" href="?pagina='.$i.'">'.$i.'</a>
                          </li>';
                      }
                    }

                    echo
                    '<li class="page-item">
                      <a class="page-link">'.$pagina.'</a>
                    </li>';
                        
                    for($i = $pagina + 1; $i <= $pagina + $maxlinks; $i++){
                      if($i <= $total_pags){
                        echo
                          '<li class="page-item">
                            <a class="page-link" href="?pagina='.$i.'">'.$i.'</a>
                          </li>';
                      }
                    }
                    
                    echo
                      '<li class="page-item">
                        <a class="page-link" href="?pagina='.$total_pags.'">Última Página</a>
                      </li>
                    </ul>
                  </nav>';
            }
        ?>
        </div>
        
        
      </div>
  </div>
</div>

<footer class="container-fluid text-center" id="myfooster">
  <p style="color:white;">King car</p>  
  <form action="index.php" method="get" class="form-inline">
    <label style="color:white;">Receber novos anúncios :  </label>

    <input type="email" name="email" class="form-control" size="50" placeholder="email@usuario.com" >
    <button type="submit" class="btn btn-success " name="salvarEmail">Salvar</button>
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
        $("#modelos").css({'display':'block'});        
        $("#modelo").css({'display':'block'});
        $("#modelo").html("Carregando..");
      },
      success: function(data){
        $("#modelos").css({'display':'block'});        
        $("#modelo").css({'display':'block'});
        $("#modelo").html(data);
      },
      error: function(data){
        $("#modelos").css({'display':'block'});        
        $("#modelo").css({'display':'block'});
        $("#modelo").html("Houve um erro ao carregar!");
      }
    });
  });
</script>
