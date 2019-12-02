<?php
  header("Content-type:text/html; charset=utf8");

  require_once('conexaobd.php');
  $codigo = new Carros();
  $listacodigo = $codigo->listarMarca();
  $listamodelo = $codigo->listarModelo();

  $carros = new Carros();
  if(isset($_POST['inserir'])){
    if(isset($_SESSION['usuario'])){
          $carros->inserirAnuncio();
          echo "<script> alert('Anúncio efetuado com sucesso!'); window.location.href='index.php';</script>";       
      }
    else{
      echo "<script> alert('É necesário estar logado!!'); window.location.href='conta.php';</script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Anunciar</title>
  <meta charset="utf-8">
  <script type="text/javascript" src="jquery.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/sobre.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="//code.jivosite.com/widget.js" data-jv-id="M8AgwKTtAZ" async></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
  <script type="text/javascript" src="jquery.mask.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#preco").mask("999999990.00", {reverse: true} )
      $("#placa").mask("AAA")
    })
  </script>
</head>

<style type="text/css">
  .navbar {
    background: black;
    border-radius: 0;
  }

  .noresize {
    resize: none; 
  }

  #btnlimpar{
    background-color: #cc0000;
    color: white;
  }

  #btncad{
    background-color: #005580;
    color: white;
  }

  #myfooster{
      background-color: #595959;
      padding: 15px;
      position: fixed;
      bottom:0;
      left:0;
      right: 0;
    }

  #sair{      
    margin: 10px;
  }
</style>

<body>

<!-- navbar -->
<nav class="topBar" >
    <div class="container">
      <ul class="list-inline pull-left hidden-sm hidden-xs">
        <li><span class="text-primary">Tem alguma dúvida? </span> Pergunte-nos :) (031) 3671-0000</li>
      </ul>
      <ul class="topBarNav pull-right">
          <ul class="list-inline pull-left hidden-sm hidden-xs" role="menu">
            <li><a href="conta.php">
              <?php if(isset($_SESSION['usuario'])) {
              echo utf8_encode($_SESSION['usuario']->nome);
            }else{
              echo "Login";
            } ?>
            </a></li>
            
            <?php if(isset($_SESSION['usuario'])) {
              echo 
              '<li><form action="index.php">
                <button id="sair" name="sair" type="submit" class="btn btn-default">Sair</button>
              </form></li>';
            } ?>            
          </ul>
               
      </ul>
    </div>
  </nav>

<nav class="navbar navbar-inverse " style="opacity: 1; background-color: white;">
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

      <li><a href="index.php" style="font-size: 18px; color: black;">Inicio</a></li>
        <li><a href="carros.php" style="font-size: 18px; color: black;">Carros</a></li>
        <li><a href="anunciar.php" style="font-size: 18px; color: black;">Anuncie</a></li>
        <li><a href="sobre.php" style="font-size: 18px; color: black;">Sobre</a></li>
        <li><a href="faleconosco.php" style="font-size: 18px; color: black;">Contato</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" action="carros.php" method="get">
        <div class="form-group">
          <input type="text" class="form-control" name="pesquisa" placeholder="Qual carro você procura?">
          <button type="submit" name="pesquisar" class="btn btn-default" style="background-color: #ffffff; color: #330000; border-color: #660000;">Pesquisar</button>
        </div>
        
      </form>
      
      </ul>
    </div>
  </div>
</nav>

<form name="formCarro" action="anunciar.php" method="POST" enctype="multipart/form-data">
  <div class="container" style="margin-top:5%;">
  <div class="row">
  <div  class="col-md-2">
    <h1>Anunciar!</h1>     
  </div>
  <div class="col-md-4">
    
    
    <div class="form-group">
              <label for="marca">Marca</label>
              <select name="marca" id="marcas" required="true" class="form-control">
                <option></option>
                <?php if($listacodigo) : ?>
                <?php foreach ($listacodigo as $codigo) : ?>
                <option value="<?php echo $codigo->codigo;?>"><?php echo utf8_encode($codigo->nome);?></option>   
                <?php endforeach; ?>    
                <?php endif; ?>
              </select>
    </div> 
 
    <div class="form-group" id="modelos" style="display: none;">
              <label for="nome">Modelo</label>
              <select name="nome" required="true" id="modelo" class="form-control">
                <option></option>                
              </select>
    </div>

    <div class="form-group">
                <label for="preco">Preço</label>
                <input type="text" required="true" id="preco" min="1" placeholder="R$ 100 000 (Apenas números , sem espaços)" name="preco" class="form-control" >
    </div>

    <div class="form-group">
                <label for="ano">Ano</label>
                <input type="number" min="1900" max="2020" placeholder="2018" required="true" minlength="4" maxlength="4" name="ano" class="form-control">
    </div>           

    <div class="form-group">
                <label for="infos_adicionais">Informações Adicionais</label>
                <textarea name="infos_adicionais" id="infos" class="form-control noresize" rows="10" placeholder="Portas : 2&#10;Direção : Hidráulica&#10;KMs rodados : 100km"></textarea>
    </div>

    <div class="form-group">
                <label for="foto"></label>
                <input type="file" required="true" name="foto" >
    </div>    
  </div>

  <div class="col-md-4">
      <div class="form-group">
        <label for="quilometragem">Quilometragem</label>
        <input type="number" placeholder="70000" min="0" required="true" name="quilometragem" class="form-control">
      </div> 

      <div class="form-group">
        <label for="cambio">Câmbio</label>
        <input type="text" placeholder="Manual/Automático" required="true" name="cambio" class="form-control">
      </div>

      <div class="form-group">
        <label for="portas">Portas</label>
        <input type="number" placeholder="4 portas" min="1" max="10" required="true" name="portas" class="form-control">
      </div>  

      <div class="form-group">
        <label for="combustivel">Combustível</label>
        <input type="text" placeholder="Bi-Combustível" required="true" name="combustivel" class="form-control">
      </div>

      <div class="form-group">
        <label for="cor">Cor</label>
        <input type="text" placeholder="Preto" required="true" name="cor" class="form-control">
      </div> 

      <div class="form-group">
        <label for="placa">Placa</label>
        <input type="text" placeholder="Apenas letras (XXX)" required="true" name="placa" id="placa" class="form-control">
      </div> 

      <div class="form-group">
          <label for="troca">Aceitar Trocas</label>
          <select class="form-control" name="troca">
            <option value="sim">Sim</option>
            <option value="nao">Não</option>
          </select>
      </div> 

      <div class="row">
    <div class="col-md-2"></div>
      <div class="col-md-4">
        <button type="submit" id="btncad" class="btn btn-block" name="inserir">Salvar</button>
      </div>
      <div class="col-md-4">
        <button type="reset" id="btnlimpar" class="btn btn-block">Limpar</button>
      </div>
      <div class="col-md-2"></div>
  </div> 
  </div>

  <div class="col-md-2"></div>


  
  </div>
  </div>
</form>
<footer class="container-fluid text-center" id="myfooster">
  <p style="color:white;">King car</p>  
  <form action="index.php" method="get" class="form-inline">
    <label style="color:white;">Receber novos anúncios :  </label>

    <input type="email" name="email" class="form-control" size="50" placeholder="email@usuario.com" >
    <button type="submit" class="btn btn-success " name="salvarEmail">Salvar</button>
  </form>
</footer>
<script src="jquery.mask.js" type="text/javascript"></script>
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