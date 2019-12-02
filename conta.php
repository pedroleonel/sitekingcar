<?php
  header("Content-type:text/html; charset=utf8");

  require_once('conexaobd.php');

  $carros = new Carros();
  if(isset($_SESSION['usuario'])){
    $qtd_anuncio = $carros->QtdAnuncio($id = $_SESSION['usuario']->id);  
  }
  
  if(isset($_POST['attsenha'])){
    $carros->EditarSenha($id = $_SESSION['usuario']->id);
  }

  if(isset($_POST['attdados'])){
    $carros->EditarDados($id = $_SESSION['usuario']->id);
  }

  if(isset($_SESSION['usuario'])){
    $anuncios = $carros->MeusAnuncios($id = $_SESSION['usuario']->id);  
  }
  
  //if(isset($_))
?>
<!DOCTYPE html>
<html>
<head>
<title>
  <?php if(!$_SESSION){ echo "login"; } else { echo utf8_encode($_SESSION['usuario']->nome); } ?>
</title>
</head>
  

<?php
  if(!isset($_SESSION['usuario'])){ ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/sobre.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="//code.jivosite.com/widget.js" data-jv-id="M8AgwKTtAZ" async></script>
    <?php
  }
  else{ ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/sobre.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="//code.jivosite.com/widget.js" data-jv-id="M8AgwKTtAZ" async></script>
    <!-- mascara jquery -->
    <script src="modal_personalizado.js"></script>
    <?php
  }  
  if (!isset($_SESSION['usuario'])){
  ?>
  <style>
  
    html {
      background-color: gray;
    }
    
    body {
      font-family: "Poppins", sans-serif;
      height: 100vh;
      background: gray;
    }

    a{
      color: #92badd;
      display:inline-block;
      text-decoration: none;
      font-weight: 400;
    }

    h2{
      text-align: center;
      font-size: 16px;
      font-weight: 600;
      text-transform: uppercase;
      display:inline-block;
      margin: 40px 8px 10px 8px; 
      color: #cccccc;
    }

    /* STRUCTURE */
    .wrapper{
      display: flex;
      align-items: center;
      flex-direction: column; 
      justify-content: center;
      width: 100%;
      min-height: 100%;
      padding: 20px;
    }

    #formContent{
      -webkit-border-radius: 10px 10px 10px 10px;
      border-radius: 10px 10px 10px 10px;
      background: black;
      padding: 30px;
      width: 90%;
      max-width: 450px;
      position: relative;
      padding: 0px;
      -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
      box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
      text-align: center;
    }

    #formFooter{
      background-color: #f6f6f6;
      border-top: 1px solid #dce8f1;
      padding: 25px;
      text-align: center;
      -webkit-border-radius: 0 0 10px 10px;
      border-radius: 0 0 10px 10px;
    }

    /* TABS */
    h2.inactive{
      color: #cccccc;
    }
  
    h2.active{
      color: #0d0d0d;
      border-bottom: 2px solid #5fbae9;
    }

    /* FORM TYPOGRAPHY*/  
    input[type=button], input[type=submit], input[type=reset]{
      background-color: red;
      border: none;
      color: white;
      padding: 15px 80px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      text-transform: uppercase;
      font-size: 13px;
      -webkit-box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
      box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
      -webkit-border-radius: 5px 5px 5px 5px;
      border-radius: 5px 5px 5px 5px;
      margin: 5px 20px 40px 20px;
      -webkit-transition: all 0.3s ease-in-out;
      -moz-transition: all 0.3s ease-in-out;
      -ms-transition: all 0.3s ease-in-out;
      -o-transition: all 0.3s ease-in-out;
      transition: all 0.3s ease-in-out;
    }

    input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover{
      background-color: #39ace7;
    }

    input[type=button]:active, input[type=submit]:active, input[type=reset]:active{
      -moz-transform: scale(0.95);
      -webkit-transform: scale(0.95);
      -o-transform: scale(0.95);
      -ms-transform: scale(0.95);
      transform: scale(0.95);
    }

    input[type=text]{
      background-color: #f6f6f6;
      border: none;
      color: #0d0d0d;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 5px;
      width: 85%;
      border: 2px solid #f6f6f6;
      -webkit-transition: all 0.5s ease-in-out;
      -moz-transition: all 0.5s ease-in-out;
      -ms-transition: all 0.5s ease-in-out;
      -o-transition: all 0.5s ease-in-out;
      transition: all 0.5s ease-in-out;
      -webkit-border-radius: 5px 5px 5px 5px;
      border-radius: 5px 5px 5px 5px;
    }

    input[type=password]{
      background-color: #f6f6f6;
      border: none;
      color: #0d0d0d;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 5px;
      width: 85%;
      border: 2px solid #f6f6f6;
      -webkit-transition: all 0.5s ease-in-out;
      -moz-transition: all 0.5s ease-in-out;
      -ms-transition: all 0.5s ease-in-out;
      -o-transition: all 0.5s ease-in-out;
      transition: all 0.5s ease-in-out;
      -webkit-border-radius: 5px 5px 5px 5px;
      border-radius: 5px 5px 5px 5px;
    }

    input[type=text]:focus{
      background-color: #fff;
      border-bottom: 2px solid #5fbae9;
    }

    input[type=password]:placeholder{
      color: #cccccc;
    }

    /* ANIMATIONS */
    /* Simple CSS3 Fade-in-down Animation */
    .fadeInDown{
      -webkit-animation-name: fadeInDown;
      animation-name: fadeInDown;
      -webkit-animation-duration: 1s;
      animation-duration: 1s;
      -webkit-animation-fill-mode: both;
      animation-fill-mode: both;
    }

    @-webkit-keyframes fadeInDown{
      0%{
        opacity: 0;
        -webkit-transform: translate3d(0, -100%, 0);
        transform: translate3d(0, -100%, 0);
      }
      100% {
        opacity: 1;
        -webkit-transform: none;
        transform: none;
      }
    }

    @keyframes fadeInDown {
      0%{
        opacity: 0;
        -webkit-transform: translate3d(0, -100%, 0);
        transform: translate3d(0, -100%, 0);
      }

      100%{
        opacity: 1;
        -webkit-transform: none;
        transform: none;
      }
    }

    /* Simple CSS3 Fade-in Animation */
    @-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
    @-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
    @keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
    .fadeIn{
      opacity:0;
      -webkit-animation:fadeIn ease-in 1;
      -moz-animation:fadeIn ease-in 1;
      animation:fadeIn ease-in 1;

      -webkit-animation-fill-mode:forwards;
      -moz-animation-fill-mode:forwards;
      animation-fill-mode:forwards;

      -webkit-animation-duration:1s;
      -moz-animation-duration:1s;
      animation-duration:1s;
    }

    .fadeIn.first{
      -webkit-animation-delay: 0.4s;
      -moz-animation-delay: 0.4s;
      animation-delay: 0.4s;
    }

    .fadeIn.second{
      -webkit-animation-delay: 0.6s;
      -moz-animation-delay: 0.6s;
      animation-delay: 0.6s;
    }

    .fadeIn.third{
      -webkit-animation-delay: 0.8s;
      -moz-animation-delay: 0.8s;
      animation-delay: 0.8s;
    }

    .fadeIn.fourth{
      -webkit-animation-delay: 1s;
      -moz-animation-delay: 1s;
      animation-delay: 1s;
    }

    /* Simple CSS3 Fade-in Animation */
    .underlineHover:after{
      display: block;
      left: 0;
      bottom: -10px;
      width: 0;
      height: 2px;
      background-color: #56baed;
      content: "";
      transition: width 0.2s;
    }

    .underlineHover:hover{
      color: #0d0d0d;
    }

    .underlineHover:hover:after{
      width: 100%;
    }

    /* OTHERS */
    *:focus{
      outline: none;
    }

    #icon{
      width:60%;  
    }
  </style>

  <?php
  }
