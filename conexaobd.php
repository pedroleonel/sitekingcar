<?php
session_start();
header("Content-type:text/html;charset=utf8");
define("server", "mysql:host=localhost;dbname=kingcar");
define('user', 'root');
define('senha', 'root'); //2m56ABz5FnAm7N23



if(isset($_GET['sair'])) {
    session_destroy();
    header("location:index.php");
}

class Carros{

    public function listarAll($inicio = 1, $maximo = 5){
        
        $pdo = new PDO(server, user, senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        
        $smtp = $pdo->prepare("select * from carro where status = 'A' order by id desc LIMIT $inicio, $maximo");        
        $smtp->execute();
        
        if ($smtp->rowCount() > 0) {
            return $result = $smtp->fetchAll(PDO::FETCH_CLASS);
        }
    }

    public function listar(){
        $pdo = new PDO(server, user, senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $smtp = $pdo->prepare("select * from carro");
        $smtp->execute();

        if($smtp->rowCount() > 0){
            return $smtp->rowCount();
        }
    }

    public function listarDetalhes(){
        
        $pdo = new PDO(server, user, senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id_carro = $_GET['id'];
        $smtp = $pdo->prepare("select * from carro where id = '$id_carro'");        
        $smtp->execute();
        
        if ($smtp->rowCount() > 0) {
            return $result = $smtp->fetchAll(PDO::FETCH_CLASS);
        }
    }

    public function listarCarro($inicio = 1, $maximo = 5){

        $marca_codigo = "";
        $pdo = new PDO(server, user, senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (isset($_GET["marca"]) || isset($_GET["modelo"]) || isset($_GET["pesquisa"]) || isset($_GET["ano_menor"]) || isset($_GET["ano_maior"]) || isset($_GET["estado"])){    
            if(isset($_GET["marca"]))
            {
                $marca = $_GET["marca"];
                $smtp = $pdo->prepare("select * from carro where marca_codigo = '$marca' and status = 'A' order by id desc limit $inicio, $maximo");        
                $smtp->execute();

            }
            else if(isset($_GET["marca"]) && isset($_GET["modelo"]))
            {
                $marca = $_GET["marca"];
                $modelo = $_GET["modelo"];
                $smtp = $pdo->prepare("select * from carro where marca_codigo = '$marca' and nome = '$modelo' and status = 'A' order by id desc limit $inicio, $maximo");        
                $smtp->execute();

            }else if(!isset($_GET["marca"]) && !isset($_GET["modelo"])){
                $pesquisa = $_GET["pesquisa"];
                $smtp = $pdo->prepare("select * from carro where nome like '%$pesquisa%' and status = 'A' order by id desc limit $inicio, $maximo");        
                $smtp->execute();
            }

            else{
                $pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
            $maximo = 15;
            $inicio = (($maximo * $pagina) - $maximo);
                $this->listarAll($inicio,$maximo);
            }
        if($smtp->rowCount() > 0) 
        {
            return $result = $smtp->fetchAll(PDO::FETCH_CLASS);
        }
        }

        else
        {
            $pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
            $maximo = 15;
            $inicio = (($maximo * $pagina) - $maximo);
            $this->listarAll($inicio,$maximo);
            if($smtp->rowCount() > 0) 
        {
            return $result = $smtp->fetchAll(PDO::FETCH_CLASS);
        }
        }   
    }

    public function listarMarca(){
        
        $pdo = new PDO(server, user, senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $smtp = $pdo->prepare("select * from marca order by nome");


        $smtp->execute();

        if ($smtp->rowCount() > 0) {
            return $result = $smtp->fetchAll(PDO::FETCH_CLASS);
        }
    }

    public function listar_venda_Inativa(){
        
        $pdo = new PDO(server, user, senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $smtp = $pdo->prepare("select * from carro where status = 'I' order by id");


        $smtp->execute();


        if ($smtp->rowCount() > 0) {
            return $result = $smtp->fetchAll(PDO::FETCH_CLASS);
        }
    }

    public function listar_contatoPendente(){
        
        $pdo = new PDO(server, user, senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $smtp = $pdo->prepare("select * from contato where situacao = 'P' order by codigo");


        $smtp->execute();

        if ($smtp->rowCount() > 0) {
            return $result = $smtp->fetchAll(PDO::FETCH_CLASS);
        }
    }

    public function AttVenda($codigo){
        $pdo = new PDO(server, user, senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $smtp = $pdo->prepare("update carro set status = 'A' where id = '$codigo'");

        $smtp->execute();     
    }

    public function AttContato($codigo){

        $pdo = new PDO(server, user, senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $smtp = $pdo->prepare("update contato set situacao = 'A' where codigo = '$codigo'");


        $smtp->execute();     
    }

    public function listarModelo(){
        
        $pdo = new PDO(server, user, senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $smtp = $pdo->prepare("select * from modelo");

        $smtp->execute();

        if ($smtp->rowCount() > 0) {
            return $result = $smtp->fetchAll(PDO::FETCH_CLASS);
        }
    }

    public function faleconosco(){

        $Codigo = "";
        $Nome = "";
        $Email = "";
        $Situacao = "";
        $Mensagem = "";
        $pdo = new PDO(server, user, senha);
        if(isset($_GET["nome"]) && isset($_GET["email"]) && isset($_GET["mensagem"])){
            $this->Nome = utf8_decode($_GET["nome"]);
            $this->Email = $_GET["email"];            
            $this->Situacao = "P";
            $this->Mensagem = utf8_decode($_GET["mensagem"]);

            $smtp = $pdo->prepare("insert into contato(codigo,nome,email,situacao,mensagem) values(null, :nome, :email, :situacao, :mensagem)");
            $smtp->execute(array(
                ':nome' => $this->Nome,
                ':email' => $this->Email,
                ':situacao' => $this->Situacao,
                ':mensagem' => $this->Mensagem
            ));            
        }
        if ($smtp->rowCount() > 0) {
            return $result = $smtp->fetchAll(PDO::FETCH_CLASS);
        }
    }

    public function receberanuncio(){

        $Email_Anuncio = "";
        $Situacao_Anuncio = "";
        $pdo = new PDO(server, user, senha);

        if(isset($_GET["email"])){            
        $this->Email_Anuncio = $_GET["email"];
        $this->Situacao_Anuncio = "A";     

        $smtp = $pdo->prepare("insert into receber_anuncio(codigo,situacao,email) values(null, :situacao, :email)");
        $smtp->execute(array(
            ':situacao' => $this->Situacao_Anuncio,
            ':email' => $this->Email_Anuncio
        ));            
        }
        if ($smtp->rowCount() > 0) {
            return $result = $smtp->fetchAll(PDO::FETCH_CLASS);
        }
    }

    public function inserirAnuncio(){

        /*$Nome_Anuncio = "";
        $Marca_Anuncio = "";
        $Modelo_Anuncio = "";
        $Preco_Anuncio = "";
        $Ano_Anuncio = "";
        $Informacoes_Anuncio = "";
        $Foto_Anuncio = ""; */
        $SendCadImg = filter_input(INPUT_POST, 'inserir', FILTER_SANITIZE_STRING);
        $nomeimg = $_FILES["foto"]["name"];
        /*$Usuario_ID = "";
        $Usuario_Nome = "";
        $Usuario_Tel1 = "";
        $Usuario_Tel2 = "";
        $Usuario_Endereco = "";
        $Quilometragem = 0;
        $Cambio = "";
        $Portas = "";
        $Combustivel = "";
        $Cor = "";
        $Placa = "";
        $Trocas = ""; */

        $pdo = new PDO(server, user, senha);
        if(isset($_POST["marca"]) && isset($_POST["nome"]) && isset($_POST["preco"]) &&
            isset($_POST["ano"]) && isset($_POST["infos_adicionais"]) && isset($_FILES["foto"]) 
            && isset($_POST["quilometragem"]) && isset($_POST["cambio"]) && isset($_POST["portas"]) 
            && isset($_POST["combustivel"]) && isset($_POST["cor"]) && isset($_POST["placa"]) 
            && isset($_POST["troca"])){

            $SendCadImg = filter_input(INPUT_POST, 'inserir', FILTER_SANITIZE_STRING);
            $Nome_Anuncio = utf8_decode($_POST["nome"]);
            $Marca_Anuncio = utf8_decode($_POST["marca"]);        
            $Preco_Anuncio = $_POST["preco"];
            $Ano_Anuncio = $_POST["ano"];
            $Informacoes_Anuncio = utf8_decode($_POST["infos_adicionais"]);
            $Foto_Anuncio =  $nomeimg;
            $Usuario_ID = $_SESSION['usuario']->id;
            $Usuario_Nome = $_SESSION['usuario']->nome;
            $Usuario_Tel1 = $_SESSION['usuario']->telefone;
            $Usuario_Tel2 = $_SESSION['usuario']->telefone2;
            $Usuario_Endereco = $_SESSION['usuario']->estado;
            $Quilometragem = $_POST["quilometragem"];
            $Cambio = utf8_decode($_POST["cambio"]);
            $Portas = $_POST["portas"];
            $Combustivel = utf8_decode($_POST["combustivel"]);
            $Cor = utf8_decode($_POST["cor"]);
            $Placa = $_POST["placa"];
            $Trocas = $_POST["troca"];
        

            $smtp = $pdo->prepare("insert into carro(id,nome,marca_codigo,preco,ano,foto,infos_adicionais,status,usuario_id,usuario_nome,usuario_tel1,usuario_tel2,usuario_endereco,quilometragem,cambio,portas,combustivel,cor,placa,troca)
                values(null,'$Nome_Anuncio','$Marca_Anuncio','$Preco_Anuncio','$Ano_Anuncio','$Foto_Anuncio','$Informacoes_Anuncio','I','$Usuario_ID','$Usuario_Nome', '$Usuario_Tel1','$Usuario_Tel2','$Usuario_Endereco','$Quilometragem','$Cambio', '$Portas','$Combustivel','$Cor','$Placa','$Trocas')");

            $smtp->execute();
            
            /* recuperar ultimo id */
            $ultimo_id = $pdo->lastInsertId();

            /* diretorio onde o arquivo vai ser salvo */
            $diretorio = 'imgBD/'.$ultimo_id.'/';

            /* criar pasta para foto */
            mkdir($diretorio, 0755);
            /* mover foto para pasta */
            move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$nomeimg);
                    
        }
        else{
            header("location:index.php");
        }
        
        if ($smtp->rowCount() > 0) {
            return $result = $smtp->fetchAll(PDO::FETCH_CLASS);
        }else{
            echo "<script> alert('Falha ao anunciar, algo inesperado aconteceu!'); window.location.href='anunciar.php';</script>";
            header("location:index.php");
        }
    }

    public function cadModelo(){

        $Nome_Modelo = "";
        $Marca_Modelo = "";
        $pdo = new PDO(server, user, senha);
        if(isset($_GET["nome"]) && isset($_GET["marca"])){
            $this->Nome_Modelo = utf8_decode($_GET["nome"]);
            $this->Marca_Modelo = utf8_decode($_GET["marca"]);

            $smtp = $pdo->prepare("insert into modelo(codigo,nome,marca_codigo)
            values(null, :nome, :marca_codigo)");
            $smtp->execute(array(
                ':nome' => $this->Nome_Modelo,
                ':marca_codigo' => $this->Marca_Modelo,
            ));            
        }
        
        if ($smtp->rowCount() > 0) {
            return $result = $smtp->fetchAll(PDO::FETCH_CLASS);
        }
    }

    public function cadMarca(){

        $Nome_Marca = "";
        $pdo = new PDO(server, user, senha);
        if(isset($_GET["nome_marca"])){
            $this->Nome_Marca = utf8_decode($_GET["nome_marca"]);

            $smtp = $pdo->prepare("insert into marca(codigo,nome)
            values(null, :nome)");
            $smtp->execute(array(
                ':nome' => $this->Nome_Marca
            ));            
        }
        
        if ($smtp->rowCount() > 0) {
            return $result = $smtp->fetchAll(PDO::FETCH_CLASS);
        }
    }

    public function cadUsuario(){
        $pdo = new PDO(server, user, senha);
        
        $nome = utf8_decode($_POST["nome"]);
        $cpf = $_POST["cpf"];
        $dtnasc = $_POST["dtnasc"];
        $telefone = $_POST["telefone"];
        $telefone2 = $_POST["telefone2"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $con_senha = $_POST["confirmar_senha"];
        $cep = $_POST["cep"];
        $rua = utf8_decode($_POST["rua"]);
        $numero_casa =  $_POST["numero_casa"];
        $bairro = utf8_decode($_POST["bairro"]);
        $cidade = utf8_decode($_POST["cidade"]);
        $estado = $_POST["estado"];

        
        $verificar_email = new PDO(server, user, senha);
        $verificar_email->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $qtd = $verificar_email->prepare("select * from usuario where email = '$email'");
        
        $qtd->execute();

        
        if ($qtd->rowCount() > 0) {

            echo "<script> alert('Este email está em uso, utilize outro.');</script>";
        }
        else{
            if ($senha != $con_senha) {      
                echo "<script> alert('Senhas não se confirmam'); window.location.href='form.php';</script>";    
            }
            else{
                $smtp = $pdo->prepare("insert into usuario(id, nome, cpf, dt_nascimento, telefone, telefone2, email, senha, cep, rua, numero_casa, bairro, cidade, estado, tipo, chave) values (Null,'$nome','$cpf','$dtnasc','$telefone','$telefone2','$email',md5('$senha'),'$cep','$rua','$numero_casa','$bairro','$cidade','$estado','B','')");
                $smtp->execute();
                header("location: conta.php");   

                
                if ($smtp->rowCount() > 0) {
                return $result = $smtp->fetchAll(PDO::FETCH_CLASS);        
                }
            }
        }
    }

    public function GerarCodigo($qtdCaraceters = 8){
        /* Letras minúsculas embaralhadas */
        /* $letrasMinusculas = str_shuffle('abcdefghijklmnopqrstuvwxyz'); */
 
        // Letras maiúsculas embaralhadas */ 
        $letrasMaiusculas = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
 
        /* Números aleatórios */
        $numeros = (((date('Ymd') / 12) * 24) + mt_rand(800, 9999));
        $numeros .= 1234567890;
 
        /* Caracteres Especiais */
        /* $CaracteresEspeciais = str_shuffle('!@#$%*-'); */
 
        /*Juntar tudo */
        /* $caracteres = $letrasMaiusculas.$letrasMinusculas.$numeros.$CaracteresEspeciais; */
        $caracteres = $letrasMaiusculas.$numeros;
 
        /* Embaralha e pega apenas a quantidade de caracteres informada no parâmetro */
        $senha = substr(str_shuffle($caracteres), 0, $qtdCaraceters);
 
        /* Retorna a senha */
        return $senha;

        /*2m56ABz5FnAm7N23*/
    }

    public function RecuperarSenha(){
        $email = $_POST['email'];
        $chave = $this->GerarCodigo(8);
        /* echo "<script> alert('$chave');</script>"; */
        $pdo = new PDO(server, user, senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $smtp = $pdo->prepare("update usuario set chave = '$chave' where email = '$email'");
        echo "<script> window.location.href='editarsenha.php'; </script>";

        
        $smtp->execute();

        /* O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822. */
        /* O return-path deve ser ser o mesmo e-mail do remetente. */
        $headers = "MIME-Version: 1.1\r\n";
        $headers .= "Content-type: text/plain; charset=UTF-8\r\n";
        $headers .= "From: @gmail.com\r\n"; /* remetente */
        $headers .= "Return-Path: @gmail.com\r\n"; /* return-path */
        $envio = mail("@.com.br", "Assunto", "Texto", $headers);
 
        if($envio){
            echo "Mensagem enviada com sucesso";
        }
        else{
            echo "A mensagem não pode ser enviada";
        }
    }

    public function AtualizarSenha(){
        $chave = $_POST['codigo'];
        $senha = $_POST['senha'];
        $confsenha = $_POST['confsenha'];

        if($senha != $confsenha) {
            "<script> alert('Dádos inválidos!');</script>";
        }else{
            $pdo = new PDO(server, user, senha);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $smtp = $pdo->prepare("update usuario set senha = md5('$senha'),chave = '' where chave = '$chave'");
            echo "<script> alert('Senha atualizada com sucesso!');window.location.href='conta.php';</script>";

            
            $smtp->execute();
        }
    }

    public function EnviarEmail(){
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $mensagem = addslashes($_POST['mensagem']);

        $to = "@.com.br";
        $subject = "Contato - Site";
        $body = "Nome: ".$nome. "\r\n".
                "Email: ".$email. "\r\n".
                "Mensagem: ".$mensagem;

        $header = "From:"."\r\n"
        ."Reply-To:".$email."\r\n"
        ."X=Mailer:PHP/".phpversion();

        if(mail($to,$subject,$body,$header)){
            echo("email enviado com sucesso");
        }else{
            echo("email não pode ser enviado com sucesso");
        }
    }

    public function EditarDados($id){

        $nome = utf8_decode($_POST['nome']);
        $telefone1 = $_POST['telefone1'];
        $telefone2 = $_POST['telefone2'];
        $cep = $_POST['cep'];
        $rua = utf8_decode($_POST['rua']);
        $numero = $_POST['numero'];
        $bairro = utf8_decode($_POST['bairro']);
        $cidade = utf8_decode($_POST['cidade']);
        $estado = utf8_decode($_POST['estado']);

        $pdo = new PDO(server, user, senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $smtp = $pdo->prepare("update usuario set nome = '$nome', telefone = '$telefone1', telefone2 = '$telefone2', cep = '$cep', rua = '$rua', numero_casa = '$numero', bairro = '$bairro', cidade = '$cidade', estado = '$estado' where id = '$id'");
        $smtp->execute();
        session_destroy();
        echo "<script> alert('Dados atualizados!');window.location.href='conta.php';</script>";
    }

    public function EditarSenha($id){

        $senha = md5($_POST['senha_atual']);
        $confirmar_senha = $_POST['confirmar_senha'];
        $nova_senha = $_POST['nova_senha'];
        $usenha = $_SESSION['usuario']->senha;

        if($senha == $usenha && $nova_senha == $confirmar_senha){
            $pdo = new PDO(server, user, senha);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $smtp = $pdo->prepare("update usuario set senha = md5('$nova_senha') where id = '$id'");        
            $smtp->execute();
            echo "<script> alert('Senha atualizada com sucesso!');window.location.href='conta.php';</script>";
        }else{
            echo "<script> alert('Dados inválidos!');window.location.href='conta.php';</script>";
        }
    }

    public function MeusAnuncios($id){
        
        $pdo = new PDO(server, user, senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $smtp = $pdo-> prepare("select * from carro where usuario_id = '$id' and status = 'A'");
        $smtp->execute();

        if($smtp->rowCount() > 0){
            return $result = $smtp->fetchAll(PDO::FETCH_CLASS);
        }
    }

    public function QtdAnuncio($id){

        $pdo = new PDO(server, user, senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $smtp = $pdo->prepare("select count(*) from carro where usuario_id = '$id'");
        $smtp->execute();

        if($smtp->rowCount() > 0){
            return $result = $smtp->fetchAll(PDO::FETCH_CLASS);
        }
    }

}
