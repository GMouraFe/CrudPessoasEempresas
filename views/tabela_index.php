<!DOCTYPE HTML>
<HTML lang="pt-br">
	<head>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
		<title>Bem vindo ao Pessoas & Empresas</title>
	</head>
	<body class="w3-container">
			<?php
				$connect = new mysqli("127.0.0.1", "admin", "SUSTAIN@ev3ris!", "Catalogo");
		
				if($connect){
						$query = "Select id, nome, empresa from pessoas";
						$resultset = $connect->query($query);
							
					if($resultset->num_rows == 0){
						echo "<div class='w3-panel w3-blue'>";
							echo"<h1>Nenhum usuario encontrado</h1>";
							echo"<h4>Que tal adicionar alguns?<h4>";
						echo"</div>";
					}else{ ?>
					
						<table class='w3-table-all'>
							<caption>Individuos já cadastrados e disponíveis</caption>
							<tr class='w3-teal'>
								<th scope='col'>Nome</th>
								<th scope='col'>Empresa</th>
								<th scope='col'>Ações</th>
								<th scope='col'></th>
							</tr>
							<?php
							define("SEPARADOR", "</td><td>");
							while($rs = $resultset->fetch_assoc()){
									echo "<tr><td>";
									echo $rs['nome'];	
									echo SEPARADOR;
									echo $rs['empresa'];	
									echo SEPARADOR;
									echo "<form method='POST' action='/controller/pessoa_controller.php'><input id='action' name='action' type='hidden' value='excluir'><input id='id' name='id' type='hidden' value='".$rs['id']."'>"."<input class='w3-button w3-round w3-red' type='submit' value='Excluir'/></form>";								
									echo SEPARADOR;
									echo "<form method='POST' action='/controller/pessoa_controller.php'><input id='action' name='action' type='hidden' value='alterar'><input id='id' name='id' type='hidden' value='".$rs['id']."'>"."<input class='w3-button w3-round w3-indigo' type='submit' value='Alterar'/></form>";
									echo "</td></tr>";
							}
							mysqli_close($connect);
							echo "</table>";
				}	
			}
		?>
	</body>
</HTML>