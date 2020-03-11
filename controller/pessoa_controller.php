<?php
//Inclusão da clase base pessoa
include ('/../models/pessoa.php');


define("ID", "id");
define("EMPRESA", "empresa");
define("NOME", "nome");

//Recebimento da ação do usuario
$action = $_POST['action'];

if($action == 'inserir'){
	executarAcaoContatoSemRetorno($action);
	include ('/../views/msg_sucesso.php');
}

if($action == 'excluir'){
	executarAcaoContatoSemRetorno($action);
	include ('/../views/msg_exclusao.php');
}

if($action == 'alterar_finalizar'){
	executarAcaoContatoSemRetorno($action);
	include ('/../views/msg_alteracao.php');
}

if($action == 'alterar'){
	
	$connect = connectToMyDB();
	if($connect){
		$p = new Pessoa($_POST[ID],null,null);
		$query = $p->genSelectQuery($connect);
		$query->execute();
		$resultSet = $query->get_result();

		while($rs = $resultSet->fetch_assoc()){
			$p = new Pessoa($rs[ID],$rs[NOME], $rs[EMPRESA]);
		}
		mysqli_close($connect);
	}
	include ('/../views/tela_alteracao.php');
}




function executarAcaoContatoSemRetorno($action){
	$connect = connectToMyDB();
	
	if($connect){
		switch($action){
			case "inserir":
				$p = new Pessoa(null,$_POST[NOME],$_POST[EMPRESA]);
				$query = $p->genInsertQuery($connect);
				break;

			case "excluir":
				$p = new Pessoa($_POST[ID],null,null);
				$query = $p->genDeleteQuery($connect);
				break;
			
			case "alterar_finalizar":
				$p = new Pessoa($_POST[ID],$_POST[NOME],$_POST[EMPRESA]);
				$query = $p->genUpdateQuery($connect);
				break;		
		}

		$query->execute();
		mysqli_close($connect);
	}
}

?>