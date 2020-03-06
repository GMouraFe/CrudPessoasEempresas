<!DOCTYPE HTML>
<HTML>
	<HEAD>
		 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		 <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
	</HEAD>
	<body>

<?php
	include ('/../models/pessoa.php');
	if($_POST['action']== 'inserir'){
		inserir_contatos();
		echo('<div class="w3-panel w3-green">');
			echo('<h1>Sucesso!</h1>');
			echo('<h4>Individuo inserido com sucesso <a href="/../index.php/">clique aqui para retornar</a> .</h4>');
		echo('</div>');
	}
	if($_POST['action']== 'excluir'){
		excluir_contatos();
		echo('<div class="w3-panel w3-red">');
			echo('<h1>Sucesso!</h1>');
			echo('<h4>Individuo excluido com sucesso <a href="/../index.php/">clique aqui para retornar</a> .</h4>');
		echo('</div>');
	}
	if($_POST['action']== 'alterar_finalizar'){
		alterar_contatos();
		echo('<div class="w3-panel w3-blue">');
			echo('<h1>Sucesso!</h1>');
			echo('<h4>Individuo alterado com sucesso <a href="/../index.php/">clique aqui para retornar</a> .<h4>');
		echo('</div>');
	}
	if($_POST['action']== 'alterar'){
		
		$p = new Pessoa($_POST['id'],'','');
		$connect = new mysqli("127.0.0.1", "admin", "ev3ris!", "Catalogo");
		if($connect){
			$query = $p->genSelectQuery();
			$resultset = $connect->query($query);
			while($rs = $resultset->fetch_assoc()){
				$p->id= $rs['id'];
				$p->nome = $rs['nome'];
				$p->empresa = $rs['empresa'];
			}
			mysqli_close($connect);
		}
		echo('<div class="w3-panel w3-teal">');		
			echo('<h3>Altere os dados conforme desejar...</h3>');
		echo('</div>');
		echo('<div class="w3-quarter">');
			echo('<form method="POST" action="pessoa_controller.php">');
				echo('<label for="nome">Nome:</label>');
				echo('<input class="w3-input w3-border" id="nome" name="nome" type="text" value="'.$p->nome.'">');
				echo('<label for="empresa">Empresa:</label>');
				echo('<input class="w3-input w3-border" id="empresa" name="empresa" type="text" value="'.$p->empresa.'">');
				echo('<input id="action" name="action" type="hidden" value="alterar_finalizar">');
				echo('<input id="id" name="id" type="hidden" value="'.$p->id.'">');	
				echo('<br>');							
				echo('<input class="w3-button w3-teal" type="submit" value="Alterar"/>');
			echo('</form>');
		echo('</div>');
	}
	
	function inserir_contatos(){
		$p = new Pessoa('',$_POST['nome'],$_POST['empresa']);
		$connect = new mysqli("127.0.0.1", "admin", "ev3ris!", "Catalogo");
		if($connect){
			$query = $p->genInsertQuery();
			$resultset = $connect->query($query);
			mysqli_close($connect);
		}
	}
	
	function excluir_contatos(){
		$p = new Pessoa($_POST['id'],'','');
		$connect = new mysqli("127.0.0.1", "admin", "ev3ris!", "Catalogo");
		if($connect){
			$query = $p->genDeleteQuery();
			$resultset = $connect->query($query);
			mysqli_close($connect);
		}
	}
	
	function alterar_contatos(){
		$p = new Pessoa($_POST['id'],$_POST['nome'],$_POST['empresa']);
		$connect = new mysqli("127.0.0.1", "admin", "ev3ris!", "Catalogo");
		if($connect){
			$query = $p->genUpdateQuery();
			$resultset = $connect->query($query);
			mysqli_close($connect);
		}
	}
	
?>

<body>
</HTML>