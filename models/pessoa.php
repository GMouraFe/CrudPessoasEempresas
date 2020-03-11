<?php
	include ('/var/www/html/resources/DB.php');

	class Pessoa{
		var $id;
		var $nome;
		var $empresa;
		
		//Construtores
		function __construct(){

		}
		//Getters e Setters
		
		public function setId($id){
			$this->id = $id;
		}
		
		public function setNome($nome){
			$this->nome = $nome;
		}
		
		public function setEmpresa($empresa){
			$this->empresa = $empresa;
		}
		
		public function getId(){
			return $this->id;
		}
		
		public function getNome(){
			return $this->nome;
		}
		
		public function getEmpresa(){
			return $this->empresa;
		}
		
		//Funcoes de querys
		public function genInsertQuery($connect){
			$ret = $connect->prepare("INSERT INTO pessoas (nome,empresa)VALUES(?,?)");
			$ret->bind_param("ss", $this->nome,$this->empresa);
			return $ret;
		}
		public function genDeleteQuery($connect){
			$ret = $connect->prepare("Delete from pessoas where id = ?");
			$ret->bind_param("i", $this->id);
			return $ret;
		}
		public function genSelectQuery($connect){
			$ret = $connect->prepare("Select id, nome, empresa from pessoas WHERE id = ?");
			$ret->bind_param("i", $this->id);
			return $ret;
		}
		public function genUpdateQuery($connect){
			$ret = $connect->prepare("UPDATE pessoas SET nome = ?, empresa = ? WHERE pessoas.id = ?");
			$ret->bind_param("ssi", $this->nome, $this->empresa, $this->id);
			return $ret;
		}
		
		public static function findAll(){
			$query = "Select id, nome, empresa from pessoas";
			$connect = connectToMyDB();
			return $connect->query($query);
		}
		
	}
?>