<?php
	
	$action = $_POST['action'] ?? null;
	include "/var/www/html/controller/pessoa_controller.php";
	$pc = new PessoaController();

	switch($action){
		case "inserir":
			$pc->executarAcaoInserirContato();
			include ('/var/www/html/views/msg_sucesso.php');
		break;
		case "excluir":			
			$pc->executarAcaoExcluirContato();
			include ('/var/www/html/views/msg_exclusao.php');
		break;
		case "alterar":
			$pc->buscarInformacaoAlterarContato();
			$p = $pc->getPessoa();
			include ('/var/www/html/views/tela_alteracao.php');
		break;			
		case "alterar_finalizar":
			$pc->executarAcaoAlterarContato();
			include ('/var/www/html/views/msg_alteracao.php');
		break;
		default:
			break;	
	}
?>