<?php 


// $usuario  = string com o que foi postado em user
// $password = string com o que foi postado em password

function validaUserSessao($user, $password, $conecta){


$sql = "SELECT * FROM users WHERE username = :user";
$stmt = $conecta->prepare($sql);
$stmt->bindValue(':user', $user);
$stmt->execute();

$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

if($resultado){
	if(password_verify($password, $resultado['password'])){
		$_SESSION['logado'] = true;
	}
}

if(!isset($_SESSION['logado']) || $_SESSION['logado'] != true){
	require_once'index.php';
	die();
}
}


function validaUserPagina(){
	if(isset($_SESSION['logado'])){
		$autentica = $_SESSION['logado'];
	}else{
		$autentica = null;
	}
	if(!isset($autentica) || $autentica == false){
		require_once 'index.php';
		die();
	}
}


 ?>