<?php
session_start();
ob_start();
$btnCadUsuario = filter_input(INPUT_POST, 'btnCadUsuario', FILTER_SANITIZE_STRING);
if($btnCadUsuario){
	include_once 'conexaoLogin.php';
	$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	//var_dump($dados);
	$dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
	
	$result_usuario = "INSERT INTO usuarios (nome, email, usuario, senha) VALUES (
					'" .$dados['nome']. "',
					'" .$dados['email']. "',
					'" .$dados['usuario']. "',
					'" .$dados['senha']. "'
					)";
	$resultado_usario = mysqli_query($conn, $result_usuario);
	if(mysqli_insert_id($conn)){
		$_SESSION['msgcad'] = "Usuário cadastrado com sucesso";
		header("Location: login.php");
	}else{
		$_SESSION['msg'] = "Erro ao cadastrar o usuário";
	}
}
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<title>PagdeCadastro</title>
	
<style>
form { position: ;border-radius: 10px; border: 1px solid #CCC; float: left;  padding: 10px; margin-left: 10px; color:#999; background-color: white; }
form input{  margin: 0px; padding:5px; width:350px; display:block; box-sizing: border-box; }
form textarea{width:10px; display:block;}
body {background-image:url("https://multarte.com.br/wp-content/uploads/2019/02/fundo-universo-hd-tumblr6.jpg");
	  background-position: center; 
      background-repeat: no-repeat;
	 background-size: 2000px 1400px;
	  }
	  input[type=submit]{
		background-color:#D3D3D3 ;
		border: none;
  		color: black;
	  }

h2 {margin-left: 10px; margin-top: 10px; color: white;}

	</style>





  </head>
  <body>
	  <!--barra de navegação-->
	  <nav class="navbar navbar-dark bg-dark">
        <a class="nav-link" href="index.html">Home<span class="sr-only"></span></a>
      </nav> 

  <h2>Área de Cadastro</h2>

		<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		?>
		
		<form name="form" method="POST" action="">
			<label>Nome</label>
			<input type="text" name="nome" placeholder="Digite o nome e o sobrenome" Required><br><br>
			
			<label>E-mail</label>
			<input type="text" name="email" placeholder="Digite o seu e-mail" Required><br><br>
			
			<label>Usuário</label>
			<input type="text" name="usuario" placeholder="Digite o usuário" Required><br><br>
			
			<label>Senha</label>
			<input type="password" name="senha" placeholder="Digite a senha" Required><br><br>
			
			<input type="submit" name="btnCadUsuario" value="Cadastrar" Required><br><br>
			
			<a href="login.php">Fazer Login</a> 
		
		</form>

		




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
