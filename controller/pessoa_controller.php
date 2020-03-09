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
	$id = $_POST['id'];
	$p = new Pessoa($id,'','');
	$connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
	if($connect){
		$query = $p->genSelectQuery();
		$resultset = $connect->query($query);
		while($rs = $resultset->fetch_assoc()){
			$p->id= $rs[ID];
			$p->nome = $rs[NOME];
			$p->empresa = $rs[EMPRESA];
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
			$nome = $_POST[NOME];
			$empresa = $_POST[EMPRESA];
			$p = new Pessoa('',$nome ,$empresa);
			$query = $p->genInsertQuery();
		}
		if($action == 'excluir'){
			$id = $_POST['id'];
			$p = new Pessoa($id,'','');
			$query = $p->genDeleteQuery();
		}
		if($action == 'alterar_finalizar'){
			$id = $_POST[ID];
			$nome = $_POST[NOME];
			$empresa = $_POST[EMPRESA];
			$p = new Pessoa($id,$nome,$empresa);
			$query = $p->genUpdateQuery();
		}
		$connect->query($query);
		mysqli_close($connect);
	}
}

?>