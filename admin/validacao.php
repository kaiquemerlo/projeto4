<?php 


// $usuario  = string com o que foi postado em user
// $password = string com o que foi postado em password
function validaUserSessao($user, $password, $conecta){

$sql = "SELECT * FROM users WHERE username = :user AND password = :password";
$stmt = $conecta->prepare($sql);
$stmt->bindValue(':user', $user);
$stmt->bindValue('password', $password);
$stmt->execute();

$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

$user_validate = $resultado['username'];
$pass_validade = $resultado['password'];

if(isset($user) and isset($password)){
	if($user == $user_validate and $password == $pass_validade){
		$_SESSION['logado'] = true;
	}
}

if(!isset($_SESSION['logado'])){
	require_once'erro.php';
	die();
}
}

if(isset($_SESSION['logado'])){
	$autentica = $_SESSION['logado'];
}
function validaUserPagina($autentica){
	if(!isset($autentica) || $autentica == false){
		require_once 'erro.php';
		die();
	}
}


 ?>