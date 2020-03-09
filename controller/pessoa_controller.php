<?php
			//Inclusão da clase base pessoa
			include ('/var/www/html/models/pessoa.php');
			include ('/var/www/html/CrudPessoasEempresas/resources/DB.php');
		
			//Recebimento da ação do usuario
			$action = $_POST['action'];
		
			//Chamada if caso a ação da index seja Inserir
			if($action == 'inserir'){
				executar_acao_contato($action);
				include ('/var/www/html/views/msg_sucesso.php');
			}

			//Chamada if caso a ação da index seja excluir
			if($action == 'excluir'){
				executar_acao_contato($action);
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
				executar_acao_contato($action);
				include ('/var/www/html/views/msg_alteracao.php');
			}


			function executar_acao_contato($action){
				$connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
				if($connect){
					if($action == 'inserir'){
						$p = new Pessoa('',$_POST['nome'],$_POST['empresa']);
						$query = $p->genInsertQuery();
					}
					if($action == 'excluir'){
						$p = new Pessoa($_POST['id'],'','');
						$query = $p->genDeleteQuery();
					}
					if($action == 'alterar_finalizar'){
						$p = new Pessoa($_POST['id'],$_POST['nome'],$_POST['empresa']);
						$query = $p->genUpdateQuery();
					}
					$connect->query($query);
					mysqli_close($connect);
				}
			}

?>