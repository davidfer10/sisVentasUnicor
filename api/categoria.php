<?php 

require 'Conexion.php';


function ListarCategoria(){

	$datos = array();
	
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		if($id=$_GET['id']){


		$pdo = Conexion::connect();
		$Categoria = $pdo->prepare('SELECT * FROM categoria WHERE idcategoria=?');
		$Categoria->execute(array($id));
		$datos = array();

		if($Categoria->rowCount() > 0) {
			
			while($row = $Categoria->fetch(PDO::FETCH_ASSOC)){
				
				$datos = $row;
				
			}	
			$response = array('estado'=>'ok', 'data' => $datos);

		}else{
			$response = array('estado'=>'ok', 'data' => null );
		}
		
	}
	
	
	elseif(!$_GET['id']){
			$pdo = Conexion::connect();
		$Categorias = $pdo->prepare('SELECT * FROM categoria');
		$Categorias->execute();
		$datos = array();

		if($Categorias->rowCount() > 0) {
			
			while($row = $Categorias->fetch(PDO::FETCH_ASSOC)){
				
				$datos[] = $row;
				
			}	
			$response = array('estado'=>'ok', 'data' => $datos);

		}else{
			$response = array('estado'=>'ok', 'data' => null );
		}
		
	}
	
	echo json_encode($datos);
	Conexion::disconnect();
}
}

ListarCategoria();


?>