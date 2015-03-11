<?php 

function listarPaginas($conecta){
	
$sqlPaginas = "SELECT * FROM paginas";
$stmt = $conecta->prepare($sqlPaginas);
$stmt->execute();
$paginas = $stmt->fetchAll(PDO::FETCH_ASSOC);

return $paginas;
}


function recuperarConteudo($conecta, $id){
	$sqlConteudo = "SELECT conteudo FROM paginas WHERE id = :id";
	$stmt = $conecta->prepare($sqlConteudo);
	$stmt->bindValue('id', $id);
	$stmt->execute();
	$resultado = $stmt->fetch(PDO::FETCH_ASSOC);
	return $resultado['conteudo'];
}

function salvarPagina($conecta, $id, $conteudo){
	$sqlSalvaPagina = 'UPDATE paginas SET conteudo = :conteudo WHERE id = :id';
	$stmt = $conecta->prepare($sqlSalvaPagina);
	$stmt->bindValue('conteudo', $conteudo);
	$stmt->bindValue('id', $id);
	$stmt->execute();
}

?>