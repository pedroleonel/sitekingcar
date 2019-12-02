<?php
header("Content-type:text/html; charset=utf8");
require_once "conexaobd.php";

$carros = new Carros();

if(isset($_GET['salvar'])){
    $carros->faleconosco();
}

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

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Fale Conosco</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/sobre.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="//code.jivosite.com/widget.js" data-jv-id="M8AgwKTtAZ" async></script>

</head>
<body style="background-image: linear-gradient(black, #595959);">
<style>
footer {
      background-color: #595959;
      padding: 10px;
      overflow: hidden;
  bottom: 0;
  width: 100%;
      
    }
  .noresize {
    resize: none; 
  }
  
   #sair{
      
      margin: 10px;
    }
</style>


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

 <!--=========MIDDEL-TOP_BAR============-->    
  <div class="middleBar" style="background-color: #660000;">
    <div class="container">
      <form action="carros.php" method="get">
      <div class="row display-table">
        <!-- end col -->
        <div class="col-lg-10 vertical-align text-center">          
            <div class="row grid-space-1">
              <div class="col-sm-3">
                <div class="col-sm-6">
                  <select class="form-control input-lg" name="ano_menor"style="border-color: #660000;">                  
                    <option value="all">De</option>
                    <?php     
                      for ($i = date("Y"); $i >= 1920; $i--) {
                        echo "<option value='$i'>$i</option>";
                    }?>
                  </select>
                </div>

                <div class="col-sm-6">
                  <select class="form-control input-lg" name="ano_maior" style="border-color: #660000;">                   
                    <option value="all">Até</option>
                    <?php     
                      for ($i = date("Y"); $i >= 1920; $i--) {
                        echo "<option value='$i'>$i</option>";
                    }?>
                  </select>
                </div>
              </div>
              <div class="col-sm-3">
                <select class="form-control input-lg" name="estado" style="border-color: #660000;">
                  <option value="">Estado</option>
                  <option value="AC">Acre</option>
                  <option value="AL">Alagoas</option>
                  <option value="AP">Amapá</option>
                  <option value="AM">Amazonas</option>
                  <option value="BA">Bahia</option>
                  <option value="CE">Ceará</option>
                  <option value="DF">Distrito Federal</option>
                  <option value="ES">Espírito Santo</option>
                  <option value="GO">Goiás</option>
                  <option value="MA">Maranhão</option>
                  <option value="MT">Mato Grosso</option>
                  <option value="MS">Mato Grosso do Sul</option>
                  <option value="MG">Minas Gerais</option>
                  <option value="PA">Pará</option>
                  <option value="PB">Paraíba</option>
                  <option value="PR">Paraná</option>
                  <option value="PE">Pernambuco</option>
                  <option value="PI">Piauí</option>
                  <option value="RJ">Rio de Janeiro</option>
                  <option value="RN">Rio Grande do Norte</option>
                  <option value="RS">Rio Grande do Sul</option>
                  <option value="RO">Rondônia</option>
                  <option value="RR">Roraima</option>
                  <option value="SC">Santa Catarina</option>
                  <option value="SP">São Paulo</option>
                  <option value="SE">Sergipe</option>
                  <option value="TO">Tocantins</option>
                </select>
              </div>
              <!-- end col -->

              <div class="col-sm-3">
                <select class="form-control input-lg" name="marca" id="marcas" style="border-color: #660000;">                  
                  <option value="">Marca</option>
                  <?php if($listacodigo) : ?>
                  <?php foreach ($listacodigo as $codigo) : ?>
                  <option value="<?php echo $codigo->codigo;?>"><?php echo $codigo->nome;?></option>   
                  <?php endforeach; ?>    
                  <?php endif; ?>
                </select>
              </div>

              <!-- end col -->
              <div class="col-lg-3">
                <select class="form-control input-lg" name="modelo" id="modelo" style="border-color: #660000;">                  
                  <option value="">Modelo</option>
                </select>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          
        </div>
        <!-- end col -->
        <div class="col-sm-2 vertical-align header-items hidden-xs">
          <button type="submit" class="btn btn-default btn-block btn-lg" style="background-color: #ffffff; color: #330000; border-color: #660000;" name="pesquisar">Filtrar</button>
        </div>
        <!-- end col -->
      </div>
      </form>
      <!-- end  row -->
    </div>
  </div>    
  
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

<div class="container" style="margin-top:5%;">
<div class="row">
    <div  class="col-md-2">
   
                
    </div>
    <div class="col-md-8">
        <form action="faleconosco.php" method="get">
            <div class="form-group">
            <h1 style="color: white;">CONTATO</h1>
                <label style="color: white;" for="nome">Nome</label>
                <input type="nome" name="nome" class="form-control">
            </div>

            <div class="form-group">
                <label style="color: white;" for="email">Email</label>
                <input type="email" name="email" class="form-control">
            </div>

             <div class="form-group">
                <label style="color: white;" for="email">Assunto</label>
                <input type="text" name="assunto" class="form-control">
            </div>

            <div class="form-group">
                <label style="color: white;" for="mensagem">Mensagem</label>
                <textarea name="mensagem" maxlength="400" id="mensagem" class="form-control noresize" cols="30" rows="10"></textarea>
            </div>

            <div class="row">
                <div class="col-md-2">
                  
                </div>
                <div class="col-md-8">
                  <div class="row">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success btn-block" name="salvar">Salvar</button>
                </div>
                <div class="col-md-6">
                    <button type="reset" class="btn btn-danger btn-block">Limpar</button>
                </div>
            </div>
                </div>
                <div class="col-md-2">
                  
                </div>
                
            </div>

            

        </form>


    </div>
    <div class="col-md-2"></div>

</div>
</div>

<footer class="container-fluid text-center">
  <p style="color:black;">King car</p>  
  <form action="index.php" method="get" class="form-inline">
  <label style="color:black;">Receber novos anúncios :  </label>

    <input type="email" name="email" class="form-control" size="50" placeholder="email@usuario.com" >
    <button type="submit" class="btn btn-success " name="salvarEmail">Salvar</button>
  </form>
</footer>
</body>
</html>
