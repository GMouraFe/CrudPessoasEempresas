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
		function genInsertQuery($connect){
			$ret = $connect->prepare("INSERT INTO pessoas (nome,empresa)VALUES(?,?)");
			$ret->bind_param("ss", $this->nome,$this->empresa);
			return $ret;
		}
		function genDeleteQuery($connect){
			$ret = $connect->prepare("Delete from pessoas where id = ?");
			$ret->bind_param("i", $this->id);
			return $ret;
		}
		function genSelectQuery($connect){
			$ret = $connect->prepare("Select id, nome, empresa from pessoas WHERE id = ?");
			$ret->bind_param("i", $this->id);
			return $ret;
		}
		function genUpdateQuery($connect){
			$ret = $connect->prepare("UPDATE pessoas SET nome = ?, empresa = ? WHERE pessoas.id = ?");
			$ret->bind_param("ssi", $this->nome, $this->empresa, $this->id);
			return $ret;
		}
		
	}
?>