<?php 
session_start();
require_once '../conexaoDB.php';
require_once 'validacao.php';
require_once 'funcoes.php';

$conecta = conexaoDB(); // abre conexao com o bd
$user = 0;
$password = 0;

if(isset($_POST['email']) && isset($_POST['password'])){	
	$user = $_POST['email']; // pega o post do usuario
	$password = $_POST['password']; // pega o post da senha
	validaUserSessao($user, $password, $conecta); // chama a funcao para validar o usuario
}else{
	validaUserPagina(); // o login ja foi feito e apenas verifica se existe a sessao
}

$paginas = listarPaginas($conecta); // varivel guardando as info das paginas


require_once 'inc/header.php';


?>

<div class="col-md-12 box">
	<h2>Páginas:</h2>
	<?php 
		if(isset($_POST['salvar'])){ // o formulario de edicao foi submetido
				$id_pag   = $_POST['id_pag'];
				$conteudo = $_POST['conteudo'];
			salvarPagina($conecta, $id_pag, $conteudo);
			echo '<p class="alert alert-success">Conteudo alterado com sucesso!</p>';
		}
	 ?>
	<table class="table table-bordered table-striped">
		<tr>
			<th>Página</th>
			<th>Título</th>
			<th>Ação</th>
		</tr>
		
			<?php
				foreach ($paginas as $p) {
					$id     = $p['id'];
					$pagina = $p['pagina'];
					$titulo = $p['titulo'];
					echo "<tr><td>$pagina</td>";
					echo "<td>$titulo</td>";
					echo "<td>
						  <a href='editar.php?id=$id&pagina=$pagina'><button title='Editar página' class='btn btn-xs btn-default'><span class='glyphicon glyphicon-edit'></span></button></a>
						  <a href='../$pagina' target='_blank'><button title='Visualizar página' class='btn btn-xs btn-default'><span class='glyphicon glyphicon-zoom-in'></span></button>
						  </td></tr>";
				}
			?>
		
	</table>


</div>

<?php
require_once 'inc/footer.php';
?>