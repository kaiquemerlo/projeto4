<?php
if(!isset($_SESSION)){
session_start();
}

if(isset($_GET['acao'])){ //caso tenha clicado em sair destroy as sessoes existentes;
	session_destroy();
}elseif(isset($_SESSION['logado'])){ // caso ja exista a sessão(ja esta logado) entao entra na pagina restrita
	header('Location: painel.php');
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/style_admin.css">
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<title>Painel administrativo</title>
</head>
<body>	
	

<div class="container-fluid barra">
	<div class="row">
		<h1>MARÉ SURF</h1>
	</div>
</div>
	
<div class="container">		
<?php 
$url_admin = $_SERVER['SCRIPT_NAME'];
$caminho = substr($url_admin,0,strpos($url_admin,'index'));
 ?>	
			<div class="login">				
				<form class="sign-in" method="post" name="logar" action="<?php echo $caminho.'painel.php';?>">					
					<h2>Área Administrativa</h2>
					<label class="sr-only" for="inputEmail">Endereço de email</label>
					<input type="text" class="form-control" name="email" placeholder="Email" required="required">
					<label class="sr-only" for="inputSenha">Endereço de email</label>
					<input type="password" class="form-control" name="password" placeholder="Password" required="required">
					<button type="submit" name="enter" class="btn btn-md btn-primary botao"> Login </button>
					<button type="submit" name="enter" class="btn btn-md btn-danger botao"> Forget Password </button>
				</form>
			</div>
</div>



</body>
</html>