<?php
  header("Content-type:text/html; charset=utf8");
  require_once('conexaobd.php');

  $carros = new Carros();

  if(isset($_POST['cadastrar'])){
	 $carros->cadUsuario();	
  }
?>


<!DOCTYPE html>
<head>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <!--<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />-->
  <title>Criar Conta</title>
    
  <script type="text/javascript"> 
    function limpa_formulario_cep() {
      //Limpa valores do formulário de cep.
      document.getElementById('rua').value=("");
      document.getElementById('bairro').value=("");
      document.getElementById('cidade').value=("");
      document.getElementById('estado').value=(""); 
    }

    function meu_callback(conteudo) {
      if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('rua').value=(conteudo.logradouro);
        document.getElementById('bairro').value=(conteudo.bairro);
        document.getElementById('cidade').value=(conteudo.localidade);
        document.getElementById('estado').value=(conteudo.uf);
      } //end if.
      else {
        //CEP não Encontrado.
        limpa_formulario_cep();
        alert("CEP não encontrado.");
        document.getElementById('cep').value=("");
      }
    }
        
    function pesquisacep(valor) {
      //Nova variável "cep" somente com dígitos.
      var cep = valor.replace(/\D/g, '');
        
      //Verifica se campo cep possui valor informado.
      if (cep !== "") {
        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {
          //Preenche os campos com "..." enquanto consulta webservice.
          document.getElementById('rua').value="...";
          document.getElementById('bairro').value="...";
          document.getElementById('cidade').value="...";
          document.getElementById('estado').value="...";

          //Cria um elemento javascript.
          var script = document.createElement('script');

          //Sincroniza com o callback.
          script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

          //Insere script no documento e carrega o conteúdo.
          document.body.appendChild(script);
        } //end if.
        else {
          //cep é inválido.
          limpa_formulario_cep();
          alert("Formato de CEP inválido.");
        }
      } //end if.
      else {
        //cep sem valor, limpa formulário.
        limpa_formulario_cep();
      }
    }

    function formatar(mascara, documento){
      var i = documento.value.length;
      var saida = mascara.substring(0,1);
      var texto = mascara.substring(i);
  
      if (texto.substring(0,1) != saida){
        documento.value += texto.substring(0,1);
      }
    }

    function onlynumber(evt) {
   var theEvent = evt || window.event;
   var key = theEvent.keyCode || theEvent.which;
   key = String.fromCharCode( key );
   //var regex = /^[0-9.,]+$/;
   var regex = /^[0-9.]+$/;
   if( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
   }
    }
  </script>

  <style type="text/css">
    body {
		  font-family: 'Varela Round', sans-serif;
    }	
	
    .modal-confirm h4 {
		  text-align: center;
		  font-size: 26px;
		  margin: 30px 0 -15px;
    }

    .modal-confirm .form-control, .modal-confirm .btn {
		  min-height: 40px;
		  border-radius: 3px; 
    }

    .modal-confirm .close {
      position: absolute;
		  top: -5px;
		  right: -5px;
    }

    .modal-confirm .modal-footer {
		  border: none;
		  text-align: center;
		  border-radius: 5px;
		  font-size: 13px;
    }

    .modal-confirm .icon-box {
		  color: green;		
		  position: absolute;
		  margin: 0 auto;
		  left: 0;
		  right: 0;
		  top: -70px;
		  width: 95px;
		  height: 95px;
		  border-radius: 50%;
		  z-index: 9;
		  background: green;
		  padding: 15px;
		  text-align: center;
		  box-shadow: 0px 2px 2px green;
    }

    .modal-confirm .icon-box i {
		  font-size: 56px;
		  position: relative;
		  top: 4px;
    }

    .modal-confirm.modal-dialog {
		  margin-top: 80px;
    }
  </style>

  <style type="text/css">
    h11{
      color:red;
    }

    #logo {
      width:50%;
      height:50%;
    }

    .panel-heading{
      font-size:150%;
    }
  </style>
</head>
<body>

