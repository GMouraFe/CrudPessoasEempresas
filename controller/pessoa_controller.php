<!-- 
	Import simples de estilos W3
-->

<!DOCTYPE HTML>
<HTML>
	<HEAD>
		 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		 <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
	</HEAD>
	<BODY class="w3-container">
		<?php
			//Inclusão da clase base pessoa
			include ('/var/www/html/models/pessoa.php');
			include ('/var/www/html/CrudPessoasEempresas/resources/DB.php');
		
			//Recebimento da ação do usuario
			$action = $_POST['action'];
		
			//Chamada if caso a ação da index seja Inserir
			if($action == 'inserir'){
				inserir_contatos();
				include ('/var/www/html/views/msg_sucesso.php');
			}

			//Chamada if caso a ação da index seja excluir
			if($action == 'excluir'){
				excluir_contatos();
				include ('/var/www/html/views/msg_exclusao.php');
			}

			//Chamada if inicial caso a ação da index seja Alterar
			if($action == 'alterar'){

				$p = new Pessoa($_POST['id'],'','');
				$connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
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
				include ('/var/www/html/views/tela_alteracao.php');
			}

			//Chamada if final caso a ação da index seja Alterar
			if($action == 'alterar_finalizar'){
				alterar_contatos();
				include ('/var/www/html/views/msg_alteracao.php');
			}


			//Funções de operação em banco
			function inserir_contatos(){
				$p = new Pessoa('',$_POST['nome'],$_POST['empresa']);
				$connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
				if($connect){
					$query = $p->genInsertQuery();
					$resultset = $connect->query($query);
					mysqli_close($connect);
				}
			}

			function excluir_contatos(){
				$p = new Pessoa($_POST['id'],'','');
				$connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
				if($connect){
					$query = $p->genDeleteQuery();
					$resultset = $connect->query($query);
					mysqli_close($connect);
				}
			}

			function alterar_contatos(){
				$p = new Pessoa($_POST['id'],$_POST['nome'],$_POST['empresa']);
				$connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
				if($connect){
					$query = $p->genUpdateQuery();
					$resultset = $connect->query($query);
					mysqli_close($connect);
				}
			}

		?>

	</body>
</HTML>