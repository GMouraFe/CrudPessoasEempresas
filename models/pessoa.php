<?php
	class Pessoa{
		var $id;
		var $nome;
		var $empresa;
		
		//Construtores
		function Pessoa($input_id, $input_nome, $input_empresa){
			$this->id = $input_id;
			$this->nome = $input_nome;
			$this->empresa = $input_empresa;
		}
		
		//Funcoes de querys
		function genInsertQuery(){
			$sql = "INSERT INTO pessoas (nome,empresa)VALUES('".$this->nome."','".$this->empresa."')";
			return $sql;
		}
		function genDeleteQuery(){
			$sql = "Delete from pessoas where id ='".$this->id."'";
			return $sql;
		}
		function genUpdateQuery(){
			$sql = "UPDATE pessoas SET nome = '".$this->nome."', empresa = '".$this->empresa."' WHERE pessoas.id = '".$this->id."'";
			return $sql;
		}
		
		function genSelectQuery(){
			$sql = "Select id, nome, empresa from pessoas WHERE id = '".$this->id."'";
			return $sql;
		}
	}
?>