?>

<body>
<?php if(isset($_SESSION['usuario'])) { ?>
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
<div class="container">
  <div class="row" style="margin-top: 5%;">
    <div class="col-md-3"></div>
      
    <div class="col-md-6">   
      <div class="well">
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#perfil">Perfil</a></li>    
          <li><a data-toggle="tab" href="#senha">Senha</a></li>
          <li><a data-toggle="tab" href="#meusanuncios">Meus Anuncios</a></li>
        </ul>
          
        <div class="tab-content">
          <!-- tab dados -->
          <div id="perfil" class="tab-pane fade in active">
            <form action="conta.php" method="POST">
              <!-- nome -->
              <div class="form-group" style="margin-top: 5%;">
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" value="<?php echo utf8_encode($_SESSION['usuario']->nome);  ?>">
              </div>

              <!-- cpf -->
              <div class="form-group" style="margin-top: 5%;">
                <label for="cpf">CPF</label>
                <input type="number" name="cpf" class="form-control" disabled="true" onkeypress="$(this).mask('000.000.000-00');" value="<?php echo utf8_encode($_SESSION['usuario']->cpf);  ?>" >
              </div>

              <!-- telefone -->
              <div class="form-group" style="margin-top: 5%;">
                <label for="telefone1">Telefone</label>
                <input type="number" name="telefone1" class="form-control" maxlength="11" value="<?php echo utf8_encode($_SESSION['usuario']->telefone);  ?>">
              </div>

              <!-- telefone 2 (opcional) -->
              <div class="form-group" style="margin-top: 5%;">
                <label for="telefone2">Telefone (Opcional)</label>
                <input type="number" name="telefone2" class="form-control" maxlength="11" value="<?php echo utf8_encode($_SESSION['usuario']->telefone2);  ?>">
              </div>

              <!-- email -->
              <div class="form-group" style="margin-top: 5%;">
                <label for="email">Email</label>
                <input type="text" name="email" disabled="true" class="form-control" value="<?php echo utf8_encode($_SESSION['usuario']->email);  ?>">
              </div>

              <!-- cep -->
              <div class="form-group" style="margin-top: 5%;">
                <label for="cep">CEP</label>
                <input type="text" name="cep" class="form-control" onkeypress="$(this).mask('00000-000')" value="<?php echo utf8_encode($_SESSION['usuario']->cep);  ?>">
              </div>

              <!-- rua -->
              <div class="form-group" style="margin-top: 5%;">
                <label for="rua">Rua</label>
                <input type="text" name="rua" class="form-control" value="<?php echo utf8_encode($_SESSION['usuario']->rua);  ?>">
              </div>

              <!-- numero -->
              <div class="form-group" style="margin-top: 5%;">
                <label for="numero">Número</label>
                <input type="number" name="numero" class="form-control" value="<?php echo utf8_encode($_SESSION['usuario']->numero_casa);  ?>">
              </div>

              <!-- bairro -->
              <div class="form-group" style="margin-top: 5%;">
                <label for="bairro">Bairro</label>
                <input type="text" name="bairro" class="form-control" value="<?php echo utf8_encode($_SESSION['usuario']->bairro);  ?>">
              </div>

              <!-- cidade -->
              <div class="form-group" style="margin-top: 5%;">
                <label for="cidade">Cidade</label>
                <input type="text" name="cidade" class="form-control" value="<?php echo utf8_encode($_SESSION['usuario']->cidade);  ?>">
              </div>

              <!-- select estado -->
              <div class="form-group" style="margin-top: 5%;">
                <label for="estado">Estado </label>
                <select id="estado" class="form-control" name="estado">
                  <option selected="<?php echo utf8_encode($_SESSION['usuario']->estado);  ?>"><?php echo utf8_encode($_SESSION['usuario']->estado);  ?></option>
                  <option disabled="true">Selecione seu novo estado</option>
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

              <div align="center">
                <button type="submit" name="attdados" class="btn btn-default">Alterar Dados</button>
              </div>
            </form>
          </div>

          <!-- tab senha -->
          <div id="senha" class="tab-pane fade">
            <form action="conta.php" method="POST">
              <!-- senha atual -->
              <div class="form-group" style="margin-top: 5%;">
                <label for="senha_atual">Senha atual</label>
                <input type="password" name="senha_atual" class="form-control" >
              </div>

              <!-- nova senha -->
              <div class="form-group" style="margin-top: 5%;">
                <label for="nova_senha">Nova Senha</label>
                <input type="password" maxlength="20" name="nova_senha" class="form-control">
              </div>

              <div class="form-group" style="margin-top: 5%;">
                <label for="confirmar_senha">Confirmar senha</label>
                <input type="password" maxlength="20" name="confirmar_senha" class="form-control">
              </div>

              <div align="center">
              <button type="submit" name="attsenha" class="btn btn-default">Alterar Dados</button>
            </div>
            </form>
          </div>

          <div id="meusanuncios" class="tab-pane fade" style="margin-top:5%;">            
            <table class="table table-bordered table-hover" style="background: white;">              
              <thead>
                <tr>
                  <th></th>
                  <th>Carro</th>
                  <th>Preço</th>
                  <th>Ano</th>
                  <th>Endereço</th>
                  <th>Placa</th>
                </tr>
              </thead>
              <tbody>
                <?php if($anuncios) : ?>
                <?php foreach($anuncios as $detalhes_anuncio) : ?>
                <tr>
                  <td><?php echo $detalhes_anuncio->id; ?></td>
                  <td><?php echo $detalhes_anuncio->nome; ?></td>
                  <td><?php echo $detalhes_anuncio->preco; ?></td>
                  <td><?php echo $detalhes_anuncio->ano; ?></td>
                  <td><?php echo utf8_encode($detalhes_anuncio->usuario_endereco); ?></td>
                  <td><?php echo utf8_encode($detalhes_anuncio->placa); ?></td>
                  <td><a href="remover_anuncio.php?id=<?php echo $detalhes_anuncio->id; ?>" data-confirm="Tem certeza ?">Remover Anúncio</a></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
              </tbody>              
            </table>            
          </div>
        </div><!-- tab content -->
      </div>
    </div>

    <div class="col-md-3"></div>
  </div><!-- row -->
</div><!-- container -->

<?php
  }
  else{
?>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <!-- Icon -->
    <div class="fadeIn first">
      <img src="img/logo.png" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form action="autenticacao.php" method="POST">
      <input type="text" id="email" class="fadeIn second" name="email" placeholder="login">
      <input type="password" id="password" class="fadeIn third" name="senha" placeholder="password">
      <input onclick="validation()" type="submit" class="fadeIn fourth" value="Entre">
    </form>

    <div id="formFooter">
      <a class="underlineHover" href="form.php">Crie sua conta</a><br>
      <a class="underlineHover" href="esquecisenha.php">Esqueci minha senha</a>
    </div>
  </div>
</div>

<?php } ?>

</body>
</html>