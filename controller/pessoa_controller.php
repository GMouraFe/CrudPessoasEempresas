<?php
//Inclusão da clase base pessoa
include ('/../models/pessoa.php');
include ('/../resources/DB.php');

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

if($action == 'alterar'){
	
	$connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
	if($connect){
		$p = new Pessoa($_POST[ID],'','');
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

if($action == 'alterar_finalizar'){
	executarAcaoContatoSemRetorno($action);
	include ('/../views/msg_alteracao.php');
}


function executarAcaoContatoSemRetorno($action){
	$connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
	
	if($connect){
		if($action == 'inserir'){
			$p = new Pessoa('',$_POST[NOME],$_POST[EMPRESA]);
			$query = $p->genInsertQuery($connect);
		}
		if($action == 'excluir'){
			$p = new Pessoa($_POST[ID],'','');
			$query = $p->genDeleteQuery($connect);
		}
		if($action == 'alterar_finalizar'){
			$p = new Pessoa($_POST[ID],$_POST[NOME],$_POST[EMPRESA]);
			$query = $p->genUpdateQuery($connect);
		}
		$query->execute();
		mysqli_close($connect);
	}
}

?>