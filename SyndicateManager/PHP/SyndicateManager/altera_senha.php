<?php
	
	include 'conexao_bd.php';
	
	session_start();
	
	echo "porcaria mais fora";
	
		if(isset($_POST['txtSenhaAtual'])){
			if(isset($_POST['txtNovaSenha'])){
				
			  	$senha = $_POST['txtSenhaAtual'];
			  	$nova_senha = $_POST['txtNovaSenha'];

			  	$sql_update = "UPDATE usuario SET senha='".sha1($nova_senha)."' WHERE BINARY login='".$_SESSION['usuario']."'";
			  
			  	echo "porcaria fora";
			  
			  	if($sql_comm = mysql_query($sql_update)){
				  	echo "porcaria if";
				  	header("Location:logout.php?warning=1");					
			  	}else{
				  	echo mysql_error();
			  	}
			}
		}
	
	
?>