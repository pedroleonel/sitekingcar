<?php
  header("Content-type:text/html; charset=utf8");

  require_once('conexaobd.php');
  if ($_SESSION['usuario']->tipo == "B" || $_SESSION['usuario'] == "") {
    header("location: erro404.php");
  }


  $codigo = new Carros();

  $listacodigo = $codigo->listar_venda_Inativa();

  $listacontato = $codigo->listar_contatoPendente();

  $carros = new Carros();
  if(isset($_POST['atualizar'])){
    $carros->AttVenda($codigo = $_POST['codigo']);
    echo "<script> alert('Anúncio autorizado!!');window.location.href='autorizarvenda.php';</script>";
  }

  if(isset($_POST['attContato'])){
    $carros->AttContato($codigo = $_POST['codigo']);
    echo "<script> alert('Contato atualizado!!');window.location.href='autorizarvenda.php';</script>";
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Fale Conosco</title>
  <meta charset="utf-8">
  <script type="text/javascript" src="jquery.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/sobre.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="//code.jivosite.com/widget.js" data-jv-id="M8AgwKTtAZ" async></script>
</head>
<body>


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
    <form action="autorizarvenda.php" method="POST">
    <div  class="col-md-3"><h2>Autorizar venda :</h2></div>
    <div class="col-md-6" style="margin-top: 2%;">
        <div class="col-md-10">
          <select name="codigo" id="codigo" class="form-control">
            <option></option>
                <?php if($listacodigo) : ?>
                <?php foreach ($listacodigo as $codigo) : ?>
                <option value="<?php echo $codigo->id;?>"><?php echo utf8_encode($codigo->nome).' | '.utf8_encode($codigo->usuario_nome).' - '.utf8_encode($codigo->usuario_tel1);?></option>   
                <?php endforeach; ?>    
                <?php endif; ?>
            </select>
        </div>
        <div class="col-md-2">
          <button type="submit" class="btn btn-primary" name="atualizar">Atualizar</button>
        </div>   
    </div>    
    <div class="col-md-3"></div>
    </form>
  </div>

  <div class="row">
    <form action="autorizarvenda.php" method="POST">
    <div  class="col-md-3"><h2>Contato :</h2></div>
    <div class="col-md-6" style="margin-top: 2%;">
        <div class="col-md-10">
          <select name="codigo" id="codigo" class="form-control">
            <option></option>
                <?php if($listacontato) : ?>
                <?php foreach ($listacontato as $contato) : ?>
                <option value="<?php echo $contato->codigo;?>"><?php echo $contato->codigo.' | '.utf8_encode($contato->nome).' - '.utf8_encode($contato->email);?></option>   
                <?php endforeach; ?>    
                <?php endif; ?>
            </select>

                <?php if($listacontato) : ?>
                <?php foreach ($listacontato as $contato) : ?>
            <table class="table table-striped" style="margin-top: 5%;">
              <tr>
                <th>ID</th>
                <th>Mensagem</th>
              </tr>
              <tr>
                <td><?php echo $contato->codigo;?></td>
                <td><div style="width: 400px; word-wrap: break-word;"><?php echo $contato->mensagem;?></div></td>
              </tr>
            </table>
            <?php endforeach; ?>    
                <?php endif; ?>
        </div>
        <div class="col-md-2">
          <button type="submit" class="btn btn-primary" name="attContato">Atualizar</button>
        </div>   
    </div>    
    <div class="col-md-3"></div>
    </form>
  </div>
</div>

</body>
</html>