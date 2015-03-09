<?php 
session_start();
require_once '../conexaoDB.php';
require_once 'validacao.php';
require_once 'funcoes.php';

$conecta = conexaoDB(); // abre conexao com o bd
$user = $_POST['email']; // pega o post do usuario
$password = $_POST['password']; // pega o post da senha

validaUserSessao($user, $password, $conecta); // chama a funcao para validar o usuario

$paginas = listarPaginas($conecta); // lista as paginas


require_once 'inc/header.php';



require_once 'inc/footer.php';



?>