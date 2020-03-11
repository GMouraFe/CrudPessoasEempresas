<!DOCTYPE HTML>
<HTML lang="pt-br">
	<head>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
		<title>Pessoas & Empresas - Alteração de dados</title>
	</head>
	<body class="w3-container">
		<div class="w3-panel w3-teal">		
			<h3>Altere os dados conforme desejar...</h3>
		</div>
		<div class="w3-quarter">
			<form method="POST" action="rotas.php">
				<label for="nome">Nome:</label>
				<input class="w3-input w3-border" id="nome" name="nome" type="text" required='true' value="<?php echo $p->getNome() ?>">
				<label for="empresa">Empresa:</label>
				<input class="w3-input w3-border" id="empresa" name="empresa" type="text" required='true' value="<?php echo $p->getEmpresa() ?>">
				<input id="action" name="action" type="hidden" value="alterar_finalizar">
				<input id="id" name="id" type="hidden" value="<?php echo $p->getId() ?>">	
				<br>						
				<input class="w3-button w3-teal" type="submit" value="Alterar"/>
			</form>
		</div>
	</body>
</HTML>