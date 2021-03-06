<?php
  header("Content-type:text/html; charset=utf8");
  require_once('conexaobd.php');


  $codigo = new Carros();

  if(isset($_POST['enviar'])){
    $codigo->AtualizarSenha();  
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Fale Conosco</title>
  <meta charset="utf-8">
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/sobre.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="//code.jivosite.com/widget.js" data-jv-id="M8AgwKTtAZ" async></script>
</head>
<body>
<style type="text/css">
  .form-gap {
    padding-top: 5%;
  }
</style>
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

<div class="form-gap"></div>
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="text-center">
            <h3><i class="fa fa-lock fa-4x"></i></h3>
            <h2 class="text-center">Atualizar senha</h2>
            <p>Atualize aqui sua senha.</p>
            <div class="panel-body">
    
              <form role="form" autocomplete="off" class="form" action="editarsenha.php" method="POST">
    
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-wrench color-blue"></i></span>
                    <input id="codigo" required="true" name="codigo" placeholder="Digite o código recebido" class="form-control"  type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
                    <input id="senha" required="true" name="senha" placeholder="Digite sua nova senha" class="form-control"  type="password">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
                    <input id="confsenha" required="true" name="confsenha" placeholder="Digite novamente sua nova senha" class="form-control"  type="password">
                  </div>
                </div>
                <div class="form-group">
                  <input name="enviar" class="btn btn-lg btn-primary btn-block" value="Recuperar Senha" type="submit">
                </div>
                      
              </form>
    
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
