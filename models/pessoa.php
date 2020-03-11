<?php
	include ('/var/www/html/resources/DB.php');

	class Pessoa{
		private $id;
		private $nome;
		private $empresa;
		
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
		public function genInsertQuery(){
			$connect = connectToMyDB();
			$ret = $connect->prepare("INSERT INTO pessoas (nome,empresa)VALUES(?,?)");
			$ret->bind_param("ss", $this->nome,$this->empresa);
			$ret->execute();
		}
		public function genDeleteQuery(){
			$connect = connectToMyDB();
			$ret = $connect->prepare("Delete from pessoas where id = ?");
			$ret->bind_param("i", $this->id);
			$ret->execute();
		}
		public function genSelectQuery(){
			$connect = connectToMyDB();
			$ret = $connect->prepare("Select id, nome, empresa from pessoas WHERE id = ?");
			$ret->bind_param("i", $this->id);
			$ret->execute();
			
			$resultSet = $ret->get_result();

			while($rs = $resultSet->fetch_assoc()){
				
				$this->setId($rs['id']);
				$this->setNome($rs['nome']);
				$this->setEmpresa($rs['empresa']);
			}
		}
		public function genUpdateQuery(){
			$connect = connectToMyDB();
			$ret = $connect->prepare("UPDATE pessoas SET nome = ?, empresa = ? WHERE pessoas.id = ?");
			$ret->bind_param("ssi", $this->nome, $this->empresa, $this->id);
			$ret->execute();
		}
		
		public static function findAll(){
			$query = "Select id, nome, empresa from pessoas";
			$connect = connectToMyDB();
			return $connect->query($query);
		}
		
	}
?>