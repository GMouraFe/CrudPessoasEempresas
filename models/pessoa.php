<?php
	class Pessoa{
		var $id;
		var $nome;
		var $empresa;
		
		//Construtores
		function __construct($input_id, $input_nome, $input_empresa){
			$this->id = $input_id;
			$this->nome = $input_nome;
			$this->empresa = $input_empresa;
		}
		
		//Funcoes de querys
		function genInsertQuery(){
			return "INSERT INTO pessoas (nome,empresa)VALUES('".$this->nome."','".$this->empresa."')";
		}
		function genDeleteQuery(){
			return "Delete from pessoas where id ='".$this->id."'";
		}
		function genUpdateQuery(){
			return "UPDATE pessoas SET nome = '".$this->nome."', empresa = '".$this->empresa."' WHERE pessoas.id = '".$this->id."'";
		}
		
		function genSelectQuery(){
			return "Select id, nome, empresa from pessoas WHERE id = '".$this->id."'";
		}
	}
?>