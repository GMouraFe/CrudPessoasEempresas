<?php
//Inclusão da clase base pessoa
include ('/var/www/html/models/pessoa.php');


define("ID", "id");
define("EMPRESA", "empresa");
define("NOME", "nome");

class PessoaController{

	private $pessoa;
	
	function __construct(){
		$this->pessoa = new Pessoa();
	}
	
	function buscarInformacaoAlterarContato(){
		$this->pessoa->setId($_POST[ID]);
		return $this->pessoa->genSelectQuery();
	}
	function executarAcaoInserirContato(){
		$this->pessoa->setNome($_POST[NOME]);
		$this->pessoa->setEmpresa($_POST[EMPRESA]);
		$this->pessoa->genInsertQuery();
		
	}
	function executarAcaoExcluirContato(){
		$this->pessoa->setId($_POST[ID]);
		$this->pessoa->genDeleteQuery();	

	}
	function executarAcaoAlterarContato(){
		$this->pessoa->setId($_POST[ID]);
		$this->pessoa->setNome($_POST[NOME]);
		$this->pessoa->setEmpresa($_POST[EMPRESA]);
		$this->pessoa->genUpdateQuery();	

	}
	public function getPessoa(){
		return $this->pessoa;
	}


}

?>