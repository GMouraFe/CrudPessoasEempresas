<?php
//Inclusão da clase base pessoa
include ('/var/www/html/models/pessoa.php');


define("ID", "id");
define("EMPRESA", "empresa");
define("NOME", "nome");

function executarAcaoAlterar(){
	$connect = connectToMyDB();
	if($connect){
		$p = new Pessoa();
		$p->setId($_POST[ID]);
		$query = $p->genSelectQuery($connect);
		$query->execute();
		$resultSet = $query->get_result();

		while($rs = $resultSet->fetch_assoc()){
			$p = new Pessoa();
			
			$p->setId($rs[ID]);
			$p->setNome($rs[NOME]);
			$p->setEmpresa($rs[EMPRESA]);
			
		}
		mysqli_close($connect);
	}
	return $p;
}

	
function executarAcaoContatoSemRetorno($action){
	$connect = connectToMyDB();
	
	if($connect){
		switch($action){
			case "inserir":
				$p = new Pessoa();
				
				$p->setNome($_POST[NOME]);
				$p->setEmpresa($_POST[EMPRESA]);
				$query = $p->genInsertQuery($connect);
				break;

			case "excluir":
				$p = new Pessoa();
				
				$p->setId($_POST[ID]);
				$query = $p->genDeleteQuery($connect);
				break;
			
			case "alterar_finalizar":
				$p = new Pessoa();
				
				$p->setId($_POST[ID]);
				$p->setNome($_POST[NOME]);
				$p->setEmpresa($_POST[EMPRESA]);
				$query = $p->genUpdateQuery($connect);
				break;
			default:
				break;
		}

		$query->execute();
		mysqli_close($connect);
	}
}

?>