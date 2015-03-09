<?php 

function listarPaginas($conecta){

	
$sqlPaginas = "SELECT * FROM paginas";
$stmt = $conecta->prepare($sqlPaginas);
$stmt->execute();
$paginas = $stmt->fetchAll(PDO::FETCH_ASSOC);

return $paginas;
}

?>