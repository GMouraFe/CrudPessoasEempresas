<?php
//Inclusão da clase base pessoa
include ('/var/www/html/models/pessoa.php');


define("ID", "id");
define("EMPRESA", "empresa");
define("NOME", "nome");

class PessoaController{

	private $connect;
	
	function __construct(){
		$this->connect = connectToMyDB();
	}
	
	function buscarInformacaoAlterarContato(){
		$connect = $this->connect;
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
	function executarAcaoInserirContato(){
		$connect = $this->connect;
		$p = new Pessoa();

		$p->setNome($_POST[NOME]);
		$p->setEmpresa($_POST[EMPRESA]);
		$query = $p->genInsertQuery($connect);

		$query->execute();
		mysqli_close($connect);
	}
	function executarAcaoExcluirContato(){
		$connect = $this->connect;
		$p = new Pessoa();

		$p->setId($_POST[ID]);
		$query = $p->genDeleteQuery($connect);	
		$query->execute();
		mysqli_close($connect);
	}
	function executarAcaoAlterarContato(){
		$connect = $this->connect;
		$p = new Pessoa();

		$p->setId($_POST[ID]);
		$p->setNome($_POST[NOME]);
		$p->setEmpresa($_POST[EMPRESA]);
		$query = $p->genUpdateQuery($connect);	
		$query->execute();

		mysqli_close($connect);
	}
}

?>