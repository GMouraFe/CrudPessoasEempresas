<?php
	
	$action = $_POST['action'] ?? null;
	include "/var/www/html/controller/pessoa_controller.php";
	
	switch($action){
		case "inserir":
			$pc = new PessoaController();
			$pc->executarAcaoInserirContato();
			include ('/var/www/html/views/msg_sucesso.php');
		break;

		case "excluir":
			$pc = new PessoaController();
			$pc->executarAcaoExcluirContato();
			include ('/var/www/html/views/msg_exclusao.php');
		break;
		case "alterar":
			$pc = new PessoaController();
			$p = $pc->buscarInformacaoAlterarContato();
			include ('/var/www/html/views/tela_alteracao.php');
		break;			
		case "alterar_finalizar":
			$pc = new PessoaController();
			$pc->executarAcaoAlterarContato();
			include ('/var/www/html/views/msg_alteracao.php');
		break;
		default:
			break;	
	}
?>