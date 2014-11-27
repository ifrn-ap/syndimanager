<?php
	
	include 'conexao_bd.php';
	
		if(isset($_POST['txtUsuario'])){
			if(isset($_POST['txtUsuario'])){
				if(isset($_POST['txtUsuario'])){
					
					$usuario = $_POST['txtUsuario'];
					$senha = $_POST['txtSenha'];
					
					$sql_insert = "INSERT INTO usuario(login, senha, id_acesso) VALUES('".$usuario."','".sha1($senha)."',1)";
					
					if($sql_comm = mysql_query($sql_insert)){
						header("Location:criar_conta.php?sucesso=1");
						
					}								
				}
			}
		}
	
	
?>