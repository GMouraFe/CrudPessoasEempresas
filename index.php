<!DOCTYPE HTML>
<HTML lang="pt-br">
	<HEAD>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
		<title>Bem vindo ao Pessoas & Empresas</title>
	</HEAD>
	<BODY class="w3-container">
		<div class="w3-panel w3-flat-turquoise">
			<h1>Pessoas & Empresas</h1>
		</div>
		<h3>Insira aqui</h3>
		<div class="w3-row-padding">
			<form method="POST" action="/controller/pessoa_controller.php">
			<div class="w3-quarter">
				<label for='nome'>Nome:</label>
				<input class="w3-input w3-border" id="nome" name="nome" type='text'>
				<label for='empresa'>Empresa:</label>
				<input class="w3-input w3-border" id="empresa" name="empresa" type='text'>
				<input id="action" name="action" type='hidden' value='inserir'>	
				<br>
				<div class="w3-quarter">
				<input class="w3-button w3-teal" type="submit" value="Inserir"/>
			</div>
		</div>

			</form>
		</div>
		<h3>Já cadastrados:</h3>
			
			<?php 
				include ('/var/www/html/views/tabela_index.php');
			?>
		
	</BODY>
</HTML>



