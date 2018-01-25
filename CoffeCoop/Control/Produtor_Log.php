<?php
	header('Content-Type: text/html; charset=utf-8');
	
	include_once("../Persistence/Conexao.php");
	include_once("../Model/Produtor.php");
	include_once("../Persistence/ProdutorDAO.php");
	
	$usuario = $_POST["usuario"];
	$senha = $_POST["senha"];
	
	$conexao = new Conexao('localhost', 'root', '', 'CoffeeCoop');
	$link = $conexao->getLink();
	
	$produtorDao = new ProdutorDAO();
		
	try {
		$retorno = $produtorDao->logar($usuario, $senha, $link);
	
		$rs = $retorno->fetch_all();

		foreach($rs as $linha) {
			$id = $linha[0];
			$nome = $linha[1];
			$user = $linha[2];
			$pass = $linha[3];
			
		}

		$produtor = new Produtor($id, $nome, $user, $pass, $pass);

		$SQL = "String = ".$produtor->getId().",
						".$produtor->getNome()."',
						'".$produtor->getUsuario()."',
						'".$produtor->getSenha()."');";
		
		header("Location: ../Views/EstocarCafe.html"); //Página inicial após login
	} catch (Exception $e){
		echo $e->getMessage();
	}

		$conexao->fechar();
?>
