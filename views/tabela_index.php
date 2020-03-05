<!DOCTYPE HTML>
<HTML>
	<head>
		 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		 <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
	</head>
	<body class="w3-container">
			<?php
				$connect = new mysqli("127.0.0.1", "admin", "SUSTAIN@ev3ris!", "Catalogo");
		
				if($connect){
						$query = "Select id, nome, empresa from pessoas";
						$resultset = $connect->query($query);
							
					if($resultset->num_rows == 0){
						echo('<div class="w3-panel w3-blue">');
							echo('<h1>Nenhum usuario encontrado</h1>');
							echo('<h4>Que tal adicionar alguns?<h4>');
						echo('</div>');
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
	</body>
</HTML>