<?php
session_start(); 
require_once 'validacao.php';

validaUserPagina();
require_once '../conexaoDB.php';
require_once 'funcoes.php';
$conecta = conexaoDB(); // abre conexao com o bd

$pagina = $_GET['pagina'];
$id = $_GET['id'];
require_once 'inc/header.php';

$conteudo = recuperarConteudo($conecta, $id);
?>

<div class="col-md-12 box">
	<h2>Página: <?php echo $pagina; ?></h2>
	<form action="painel.php" method="post" name="salvar">
	<textarea name="conteudo" id="conteudo" cols="30" rows="10" value="<?php echo $conteudo;?>"></textarea>
	
	<input type="hidden" name="id_pag" value="<?php echo $id;?>">

	<button type="submit" name="salvar" class="btn btn-sm btn-primary btn-salvar">Salvar</button>
	</form>
</div>



<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>

<?php 
require_once 'inc/footer.php';
?>