<form class="form-horizontal" name="" action="form.php" method="POST">
  <fieldset>
    <div class="panel panel-primary">
      <div class="panel-heading">Cadastro de Cliente</div>
    
      <div class="panel-body">
        <div class="form-group">
          <div class="col-md-11 control-label">
            <p class="help-block"><h11>*</h11> Campo Obrigatório </p>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2 control-label" for="nome">Nome <h11>*</h11></label>  
          <div class="col-md-8">
            <input id="nome" name="nome" placeholder="" class="form-control input-md" required="" type="text">
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2 control-label" for="cpf">CPF <h11>*</h11></label>  
          <div class="col-md-2">
            <input id="cpf" name="cpf" placeholder="Apenas números" class="form-control input-md" required type="text" maxlength="14" OnKeyPress="formatar('999.999.999-99', this)" onkeypress="return onlynumber();" >
          </div>
  
          <label class="col-md-1 control-label" for="dtnasc">Nascimento<h11>*</h11></label>  
          <div class="col-md-2">
            <input id="dtnasc" name="dtnasc" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="text" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2 control-label" for="telefone">Telefone <h11>*</h11></label>
          <div class="col-md-2">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
              <input id="telefone" name="telefone" class="form-control" placeholder="XX XXXXX-XXXX" required="" type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$" OnKeyPress="formatar('## #####-####', this)">
            </div>
          </div>
  
          <label class="col-md-1 control-label" for="telefone2">Telefone</label>
          <div class="col-md-2">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
              <input id="telefone2" name="telefone2" class="form-control" placeholder="XX XXXXX-XXXX" type="text" maxlength="13"  pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$" OnKeyPress="formatar('## #####-####', this)">
            </div>
          </div>
        </div> 

        <div class="form-group">
          <label class="col-md-2 control-label" for="email">Email <h11>*</h11></label>
          <div class="col-md-5">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
              <input id="email" name="email" class="form-control" placeholder="email@email.com" required="" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" >
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2 control-label" for="senha">Senha <h11>*</h11></label>
          <div class="col-md-5">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon  glyphicon-lock"></i></span>
              <input id="senha" name="senha" class="form-control" placeholder="Crie sua senha" required="true" type="password">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2 control-label" for="confirmar_senha">Confirmar Senha <h11>*</h11></label>
          <div class="col-md-5">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon  glyphicon-lock"></i></span>
              <input id="confirmar_senha" name="confirmar_senha" class="form-control" placeholder="Confirme sua senha" required="true" type="password">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2 control-label" for="cep">CEP <h11>*</h11></label>
          <div class="col-md-2">
            <input id="cep" name="cep" placeholder="Apenas números" class="form-control input-md" required="" value="" type="search" maxlength="8" pattern="[0-9]+$">
          </div>        
          <div class="col-md-2">
            <button type="button" class="btn btn-primary" onclick="pesquisacep(cep.value)">Pesquisar</button>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2 control-label" for="prependedtext">Endereço</label>
          <div class="col-md-4">
            <div class="input-group">
              <span class="input-group-addon">Rua</span>
              <input id="rua" name="rua" class="form-control" placeholder="" required="" readonly="readonly" type="text">
            </div>
          </div>

          
          <div class="col-md-2">
            <div class="input-group">
              <span class="input-group-addon">Nº <h11>*</h11></span>
              <input id="numero_casa" name="numero_casa" class="form-control" placeholder="" required=""  type="text">
            </div>
          </div>
  
          <div class="col-md-3">
            <div class="input-group">
              <span class="input-group-addon">Bairro</span>
              <input id="bairro" name="bairro" class="form-control" placeholder="" required="" readonly="readonly" type="text">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2 control-label" for="prependedtext"></label>
          <div class="col-md-4">
            <div class="input-group">
              <span class="input-group-addon">Cidade</span>
              <input id="cidade" name="cidade" class="form-control" placeholder="" required=""  readonly="readonly" type="text">
            </div>
          </div>
  
          <div class="col-md-2">
            <div class="input-group">
              <span class="input-group-addon">Estado</span>
              <input id="estado" name="estado" class="form-control" placeholder="" required=""  readonly="readonly" type="text">
            </div>
          </div>
        </div>

        <!-- Button (Double) -->
        <div class="form-group">
          <label class="col-md-2 control-label" for="cadastrar"></label>
          <div class="col-md-8">
            <button id="cadastrar" name="cadastrar" class="btn btn-success" type="Submit">Confirmar</button>    
            <a style="text-decoration: none; color: white;" href="conta.php" class="btn btn-danger">Cancelar</a>
            <div id="myModal" class="modal fade">
              <div class="modal-dialog modal-confirm">
		            <div class="modal-content">
                  <div class="modal-header">
				            <div class="icon-box">
                      <i class="material-icons">&#xE5CD;</i>
                    </div>				
				            <h4 class="modal-title">Sucesso</h4>	
                  </div>
                  <div class="modal-body">
				            <p class="text-center">Cadastro concluído com sucesso!</p>
                  </div>
                  <div class="modal-footer">
				            <button class="btn btn-success btn-block" data-dismiss="modal" href="conta.php">OK</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- MODAL 2-->
            <div id="myModal2" class="modal fade">
              <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                  <div class="modal-header">
                    <div class="icon-box">
                      <i class="material-icons">&#xE5CD;</i>
                    </div>        
                    <h4 class="modal-title">Erro</h4>  
                  </div>

                  <div class="modal-body">
                    <p class="text-center">Cadastro não foi concluído com sucesso!</p>
                  </div>

                  <div class="modal-footer">
                    <button class="btn btn-danger btn-block" data-dismiss="modal" href="conta.php">OK</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>  
    </div>
  </fieldset>
</form>

</body>
</html>