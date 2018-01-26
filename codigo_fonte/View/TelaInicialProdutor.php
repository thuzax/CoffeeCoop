<?php
	header('Content-Type: text/html; charset=utf-8');
	
	include_once("../Persistence/Conexao.php");
	include_once("../Model/SacaDeCafe.php");
	include_once("../Persistence/SacaDeCafeDAO.php");
	
	

	$conexao = new Conexao();
	$link = $conexao->getLink();
	
	$sacaDeCafeDao = new SacaDeCafeDAO();
	$retorno = $sacaDeCafeDao->buscarSacas(1, $link);
	
	$rs = $retorno->fetch_all();

?>

<html>
	<head>
		<title>CoffeeCoop</title>
	</head>

	<body>
		
	<div>
		<form>
			<fieldset>
				<input name="tipo" placeholder = "Digite o tipo de café" type = "text" maxlength = "40" required autofocus>
				<button name = "submit" type = "submit">Consultar</button>
			</fieldset>
		
		</form>
	
	</div>
	
	<div>
	<table border = '1'>
		<tr>
			<th>Tipo</th>
			<th>Data de Armazenamento</th>
			<th>Quantidade</th>
			<th></th>
			<th></th>
		</tr>
		<?php
			foreach($rs as $linha){
				echo "<tr>";
				echo "<td>".$linha[1]."</td>";
				echo "<td>".$linha[2]."</td>";
				echo "<td>".$linha[3]."</td>";
				echo "<td><button name = 'submit' value = '".$linha[0]."' type = 'submit'>E</button></td>";
				
				echo "</tr>";
			}
		?>
	</table>
	</div>
	
	<div>
		<button name = "submit" type = "submit">Inserir</button>
		<button name = "submit" type = "submit">Retirar</button>
		<button name = "submit" type = "submit">Vender</button>

	</div>
	</body>
</html>
