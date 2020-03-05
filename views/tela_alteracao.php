<!DOCTYPE HTML>
<HTML>
	<head>
		 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		 <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
	</head>
	<body class="w3-container">
		<div class="w3-panel w3-teal">		
			<h3>Altere os dados conforme desejar...</h3>
		</div>
		<div class="w3-quarter">
			<form method="POST" action="pessoa_controller.php">
				<label for="nome">Nome:</label>
				<input class="w3-input w3-border" id="nome" name="nome" type="text" value="<?php echo ($p->nome) ?>">
				<label for="empresa">Empresa:</label>
				<input class="w3-input w3-border" id="empresa" name="empresa" type="text" value="<?php echo ($p->empresa) ?>">
				<input id="action" name="action" type="hidden" value="alterar_finalizar">
				<input id="id" name="id" type="hidden" value="<?php echo ($p->id) ?>">	
				<br>						
				<input class="w3-button w3-teal" type="submit" value="Alterar"/>
			</form>
		</div>
	</body>
</HTML>