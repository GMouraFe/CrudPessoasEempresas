<?php
	
	$action = $_POST['action'] ?? null;
	include "/var/www/html/controller/pessoa_controller.php";
	
	switch($action){
		case "inserir":
			executarAcaoContatoSemRetorno($action);
			
			include ('/var/www/html/views/msg_sucesso.php');
		break;

		case "excluir":
			executarAcaoContatoSemRetorno($action);
			include ('/var/www/html/views/msg_exclusao.php');
		break;
		case "alterar":
			$p = executarAcaoAlterar();
			include ('/var/www/html/views/tela_alteracao.php');
		break;			
		case "alterar_finalizar":
			executarAcaoContatoSemRetorno($action);
			include ('/var/www/html/views/msg_alteracao.php');
		break;
		default:
			break;	
	}
?>