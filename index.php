<!DOCTYPE HTML>
<HTML>
	<HEAD>
		 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		 <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
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
		<h3>Já cadastradas:</h3>
			<?php
				$connect = new mysqli("127.0.0.1", "admin", "ev3ris!", "Catalogo");
		
				if($connect){
						$query = "Select id, nome, empresa from pessoas";
						$resultset = $connect->query($query);
							
					if($resultset->num_rows == 0){
							
					}else{
						echo("<table class='w3-table-all'>");
							echo("<tr class='w3-teal'>");
								echo("<th>Nome</th>");
								echo("<th>Empresa</th>");
								echo("<th>Ações</th>");
								echo("<th></th>");
							echo("</tr>");
							while($rs = $resultset->fetch_assoc()){
									echo("<tr>");
										echo("<td>");
											echo($rs['nome']);	
										echo("</td>");
										echo("<td>");
											echo($rs['empresa']);	
										echo("</td>");	
										echo("<td>");
											echo("<form method='POST' action='/controller/pessoa_controller.php'><input id='action' name='action' type='hidden' value='excluir'><input id='id' name='id' type='hidden' value='".$rs['id']."'>"."<input class='w3-button w3-round w3-red' type='submit' value='Excluir'/></form>");								
										echo("</td>");
										echo("<td>");
											echo("<form method='POST' action='/controller/pessoa_controller.php'><input id='action' name='action' type='hidden' value='alterar'><input id='id' name='id' type='hidden' value='".$rs['id']."'>"."<input class='w3-button w3-round w3-indigo' type='submit' value='Alterar'/></form>");
										echo("</td>");
									echo("</tr>");
							}
							mysqli_close($connect);
							echo("</table>");
				}	
			}
		?>
		
	</BODY>
</HTML>



